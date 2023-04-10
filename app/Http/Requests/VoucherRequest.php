<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
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
            'code' => 'required',
            'discount' => 'required|numeric',
            'limit' => 'required|numeric',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        // key là key của rule . đk
        return [
            'name.required' => 'Tên voucher bắt buộc nhập!',
            'code.required' => 'Mã voucher bắt buộc nhập!',
            'discount.required' => 'Số tiền bắt buộc nhập!',
            'discount.numeric' => 'Số tiền phải là số!',
            'limit.required' => 'Số lượng mã bắt buộc nhập!',
            'limit.numeric' => 'Số lượng phải là số!',
            'status.required' => 'Bạn chưa chọn trạng thái!',
        ];
    }
}
