<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class MaterialUpdateRequest extends FormRequest
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
            'type' => 'require|boolean',
            'text' => 'nullable|string',
            'version' => 'nullable|numeric',
            'title' => 'required|string|max:2000',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'publish' => 'required',
            'language' => 'nullable|string',
            'license_id' => 'nullable|string',
            'derived_from' => 'nullable|numeric',
            'image' => 'nullable|image',
            'modified' => Carbon::now()
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Không được để trống tiêu đề'
        ];
    }
}