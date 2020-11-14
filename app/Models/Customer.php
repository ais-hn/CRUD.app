<?php
/**
 * 顧客テーブルのモデル。
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 顧客Modelのクラス。
 * ソフトデリートを使用。
 *
 * @package App\Models
 */
class Customer extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
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
