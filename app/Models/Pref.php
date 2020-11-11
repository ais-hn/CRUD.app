<?php
/**
 *顧客テーブルのモデル。
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 都道府県Modelのクラスです。
 *
 * @package App\Models
 */
class Pref extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['created_at','updated_at'];
}
