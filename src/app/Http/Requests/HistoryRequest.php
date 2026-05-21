<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
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
            'practice_id' => 'required|exists:practices,id',
            'user_id'=>'required'
        ];
    }

    public function messages(){
        return[
            'user_id.required' =>'メンバーが選択されていません',
            'practice_id.exists' => 'わざが表示されていません',
        ];
    }
}
