<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoffeeRequest extends FormRequest
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
            'name' => 'required|max:150',
            'price' => 'required|min:0'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường này không được để trống!',
            'name.max' => 'Tên sản phẩm không quá 150 ký tự',
            'price.required' => 'Trường này không được để trống!',
            'price.min' => 'Giá không được nhỏ hơn 0 đồng',
        ];
    }
}
