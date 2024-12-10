<?php

namespace App\Http\Requests;

class SetUserInfoRequest extends BaseRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nickname' => 'required',
            'avatar' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'idcard'=> 'required|size:18|regex:/^\d{17}[\dXx]$/'
        ];
    }
    public function messages(){
        return [
            'nickname.required' => '昵称不能为空',
            'avatar.required' => '头像不能为空',
            'phone.required' => '手机号不能为空',
            'name.required' => '姓名不能为空',
            'idcard.required' => '身份证号不能为空',
            'idcard.size' => '身份证号长度不正确',
        ];
    }
}
