<?php
/**
 * 顧客テーブルのモデル。
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * 顧客Modelのクラス。
 *
 * @package App
 */
class Customer extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['birthday','created_at','updated_at'];

    /**
     * 都道府県テーブルとのリレーション。
     * 都道府県テーブルのIDと顧客テーブルのpref_idを紐付け。
     *
     * @return void
     */
    public function pref()
    {
        return $this->belongsTo('App\Pref');
    }

    /**
     * 市区町村テーブルとのリレーション。
     * 市区町村テーブルのIDと顧客テーブルのcity_idを紐付け。
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
