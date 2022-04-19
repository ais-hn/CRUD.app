<?php
/**
 * 顧客テーブルのモデル。
 */
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AppModel;

/**
 * 顧客Modelのクラス。
 * ソフトデリートを使用。
 *
 * @package App\Models
 */
class Customer extends AppModel
{
    use SoftDeletes;

    protected $dates = ['birthday','created_at','updated_at','deleted_at'];

    /**
     * 都道府県テーブルとのリレーション。
     *
     * @return void
     */
    public function pref()
    {
        return $this->belongsTo('App\Models\Pref');
    }

    /**
     * 市区町村テーブルとのリレーション。
     * 市区町村テーブルのIDと顧客テーブルのcity_idを紐付け。
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
