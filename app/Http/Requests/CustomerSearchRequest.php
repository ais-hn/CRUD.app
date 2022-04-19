<?php

/**
 * 顧客検索のフォームリクエスト。
 */
namespace App\Http\Requests;

use App\Http\Requests\AppRequest;

/**
 * 顧客検索Requestクラス。
 *
 * @package App\Http\Requests
 */
class CustomerSearchRequest extends AppRequest
{
    /**
     * 検索一覧のバリデーション。
     *
     * @return array 顧客テーブルのカラム。
     */
    public function rules()
    {
        return [
            'last_kana' => 'max:50',
            'first_kana' => 'max:50',
        ];
    }
}
