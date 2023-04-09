<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:70',
            'status' => 'required',
            'image' =>
            [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'mimetypes:image/jpeg,image/png',
                'max:2048',
            ],
        ];
    }

    public function messages()
    {
        // key là key của rule . đk
        return [
            'name.required' => 'Tên bắt buộc nhập!',
            'name.min' => 'Tên tối thiểu 3 ký tự!',
            'name.max' => 'Tên tối đa là 70 ký tự!',
            'status.required' => 'Bạn chưa chọn trạng thái!',
            'image.required' => 'Ảnh không được để trống!',
            'image.image' => 'Bắt buộc phải là ảnh!',
            'image.max' => 'Ảnh không được lớn hơn 2MB!',
        ];
    }
}