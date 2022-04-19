<?php
/**
 * 市区町村テーブルのモデル。
 */
namespace App\Models;

use App\Models\AppModel;

/**
 * 市区町村Modelのクラス。
 *
 * @package App\Models
 */
class City extends AppModel
{
    /**
     * 都道府県テーブルとのリレーション。
     * 都道府県テーブルのIDと顧客テーブルのpref_idを紐付け。
     *
     * @return void
     */
    public function pref()
    {
        return $this->belongsTo('App\Models\Pref');
    }
}
