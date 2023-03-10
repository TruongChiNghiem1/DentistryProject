<?php

namespace App\Http\Requests\Information;

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
        // 'name_vi'      => request()->route('product')
        //         ? 'required|max:255|' . Rule::unique('products')->ignore(request()->route('product'), 'uuid')
        //         : 'required|max:255|unique:products,name_vi',
        return [
            'name' => 'required',
            'gender' => 'required',
            'phone' => request()->route('uuid')
                    ? 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'. Rule::unique('users')->ignore(request()->route('uuid'), 'uuid')
                    : 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,phone',
            'email' => request()->route('uuid')
                    ? '|'. Rule::unique('users')->ignore(request()->route('uuid'), 'uuid')
                    : '|unique:users,email',
            'birth' => 'required',
            'image' => empty(request()->route('uuid'))
                    ? 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    : 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên bệnh nhân',
            'gender.required' => 'Vui lòng nhập giới tính bệnh nhân',
            'phone.required' => 'Vui lòng nhập số điện thoại bệnh nhân',
            'phone.unique' => 'Số điện thoại này đã được sử dụng',
            'phone.regex' => 'Vui lòng nhập đúng số điện thoại',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 số',
            'email.email' => 'Vui lòng nhập đúng email',
            'email.unique' => 'Email này đã được sử dụng',
            'birth.required' => 'Vui lòng nhập ngày sinh bệnh nhân',

            'image.mimes' => 'Vui lòng chọn đúng định dạng hình',
            'image.image' => 'Vui lòng chọn đúng định dạng hình',
            'image.max' => 'Ảnh tối đa 2MB'
        ];
    }
}
