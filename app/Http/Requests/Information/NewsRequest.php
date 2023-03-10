<?php

namespace App\Http\Requests\Information;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'intro' => 'required',
            'decription' => 'required',
            'images' => request()->route('uuid') 
                    ? ''
                    : 'required'
        ];
    }

    public function messages (){
        return [
            'intro.required' => 'Vui lòng nhập tiêu đề tin',
            'decription.required' => 'Vui lòng nhập nội dung tin',

            'images.required' => 'Vui lòng thêm ảnh chính cho tin tức'
        ];
    }
}
