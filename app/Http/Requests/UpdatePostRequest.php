<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'image' => 'mimes:jpeg,png,jpg|max:5120',
            'content' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề bài viết',
            'title.max' => 'Tiêu đề bài viết có tối đa 255 ký tự',
            'content.required' => 'Vui lòng nhập nội dung bài viết',
            'image.mimes' => 'Ảnh phải là định dạng jpeg,png hoặc jpg',
            'image.max' => 'Ảnh phải nhỏ hơn 5MB',
            'category_id.required' => 'Vui lòng danh mục sản phẩm',
        ];
    }
}
