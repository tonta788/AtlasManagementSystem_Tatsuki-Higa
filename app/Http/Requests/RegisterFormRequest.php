<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u|max:30',
            'under_name_kana' => 'required|string|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u|max:30',
            'mail_address' => 'required|email|max:100|unique:users',
            'sex' => 'required',
            'birth_day' => 'required|date|after_or_equal:2000-01-01|before_or_equal:today',
            'role' => 'required|in:1,2,3,4',
            'password' => 'required|min:8|max:30|confirmed',
            'password_confirmation' => 'required|min:8|max:30',
        ];
    }
    protected function prepareForValidation()
    {
        // 日時をデータに追加
        $birth_day = ($this->filled(['old_year', 'old_month', 'old_day'])) ? $this->old_year .'-'. $this->old_month .'-'. $this->old_day: '';

        $this->merge([
           'birth_day' => $birth_day
        ]);
}
}
