<?php
/**
 * 顧客作成のフォームリクエスト。
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 顧客作成のRequetクラス
 *
 * @package App\Http\Requests
 */
class CustomerRequest extends FormRequest
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
     * 顧客作成のバリデーション。
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
            'post_code' => 'required','regex:/^[0-9]{3}-[0-9]{4}$/',
            'pref_id' => 'required',
            'city_id' => 'required',
            'address' => 'required|max:80',
            'buildding' => 'max:80',
            'tel' => 'required','regex:/^0\d{1,3}-\d{1,4}-\d{4}$/',
            'mobile' => 'required','regex:/^(070|080|090)-\d{4}-\d{4}$/',
            'email' => 'required|email|unique:customers|max:80'
        ];
    }
}
