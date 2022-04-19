<?php
/**
 * 基底モデル
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 基底Modelクラスです。
 *
 * @package App\Models
 */
abstract class AppModel extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * コンストラクタ
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * モデルを取得します。
     *
     * @param $id ID
     * @return mixed モデル
     */
    public static function findById($id)
    {
        return static::where('id', '=', $id)->first();
    }
}
