<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookingRequest extends FormRequest
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
            'checkin_date' =>'required|date',
            'checkout_date' =>'required|date',
            'status_pay' =>'required',
            'status_booking' =>'required',
            'staff_id' =>'required',
            'room_id' =>'required',
            'people' =>'required',
            'cate_room_id' =>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'checkin_date.required' => 'Chon ngày thêm!',
            'checkin_date.date' => 'Phải là ngày!',
            'checkout_date.required' => 'Chon ngày trả!',
            'checkout_date.date' => 'Phải là ngày!',
            'status_pay.required' => 'Chon trang thái thanh toán!',
            'people.required' => 'Chon số lượng người!',
            'room_id.required' => 'Chon phòng!',
            'cate_room_id.required' => 'Chon loại phòng!',
            'status_booking.required' => 'Chon trạng thái đơn!',
            'staff_id.required' => 'Chon nhân viên!',
        ];
    }
}
