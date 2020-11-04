<?php
/**
 * 顧客編集のフォームリクエスト。
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
{
    /**
     * リクエストに対する権限設定。
     *
     * @package App\Http\Requests
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 顧客編集のバリデーション。
     *
     * @return array 顧客情報のカラム。
     */
    public function rules()
    {
        return [
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
            'last_kana' => 'required|max:50',
            'first_kana' => 'required|max:50',
            'gender' => 'required',
            'birthday' => 'required|date',
            'pref_id' => 'required',
            'address' => 'required|max:80','regex:/^[0-9]{3}-[0-9]{4}$/',
            'buildding' => 'max:80',
            'tel' => 'required','regex:/^0\d{1,3}-\d{1,4}-\d{4}$/',
            'mobile' => 'required','regex:/^(070|080|090)-\d{4}-\d{4}$/',
            'email' => 'required|email|max:80'
        ];
    }
}
