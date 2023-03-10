<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomsRequest extends FormRequest
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
                    case 'rooms_add':
                        $rules = [
                            "name" => "required",
                            // "cate_room" => "required",
                            // "images" => "required",
                            // "floor" => "required",
                            "description" => "required",
                            "adult" => "required|max:2000",
                            "childrend" => "required",
                            "bed" => "required",
                        ];
                        break;
                    case 'rooms_update':
                        $rules = [
                            "name" => "required",
                            // "cate_room" => "required",
                            // "images" => "required",
                            // "floor" => "required",
                            "description" => "required",
                            "adult" => "required|max:2000",
                            "childrend" => "required",
                            "bed" => "required",
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
            'name.required' => 'Bạn phải nhập tên phòng',
            // 'floor.required' => 'Bạn phải nhập vị trí tầng',
            'description.required' => 'Bạn phải nhập thông tin mô tả',
            'adult.required' => 'Bạn phải nhập số lượng người lớn',
            'childrend.max' => 'Bạn phải nhập số lượng trẻ em',
            'bed.required' => 'Bạn phải nhập số lượng giường',  
        ];
    }
}