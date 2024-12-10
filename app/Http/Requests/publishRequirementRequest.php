<?php

namespace App\Http\Requests;


class publishRequirementRequest extends BaseRequest
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
            'location' => 'required|string|max:255',
            'location_detail' => 'string|max:255',
            'name'=>'required|string|max:255',
            'sex'=>'required|digits:1',
            'age'=>'required|digits:1',
            'room_type'=>'required|string|max:255',
            'budget'=>'string|max:255',
            'contact'=>'required|string|max:255',
            'contact_detail'=>'string|max:255',
            'note'=>''

        ];
    }
    public function messages(){
        return [
            'location.required' => '请输入地址',
            'location.string' => '地址格式不正确',
            'location.max' => '地址最多255个字符',
            'location_detail.string' => '详细地址格式不正确',
            'location_detail.max' => '详细地址最多255个字符',
            'name.required' => '请输入姓名',
            'name.string' => '姓名格式不正确',
            'name.max' => '姓名最多255个字符',
            'sex.required' => '请选择性别',
            'age.required'=>'请输入年龄',
            'room_type.required'=>'请输入房型',
            'contact.required'=>'请输入联系方式'
        ];
    }
}
