<?php

namespace App\Http\Requests\Information;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
            'services_name' => 'required',
            'price' => 'required',
            'insurance' => 'required',
            'decription' => 'required',
            'images' => request()->route('uuid') 
                    ? ''
                    : 'required'
        ];
    }

    public function messages(){
        return [
            'services_name.required' => 'Vui lòng nhập tên dịch vụ',
            'price.required' => 'Vui lòng nhập giá tiền cho dịch vụ này',
            'insurance.required' => 'Vui lòng nhập chế độ bảo hành của dịch vụ',
            'decription.required' => 'Vui lòng nhập mô tả của dịch vụ',
            'images.required' => 'Vui lòng thêm ảnh cho dịch vụ'
        ];
    }
}
