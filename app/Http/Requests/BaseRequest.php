<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// 重写 reques 422 状态码
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(response()->json([
            'code' => 400,
            'message' => 'fail',
            'data' => $validator->errors()->first()
        ])));
    }
}
