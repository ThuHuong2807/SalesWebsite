<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAttrRequest extends FormRequest
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
            'attribute_name'=>'required|max:50|unique:attribute,attribute_name,'.$this->attribute_id.',attribute_id',
        ];
    }

    public function messages()
    {
        return [
            'attribute_name.required'=>'Tên Thuộc Tính Không Được Để Trống!!',
            'attribute_name.unique'=>'Tên Thuộc Tính Đã Tồn Tại!!',
        ];
    }
}
