<?php
/**
 * 顧客コントローラー
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Customer;
use Pref;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\CustomerSearchRequest;
use Illuminate\View\View;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * 顧客Controllerクラス
 *
 * @author hanayama <01.hanayama@gmail.com>
 * @package App\Http\Controllers
 */
class CustomersController extends Controller
{
    /**
     * 検索一覧を表示
     *
     * @param $input 入力データ
     * @return View ビュー
     */
    public function index(): View
    {
        $customers = Customer::getList();

        $prefs = Pref::getList();

        $input = [
            'last_kana' => '',
            'first_kana' => '',
            'gender1' => null,
            'gender2' => null,
            'pref_id' => null,
        ];

        return view('index', ['customers' => $customers], ['prefs' => $prefs])
        ->with('input', $input);
    }

    /**
     * 検索の値を取得し、検索
     *
     * @param CustomerSearchRequest $request リクエスト
     * @return View ビュー
     */
    public function search(CustomerSearchRequest $request): View
    {
        $prefs = Pref::getList();

        $input = $request->input();

        $customers = Customer::getList($input);

        return view('index', ['customers' => $customers], ['prefs' => $prefs])->with('input', $input);
    }

    /**
     * 顧客詳細を表示
     *
     * @param $id 顧客ID
     * @return View ビュー
     */
    public function detail(Request $request): View
    {
        $customers = Customer::get($request->id);
        return view('detail', ['customers' => $customers]);
    }

    /**
     * 顧客詳細から顧客データを削除
     *
     * @param $id 顧客ID
     * @return RedirectResponse リダイレクト
     */
    public function destroy(Request $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            Customer::delete($request->id);
        });

        return redirect()->route('customers.index');
    }

    /**
     * 顧客データを生成
     *
     * @return View ビュー
     */
    public function create(): View
    {
        $prefs = Pref::getList();
        return view('create', ['prefs' => $prefs]);
    }

    /**
     * 顧客データの保存処理
     *
     * @param CustomerRequest $request リクエスト
     * @return RedirectResponse レスポンス
     */
    public function store(CustomerRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            Customer::save($request->input());
        });

        return redirect()->route('customers.index')
            ->with('signup_message', '登録しました。');
    }

    /**
     * 顧客データを編集
     *
     * @param $id 顧客ID
     * @return View ビュー
     */
    public function edit($id): View
    {
        $customers = Customer::get($id);
        $prefs = Pref::getList();

        return view('edit', ['customers' => $customers], ['prefs' => $prefs]);
    }
    /**
     * 編集した顧客データをアップデート
     *
     * @param CustomerUpdateRequest $request リクエスト
     * @return RedirectResponse レスポンス
     */
    public function update(CustomerUpdateRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            Customer::save($request->input(), $request->id);
        });

        return redirect()->route('customers.index');
    }
}
