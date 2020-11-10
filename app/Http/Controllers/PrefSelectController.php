<?php
/**
 * Ajaxで市区町村テーブルを取得するコントローラー
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Http\JsonResponse;

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
     * @param Request $request 都道府県ID
     * @return JsonResponse レスポンス
     */
    public function prefSelect(Request $request): JsonResponse
    {
        $city = City::where('pref_id', '=', $request->pref_id)->get();
        return response()->json($city);
    }
}
