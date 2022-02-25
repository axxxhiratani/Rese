<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'subject' => ['required','max:191'],
            'text' => ['required','max:191']
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => '入力必須です',
            'subject.max' => '191文字以下で入力してください',
            'text.required' => '入力必須です',
            'text.max' => '191文字以下で入力してください'
        ];
    }
}
