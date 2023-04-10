<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorUserUpdateRequest extends FormRequest
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
            'password' => 'nullable|min:8|string|confirmed',
            'fullname' => 'required',
            'email' => 'nullable|email',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'client_id' => 'default(0)',
            'homepage' => 'nullable',
            'affiliation' => 'nullable',
            'national' => 'nullable',
            'biography' => 'nullable',
            'avatar' => 'nullable|image'
        ];
    }
    
    public function messages()
    {
        return [
            'user_id.required' => 'Vui lòng điền tên người dùng',
            'user_id.string' => 'Tên người dùng phải là chuỗi',
            'fullname.required' => 'Vui lòng điền họ tên của tác giả',
            'email.email' => 'Định dạng email không đúng',
            'avatar.image' => 'Avatar phải là ảnh',
            'password.min' => 'Mật khẩu phải từ 8 ký tự trở lên',
            'password.string' => 'Mật khẩu phải là chuỗi',
            'password.confirmed' => 'Mật khẩu nhập lại không chính xác'
        ];
    }
}
