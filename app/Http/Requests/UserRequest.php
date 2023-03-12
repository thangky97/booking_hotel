<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'phone' =>'required',
            'email' =>'required|email',
            'address' =>'required',
            'cccd' =>'required',
            'date' =>'required|date',
            'gender' =>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nhap ten khach hang!',
            'phone.required' => 'Nhập số điện thoại!',
            'email.required' =>'Nhập email!',
            'email.email' =>'Phải là email!',
            'address.required' => 'Nhập địa chỉ!',
            'cccd.required' => 'Nhập căn cước công dân!',
            'date.required' => 'Chọn ngày sinh!',
            'date.date' => 'Phải là ngày!',
            'gender.required' => 'Chon giới tính!',
        ];
    }
}
