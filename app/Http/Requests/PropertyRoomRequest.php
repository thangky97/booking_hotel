<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRoomRequest extends FormRequest
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

    public function rules(): array
    {
        return [
            "room_id" => "required",
            "properties_id" => "required",
        ];
    }

    public function messages()
    {
        return [
            'room_id.required' => 'Bạn phải chọn phòng',
            'properties_id.required' => 'Bạn phải chọn thuộc tính',
        ];
    }
}
