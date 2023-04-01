<?php

namespace App\Http\Requests;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name'  => 'nullable',
            'email'      => 'required|unique:users,email|email',
            'password'   => 'required',
        ];
    }

     // custom message
     public function messages()
     {
         return [
             'email.required' => __("api.required"),
             'first_name.required' => __("api.required"),
             'password.required' => __("api.required"),
             'last_name.required' => __("api.required"),


         ];
     }

    /**
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $this->apiResponseValidation($validator);
    }
}
