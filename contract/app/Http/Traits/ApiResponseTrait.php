<?php

namespace App\Http\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

/**
 * Trait ApiResponseTrait
 * @author Ahmed Mohamed
 */
trait ApiResponseTrait
{
    /**
     * @param $data
     * @param $status
     * @param $idCode
     * @param $statusCode
     * @param $message
     * @return JsonResponse
     */
    public function apiResponse($data , $status , $idCode, $statusCode, $message ): JsonResponse
    {
        $array = [
            'message' => $message,
            'data'   => $data,
            'status' => $status,
            'identifier_code' => $idCode ,
            'status_code' => $statusCode,
        ];

        return Response::json($array, $statusCode);
    }


    /**
     * This function apiResponseValidation for Validation Request
     * @param $validator
     */
    public function apiResponseValidation($validator)
    {
        $response = [
            'data'   => [],
            'status' => false,
            'identifier_code' => 100003,
            'status_code' => 422,
            'message' => 'validation',
            'validator'=>$validator->errors(),
        ];

        throw new HttpResponseException(Response::json($response, 422));
    }
}
