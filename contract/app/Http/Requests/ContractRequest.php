<?php

namespace App\Http\Requests;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Rules\CheckFolderExistence;
use Illuminate\Validation\Rule;

class ContractRequest extends FormRequest
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
     * @return void
     */
    protected function prepareForValidation()
    {
        if($this->route('contract_id')) {
            $this->merge(['contract_id' => $this->route('contract_id')]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $roles = [
            'contract_id'                    => 'sometimes|exists:contracts,id',
            'quran_date'                     => ['required', 'date', 'after:today'],
            'deferred_dowry'                 => ['required', 'numeric'],
            'prompt_dower'                   => ['required', 'numeric'],
            'terms'                          => 'required',
            'is_mosque'                      => 'required',
            'quran_address'                  => 'nullable',
            'data'                           => 'required|array',
            'data[*][type]'                  => ['required'],
            'data.*.first_name'              => ['required'],
            'data.*.last_name'               => ['required'],
            'data.*.middle_name'             => ['nullable'],
            'data.*.email'                   => ['required_if:data.*.type,husband'],
            'data.*.birth_date'              => ['required'],
            'data.*.birth_place'             => ['required'],
            'data.*.marital_status'          => ['nullable'],
            'data.*.nationality'             => ['required'],
            'data.*.profession'              => ['required'],
            'data.*.address'                 => ['required'],
            'data.*.phone_number'            => ['required_if:data.*.type,husband','string'],
            'data.*.kinship_degree'          => ['required_if:data.*.type,agent','string'],
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $array = [
                'husbandFront' =>$this->husbandFront !=='null' ? ['sometimes', 'string', new CheckFolderExistence]: '',
                'husbandBack' => $this->husbandBack !=='null' ?['sometimes', 'string', new CheckFolderExistence]: '',
                'wifeFront' => $this->wifeFront !=='null' ?['sometimes', 'string', new CheckFolderExistence]: '',
                'wifeBack' => $this->wifeBack !=='null' ?['sometimes', 'string', new CheckFolderExistence]: '',
                'firstWitnessFront' => $this->firstWitnessFront !=='null' ?['sometimes', 'string', new CheckFolderExistence]: '',
                'firstWitnessBack' => $this->firstWitnessBack !=='null' ?['sometimes', 'string', new CheckFolderExistence]: '',
                'secondWitnessFront' => $this->secondWitnessFront !=='null' ?['sometimes', 'string', new CheckFolderExistence]: '',
                'secondWitnessBack' => $this->secondWitnessBack !=='null' ?['sometimes', 'string', new CheckFolderExistence]: '',
                'agentFront' => $this->agentFront !=='null' ?['sometimes', 'string', new CheckFolderExistence]: '',
                'agentBack' => $this->agentBack !=='null' ?['sometimes', 'string', new CheckFolderExistence]: '',
                'divorceCertificate' => $this->divorceCertificate !=='null' ?['sometimes', 'string', new CheckFolderExistence]: '',
                'husbandDeathCertificate' => $this->husbandDeathCertificate !=='null' ?['sometimes', 'string', new CheckFolderExistence]: ''
            ];

        }else {
            $array = [
                'husbandFront' => ['required', 'string', new CheckFolderExistence],
                'husbandBack' => ['required', 'string', new CheckFolderExistence],
                'wifeFront' => ['required', 'string', new CheckFolderExistence],
                'wifeBack' => ['required', 'string', new CheckFolderExistence],
                'firstWitnessFront' => ['required', 'string', new CheckFolderExistence],
                'firstWitnessBack' => ['required', 'string', new CheckFolderExistence],
                'secondWitnessFront' => ['required', 'string', new CheckFolderExistence],
                'secondWitnessBack' => ['required', 'string', new CheckFolderExistence],
                'agentFront' => ['required', 'string', new CheckFolderExistence],
                'agentBack' => ['required', 'string', new CheckFolderExistence],
                // 'divorceCertificate' => ['sometimes', 'string', new CheckFolderExistence],
                // 'husbandDeathCertificate' => ['sometimes', 'string', new CheckFolderExistence()],
                // 'husbandDeathCertificate' => [Rule::requiredIf(function ()  {
                //     return in_array(request()->type,['wife']) && in_array(request()->marital_status,['widower']);
                // }),new CheckFolderExistence],
            ];

        }
        return array_merge($roles, $array);
    }


      // custom message
      public function messages(): array
      {
          return [
              'quran_date.required' => __("api.required"),
              'is_mosque.required' => __("api.required"),
              'data.*.first_name.required' => __("api.required"),
              'data.*.last_name.required' => __("api.required"),
              'data.*.email.required' => __("api.required"),
              'data.*.birth_date.required' => __("api.required"),
              'data.*.nationality.required' => __("api.required"),
              'data.*.profession.required' => __("api.required"),
              'husbandFront.required' => __("api.required"),
              'husbandBack.required' => __("api.required"),
              'wifeFront.required' => __("api.required"),
              'wifeBack.required' => __("api.required"),
              'firstWitnessFront.required' => __("api.required"),
              'secondWitnessBack.required' => __("api.required"),
              'agentFront.required' => __("api.required"),
              'agentBack.required' => __("api.required"),
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
