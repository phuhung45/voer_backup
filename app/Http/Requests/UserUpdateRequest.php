<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Không được để trống họ',
            'last_name.required' => 'Không được để trống tên',
            'email.required' => 'Không được để trống email',
            'email.email' => 'Email không đúng định dạng',
            'password.min' => 'mật khẩu cần ít nhất 8 ký tự',
        ];
    }
}
