<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'category_name'=>'required|max:50|unique:category,category_name,'.$this->category_id.',category_id',
        ];
    }

    public function messages()
    {
        return [
            'category_name.unique'=>'FAILED!! Tên danh mục đã tồn tại',
            'category_name.required'=>'FAILED!! Tên danh mục không được để trống!',
            'category_name.max'=>'FAILED!! Tên danh mục không được lớn hơn 20 ký tự',
        ];
    }
}
