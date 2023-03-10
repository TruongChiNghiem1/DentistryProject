<?php

namespace App\Http\Requests\Information;

use Illuminate\Foundation\Http\FormRequest;

class AddpatientRequest extends FormRequest
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
            'medical_examination_day' => 'required',
            'reason' => 'required',
            'services_id' => 'required',
            'doctors_id' => 'required',
            'diagnosis' => 'required',
            'medical_summary' => 'required'
        ];
    }

    public function messages(){
        return [
            'medical_examination_day.required' => 'Vui lòng chọn ngày khám',
            'reason.required' => 'Vui lòng nhập lý do đến bệnh viện của bệnh nhân',
            'services_id.required' => 'Vui lòng chọn dịch vụ khám',
            'doctors_id.required' => 'Vui lòng chọn bác sĩ điều trị cho bệnh nhân',
            'diagnosis.required' => 'Vui lòng nhập chuẩn đoán của bác sĩ',
            'medical_summary.required' => 'Vui lòng tóm tắt bệnh án của bệnh nhân'
        ];
    }
}
