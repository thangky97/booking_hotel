<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
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
            'title' => 'required|min:3|max:70',
            'cate_id' => 'required',
            'admin_id' => 'required',
            'status' => 'required',
            'images' =>
            [
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
            'title.required' => 'Tên bắt buộc nhập!',
            'title.min' => 'Tên tối thiểu 3 ký tự!',
            'title.max' => 'Tên tối đa là 70 ký tự!',
            'cate_id.required' => 'Bạn chưa chọn danh mục bài viết!',
            'admin_id.required' => 'Bạn chưa chọn người đăng!',
            'status.required' => 'Bạn chưa chọn trạng thái!',
            'images.image' => 'Bắt buộc phải là ảnh!',
            'images.max' => 'Ảnh không được lớn hơn 2MB!',
        ];
    }
}
