<?php

namespace App\Http\Requests;


class RegisterRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phonenum' => 'required',
            'code' => 'required|digits:6',
            'key' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phonenum.required' => '手机号不能为空',
            'phonenum.unique' => '手机号已存在',
            'key.required' => '验证码不能为空',
            'code.required' => '验证码不能为空',
            'code.digits' => '验证码格式不正确'
        ];
    }
}
