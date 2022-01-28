<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'min:8',Rules\Password::defaults()],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '入力必須です',
            'name.string' => '形式に誤りがあります',
            'name.max' => '191文字以下で入力してください',
            'email.required' => '入力必須です',
            'email.string' => '形式に誤りがあります',
            'email.email' => 'メールアドレスで入力してください',
            'email.max' => '191文字以下で入力してください',
            'email.unique' => 'このアカウント名は既に存在します',
            'password.required' => '入力必須です',
            'password.min' => '8文字以上入力してください',
        ];
    }
}
