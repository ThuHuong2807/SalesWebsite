<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'user_email' => 'required|email|unique:users,user_email,'.$this->user_id.',user_id',
            'user_password' => 'required|min:3|max:50',
            'user_name' => 'required',
            'user_address' => 'required',
            'user_phone' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'user_email.unique'=>'email đã tồn tại !',
            'user_email.required'=>'email không được để trống !',
            'user_email.email'=>'email Đúng định dạng !',
            'user_password.required'=>'Mật khẩu không được để trống !',
            'user_password.min'=>'Mật khẩu không được nhỏ hơn 3 ký tự !',
            'user_password.max'=>'Mật khẩu không được lớn hơn 50 ký tự !',
            'user_name.required'=>'tên không được để trống tên !',
            'user_address.required'=>'không được để trống địa chỉ !',
            'user_phone.required'=>'số điện thoại không được để trống !',
            'user_phone.numeric'=>'sdt không đúng định dạng !',
        ];
    }
}
