<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserBookingRequest extends FormRequest
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
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        //để lấy phương thức hiện tại
        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'createBooking':
                        $rules = [
                            'name' => 'required',
                            'phone' => 'required',
                            'email' => 'required|email',
                            'address' => 'required',
                            'gender' => 'required',
                            'date' => 'required|date',
                            'cccd' => 'required',
                        ];
                        break;
                    default:
                        break;
                }
                break;
            default:
                break;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được để trống!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email không đúng định dạng!',
            'address.required' => 'Địa chỉ không được để trống!',
            'gender.required' => 'Giới tính không được để trống!',
            'date.required' => 'Ngày sinh không được để trống!',
            'date.date' => 'Ngày sinh không đúng định dạng!',
            'cccd.required' => 'Căn cước công dân không được để trống!',
        ];
    }



    // /**
    //  * Determine if the user is authorized to make this request.
    //  */
    // public function authorize(): bool
    // {
    //     return true;
    // }

    // /**
    //  * Get the validation rules that apply to the request.
    //  *
    //  * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
    //  */
    // public function rules(): array
    // {
    //     return [
    //         'name' => 'required',
    //         'phone' => 'required',
    //         'email' => 'required|email',
    //         'address' => 'required',
    //         'gender' => 'required',
    //         'date' => 'required|date',
    //         'cccd' => 'required',

    //     ];
    // }

    // public function messages(): array
    // {
    //     return [
    //         'name.required' => 'Họ và tên không được để trống!',
    //         'phone.required' => 'Số điện thoại không được để trống!',
    //         'email.required' => 'Email không được để trống!',
    //         'email.email' => 'Email không đúng định dạng!',
    //         'address.required' => 'Địa chỉ không được để trống!',
    //         'gender.required' => 'Giới tính không được để trống!',
    //         'date.required' => 'Ngày sinh không được để trống!',
    //         'date.date' => 'Ngày sinh không đúng định dạng!',
    //         'cccd.required' => 'Căn cước công dân không được để trống!',
    //     ];
    // }
}
