<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'         => 'required|min:5|max:255',
            'content' => 'required',
            'intro' => 'required',
//            'description' => 'required',
            'parent_id' => 'numeric',
            'price' => 'numeric|required',
            //'images[]' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute Không được để trống',
            'numeric' => ':attribute Phải là số',
            'min' => ':attribute Không được nhỏ hơn :min',
            'max' => ':attribute Không được lớn hơn :max'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'content' => 'Nội dung',
            'intro' => 'Tiêu đề',
            'description' => 'Mô tả',
            'price' => 'Giá sản phẩm',
        ];
    }
}
