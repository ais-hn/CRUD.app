<?php
/**
 * 顧客編集のフォームリクエスト
 */
namespace App\Http\Requests;

use App\Http\Requests\AppRequest;

/**
 * 顧客更新Requestクラス
 *
 * @package App\Http\Requests
 */
class CustomerUpdateRequest extends AppRequest
{
    /**
     * 顧客編集のバリデーション。
     *
     * @return array 顧客テーブルのカラム。
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
            'post_code' => 'regex:/^[0-9]{3}-[0-9]{4}$/',
            'pref_id' => 'required',
            'city_id' => 'required',
            'address' => 'required|max:80',
            'buildding' => 'max:80',
            'tel' => 'required','regex:/^0\d{1,3}-\d{1,4}-\d{4}$/',
            'mobile' => 'required','regex:/^(070|080|090)-\d{4}-\d{4}$/',
            'email' => 'required|email|max:80|unique_email'
        ];
    }
    /**
     * 編集時のメールアドレスのバリデーションエラ〜メッセージ。
     *
     * @return array エラーメッセージ。
     */
    public function messages()
    {
        return [
            'email.unique_email' => 'メールアドレスは既に登録されています。',
        ];
    }
}
