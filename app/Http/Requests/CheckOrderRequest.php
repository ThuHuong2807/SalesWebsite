<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOrderRequest extends FormRequest
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
            'product_order'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'product_order.required'=>'Bạn Chưa Có Sản Phẩm Nào Trong Giỏ Hàng !!',
        ];
    }
}
