<?php
/**
 * 市区町村テーブルのモデル。
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 市区町村Modelのクラス。
 *
 * @package App
 */
class City extends Model
{
    protected $guarded = ['id'];
    protected $date = ['created_at', 'updated_at'];

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
}
