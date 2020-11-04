<?php

/**
 * 顧客検索のフォームリクエスト。
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 顧客検索のRequestクラス。
 *
 * @package App\Http\Requests
 */
class CustomerSearchRequest extends FormRequest
{
    /**
     * リクエストに対する権限設定。
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 検索一覧のバリデーション。
     *
     * @return array　顧客テーブルのカラム。
     */
    public function rules()
    {
        return [
            'last_kana' => 'max:50',
            'first_kana' => 'max:50',
        ];
    }
}
