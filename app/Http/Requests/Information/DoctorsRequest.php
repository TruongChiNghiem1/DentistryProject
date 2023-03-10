<?php

namespace App\Http\Requests\Information;

use Illuminate\Foundation\Http\FormRequest;

class DoctorsRequest extends FormRequest
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
            'doctor_name' => 'required',
            'doctor_birth' => 'required',
            'doctor_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'ethnic' => 'required',
            'position' => 'required',
            'email' => 'required',
            'address' => 'required',
            'services_id' => 'required',
            'worktime' => 'required',
        ];
    }

    public function messages(){
        return [
            'doctor_name.required' => 'Vui lòng nhập tên bác sĩ',
            'avatar.required' => 'Vui lòng thêm ảnh bác sĩ',
            'doctor_birth.required' => 'Vui lòng nhập ngày sinh của bác sĩ',
            'doctor_phone.required' => 'Vui lòng nhập số điện thoại của bác sĩ',
            'doctor_phone.regex' => 'Vui lòng nhập đúng số điện thoại',
            'doctor_phone.min' => 'Số điện thoại phải có ít nhất 10 số',
            'ethnic.required' => 'Vui lòng nhập dân tộc',
            'position.required' => 'Vui lòng chọn chức vụ của bác sĩ',
            'email.required' => 'Vui lòng nhập email',
            'address.required' => 'Vui lòng nhập địa chỉ nhà của bác sĩ',
            'services_id.required' => 'Vui lòng chọn các chuyên môn của bác sĩ',
            'worktime.required' => 'Vui lòng chọn thời gian làm việc trong tuần của bác sĩ'
        ];
    }
}
