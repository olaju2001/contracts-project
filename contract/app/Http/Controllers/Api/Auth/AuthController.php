<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Verification;
use App\Traits\ApiResponseTrait;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ForgetPassword;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Jobs\SendVerificationMailJob;
use App\Http\Requests\PinCodeRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Carbon\Carbon;
use Session;

class AuthController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var User
     */
    protected $userModel;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    /**
     * @param LoginRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function login(LoginRequest $request)
    {
        $user = $this->userModel->whereEmail($request->post('email'))->with('role')->first();

        if ($user) {
            if(is_null($user->email_verified_at)){
                $message = __('api.not_verified');
                return $this->apiResponse($message,$user,'not verified' ,401);
            }
            if (!Hash::check($request->post('password'), $user->password)) {
                $message = __('api.Wrong_password');
                return $this->apiResponse($message, null, 'wrong password', 403);
            }

            $token = $user->createToken('token')->plainTextToken;

            return $this->apiResponse(__('api.successfully_login'), $user, null,  200 , $token);
        }
        return $this->apiResponse(__('api.not_found_user'), null, 'not found user', 403);
    }

    /**
     * @param RegisterRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function register(RegisterRequest $request)
    {
        $user =  $this->userModel->create([
            'first_name' => $request->post('first_name'),
            'last_name' => $request->post('first_name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'role_id' => 3 // register with user role
        ]);

        // fire send verification mail job
        dispatch(new SendVerificationMailJob($user));
        return $this->apiResponse(__('api.successfully_register'), $user);
    }

    /**
     * @param PinCodeRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function verifiedEmail(Request $request)
    {
        $email= $request->get('email');
        $code= $request->get('pin_code');

        $data= Verification::query()->whereHas('user',function($query) use($email) {
            $query->whereEmail($email);
        })->latest()->first();

        if($data)
        {
            if($data->pin_code == $code)
            {
                // $user=User::find($data->user_id);
                $user = $this->userModel->whereId($data->user_id)->with('role')->first();
                $data->update(['is_used' => 1]);

                $user->update(['email_verified_at' => Carbon::now()]);
                $token = $user->createToken('token')->plainTextToken;
                return redirect(config('app.front_url') . '?token=' . urlencode($token));
            }

            return $this->apiResponse(__('api.error_code'), null, 'error code', 422);
        }
        return $this->apiResponse(__('api.error_data'), null, 'not code yet', 422);
    }

    /**
     * @return PasswordBroker
     */
    public function broker(): PasswordBroker
    {
        return Password::broker('users');
    }

    /**
     * forget password
     * @param ForgetPassword $request
     * @return array
     */
    public function forgetPassword(ForgetPassword $request): array
    {
        $response = $this->broker()->sendResetLink(Arr::only($request->validated(),['email']));

        return $response == Password::RESET_LINK_SENT
            ? ['data' => null , 'status' => true , 'status_code' => 200,'message' => __('api.reset_password')]
            : ['data' => null , 'status' => false , 'status_code' => 400,'message' => __('api.Something_wrong')];
    }

    /**
     * reset password
     * @param ResetPasswordRequest $data
     * @return array
     */
    public function resetPassword(ResetPasswordRequest $data): array
    {
        try{
            $status = Password::reset(
                $data->validated(),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                ? ['data' => null , 'status' => true , 'status_code' => 200,'message' => __('api.password_reset_successfully')]
                : ['data' => null , 'status' => false , 'status_code' => 400,'message' => __('api.Something_wrong')];

        }catch (\Exception $e){
            Log::info("Password reset process failed due to : ".$e->getMessage());
            return [
                'data' =>null,
                'status' => false,
                'identifier_code' => 109003,
                'status_code' => 400,
                'message' => 'Invalid token, You can request another reset password link again'
            ];
        }
    }

    /**
     * @return Application|ResponseFactory|Response
     */
    public function logout()
    {
        $user = Auth::user();
        // Revoke current user token
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return $this->apiResponse(__('api.logged_out'));
    }
}
