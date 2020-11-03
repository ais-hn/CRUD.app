<?php
/**
 *顧客テーブルのモデル。
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * 都道府県Modelのクラスです。
 *
 * @var $dates 日付ミューテーターを使用します。
 */
class Pref extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['created_at','updated_at'];
}
