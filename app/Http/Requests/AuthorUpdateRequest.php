<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorUpdateRequest extends FormRequest
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
            'fullname' => 'nullable',
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
            'email.unique' => 'Email đã tồn tại, vui lòng điền email khác',
            'avatar.image' => 'Avatar phải là ảnh'
        ];
    }
}
