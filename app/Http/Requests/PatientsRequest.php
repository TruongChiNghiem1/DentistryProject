<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientsRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => request()->route('uuid')
                    ? 'email|'. Rule::unique('users')->ignore(request()->route('uuid'), 'uuid')
                    : 'email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ];
    }

    public function messages (){
        return [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Email không được bỏ trống',
            'email.unique' => 'Email này đã tồn tại rồi',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu không trùng nhau',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu',
        ];
    }
}
