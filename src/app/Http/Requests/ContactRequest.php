<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ZipCodeRule;

class ContactRequest extends FormRequest
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
            'family-name' => ['required','string','max:255'],
            'given-name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255'],
            // 'gender' => ['nullable','string','max:255'],  // 不要
            'postcode' => ['required',new ZipCodeRule()],   // カスタムバリデーション
            'address' => ['required','string','max:255'],
            'building_name' => ['nullable','string','max:255'],
            'opinion' => ['required','string','max:120'],
        ];
    }
    
    public function messages()
    {
        return [
            'family-name.required' => '※名前（性）を入力してください',
            'family-name.max' => '※名前（性）を文字数255字以内で入力してください',
            'given-name.required' => '※名前（名）を入力してください',
            'given-name.max' => '※名前（名）を文字数255字以内で入力してください',
            'email.required' => '※メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'address.required' => '※住所を入力してください',
            'address.max' => '※住所を文字数255字以内で入力してください',
            'building_name.max' => '※建物名を文字数255字以内で入力してください',
            'opinion.required' => '※ご意見を入力してください',
            'opinion.max' => '※ご意見は120文字以下で入力してください',
        ];
    }
}
