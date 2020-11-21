<?php
/**
 * Ajaxで市区町村テーブルを取得するコントローラー
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use City;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\AppRequest;

/**
 * 市区町村テーブル取得するControllerのクラス
 *
 * @package App\Http\Controllers
 */
class PrefSelectController extends Controller
{
    /**
     * 市区町村テーブルのデータをjsonで渡します。
     *
     * @param AppRequest $request リクエスト
     * @return JsonResponse レスポンス
     */
    public function prefSelect(AppRequest $request): JsonResponse
    {
        $city = City::getList($request->pref_id);
        return response()->json($city);
    }
}