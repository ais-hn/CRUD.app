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
}
