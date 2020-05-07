<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditValueRequest extends FormRequest
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
            'values_value'=>'required|max:50|unique:values,values_value'
        ];
    }

    public function messages()
    {
        return [
            'values_value.unique'=>'Giá Trị Thuộc Tính Đã Tồn Tại',
            'values_value.required'=>'Giá Trị Thuộc Tính không được để trống!',
            'values_value.max'=>'Giá Trị Thuộc Tính không được lớn hơn 50 ký tự',
        ];
    }
}
