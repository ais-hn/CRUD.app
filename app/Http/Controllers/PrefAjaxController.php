<?php
/**
 * Ajaxで市区町村テーブルを取得するコントローラー
 */

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\AppRequest;
use App\Http\Controllers\Controller;

/**
 * 市区町村テーブル取得するControllerのクラス
 *
 * @package App\Http\Controllers
 */
class PrefAjaxController extends Controller
{
    /**
     * 市区町村テーブルのデータをjsonで渡します。
     *
     * @param AppRequest $request リクエスト
     * @return JsonResponse レスポンス
     */
    public function prefSelect(AppRequest $request): JsonResponse
    {
        $city = City::where('pref_id', '=', $request->pref_id)->get();
        return response()->json($city);
    }
}