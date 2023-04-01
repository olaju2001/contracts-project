<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Traits\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;

class ResetPasswordRequest extends FormRequest
{
    use ApiResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'token'    => ['required'],
            'email'    => ['required', 'email:rfc,dns', 'exists:users,email'],
            'password' =>   ['required', 'confirmed'],
        ];
    }

    /**
     * @return string[]
     */
   // custom message
   public function messages(): array
   {
       return [
           'email.exists' => __("api.Mail_doesnot_match"),
           'email.required' => __("api.required"),
           'password.required' => __("api.required"),
       ];
   }

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $this->apiResponseValidation($validator);
    }
}
