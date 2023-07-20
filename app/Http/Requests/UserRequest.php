<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
            'role_id' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập Tên',
            'name.max' => 'Tiêu đề bài viết có tối đa 255 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Nhập đúng cấu trúc email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'role_id.required' => 'Vui lòng chọn role',
        ];
    }
}
