<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePasswordRequest extends FormRequest
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
                    case 'update_password':
                        $rules = [
                            'password' => 'required',
                            'new_password' => 'required|min:6|max:30|different:password',
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
            'password.require' => 'Mật khẩu bắt buộc nhập',
            'new_password.require' => 'Mật khẩu mới bắt buộc nhập',
            'new_password.min' => 'Mật khẩu mới tối thiểu 6 ký tự',
            'new_password.max' => 'Mật khẩu mới tối đa 32 ký tự',
            'new_password.different' => 'Mật khẩu mới phải khác mật khẩu cũ'
        ];
    }
}
