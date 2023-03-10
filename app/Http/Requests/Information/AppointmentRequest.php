<?php

namespace App\Http\Requests\Information;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required',
            'services_id' => 'required',
            'doctors_id' => 'required'
        ];
    }

    public function messages(){
        return [
          'name.required' => 'Vui lòng nhập tên của bạn',
          'services_id.required' => 'Vui lòng chọn dịch vụ mà bạn quan tâm',
          'doctors_id.required' => 'Vui lòng chọn bác sĩ',
          'phone.required' => 'Vui lòng nhập số điện thoại',
          'phone.regex' => 'Vui lòng nhập đúng số điện thoại',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 số',
          'email.required' => 'Vui lòng nhập email'  
        ];
    }
}
