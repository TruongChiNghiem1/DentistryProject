<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UserRequest extends FormRequest
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
        // dd(request()->route('uuid'));
        return [
            'name' => 'required',
            'password' => request()->route('uuid')
                    ? ''
                    : 'required|min:8',
            'phone' => request()->route('uuid')
                    ? 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'. Rule::unique('users')->ignore(request()->route('uuid'), 'uuid')
                    : 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,phone',
            'email' => request()->route('uuid')
                    ? 'email|'. Rule::unique('users')->ignore(request()->route('uuid'), 'uuid')
                    : 'email|unique:users,email',
        ];
    }

    public function messages (){
        return [
            'name.required' => 'Vui lòng nhập tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại này đã được sử dụng',
            'phone.regex' => 'Vui lòng nhập đúng số điện thoại',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 số',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email này đã được sử dụng',
            'email.email' => 'Đây không phải là email',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải ít nhất có 8 ký tự'
        ];
    }
}
