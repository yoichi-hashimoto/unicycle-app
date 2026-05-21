<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'login_id' =>['string','min:4','required','unique:users,login_id'],
            'name'=>['string','min:1','max:10','required','unique:users,name'],
            'password' =>['string','min:6','required','confirmed'],
            'member_avatar_id'=>['integer','required']
        ];
    }

    public function messages(){

        return[
            'login_id.string' => 'IDは文字列で入力してください',
            'login_id.min' => 'IDは4文字以上で入力してください',
            'login_id.required' =>'IDは必須です',
            'login_id.unique' =>'既に使われているIDです',
            'name.unique' =>'既に使われているなまえです',
            'name.string' => 'なまえは文字列で入力してください',
            'name.required' => 'なまえは入力必須です',
            'name.max' => 'なまえは10文字以内にしてください',
            'name.min'=>'なまえは最低でも1文字以上にしてください',
            'password.string'=>'パスワードは文字列で入力してください',
            'password.min' => 'パスワードは6文字以上にしてください',
            'password.required' => 'パスワードは必須です',
            'password.confirmed' => 'パスワードが正しくありません',
            'member_avatar_id' => 'アバターが選択されていません',
        ];
    }
}
