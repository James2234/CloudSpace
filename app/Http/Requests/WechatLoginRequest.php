<?php

namespace App\Http\Requests;


class WechatLoginRequest extends BaseRequest
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
            //
            'openid' => 'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'openid.required' => 'openid不能为空',
            'openid.min' => 'openid格式不正确'
        ];
    }

}
