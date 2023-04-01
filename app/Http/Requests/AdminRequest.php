<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|max:50',
            'password' => 'required|min:6',
            'phone' => 'required|numeric|min:10',
            'role' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        // key là key của rule . đk
        return [
            'name.required' => 'Tên bắt buộc nhập!',
            'name.min' => 'Tên tối thiểu 3 ký tự!',
            'name.max' => 'Tên tối đa là 40 ký tự!',
            'email.required' => 'Email bắt buộc nhập!',
            'email.email' => 'Email không đúng định dạng!',
            'email.max' => 'Email tối đa 50 ký tự!',
            'password.required' => 'Mật khẩu bắt buộc nhập!',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự!',
            'phone.required' => 'Số điện thoại bắt buộc nhập!',
            'phone.numeric' => 'Số điện thoại phải là số!',
            'phone.min' => 'Số điện thoại tối thiểu 10 số!',
            'role.required' => 'Người dùng bắt buộc phải có 1 quyền',
            'status.required' => 'Bạn chưa chọn trạng thái',
        ];
    }
}
