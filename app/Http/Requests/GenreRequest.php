<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
            'name' => ['required','max:191'],
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '入力必須です',
            'name.max' => '191文字以下で入力してください',
            'image.required' => 'ファイルを選択してください',
        ];
    }
}
