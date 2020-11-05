<?php
/**
 * 顧客コントローラー。
 */
namespace App\Http\Controllers;

use App\Customer;
use App\Pref;
use App\Cities;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\CustomerSearchRequest;
use Illuminate\View\View;
use DB;
use Illuminate\Http\RedirectResponse;

/**
 * 顧客Controllerのクラス
 *
 * @author hanayama <01.hanayama@gmail.com>
 * @package App\Http\Controllers
 */
class CustomersController extends Controller
{
    /**
     * 検索一覧を表示します。
     *
     * @param $input 検索フォームの初期表示として使用。
     * @return View
     */
    public function index(): View
    {
        $customers = Customer::all();

        $prefs = Pref::all();

        $input = [
            'last_kana' => '',
            'first_kana' => '',
            'pref_id' => ''
        ];

        return view('index', ['customers' => $customers], ['prefs' => $prefs])
        ->with('input', $input);
    }

    /**
     * 検索の値を取得し、検索します。
     * 条件は4つです。
     *
     * @param CustomerSearchRequest $request リクエスト
     * @return View
     */
    public function search(CustomerSearchRequest $request): View
    {
        $prefs = Pref::all();

        $input = $request->input();

        $query = Customer::query();

        if (!empty($input['last_kana'])) {
            $query->where('last_kana', 'like', '%'.$input['last_kana'].'%');
        }
        if (!empty($input['first_kana'])) {
            $query->where('first_kana', 'like', '%'.$input['first_kana'].'%');
        }
        if (!empty($input['gender1']) || !empty($input['gender2'])) {
            $genders = [];
            if (!empty($input['gender1'])) {
                $genders[] = $input['gender1'];
            }
            if (!empty($input['gender2'])) {
                $genders[] = $input['gender2'];
            }
            $query->whereIn('gender', $genders);
        }
        if (!empty($input['pref_id'])) {
            $query->where('pref_id', $input['pref_id']);
        }

        $customers = $query->get();

        return view('index', ['customers' => $customers], ['prefs' => $prefs])->with('input', $input);
    }

    /**
     * 顧客詳細を表示します。
     *
     * @param $id 顧客ID
     * @return View
     */
    public function detail($id): View
    {
        $customers = Customer::findOrFail($id);
        return view('detail', ['customers' => $customers]);
    }

    /**
     * 顧客詳細から顧客データを消します。
     *
     * @param $id 顧客ID
     * @return RedirectResponce
     */
    public function destroy($id): RedirectResponse
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();

        return redirect()->route('customers.index');
    }

    /**
     * 顧客データを生成します。
     *
     * @return View
     */
    public function create(): View
    {
        $prefs = Pref::all();
        return view('create', ['prefs' => $prefs]);
    }

    /**
     * 顧客データの保存処理をします。
     *
     * @param CustomerRequest $request リクエスト
     * @return RedirectResponce リダイレクト
     */
    public function store(CustomerRequest $request): RedirectResponse
    {
        $input = $request->input();

        unset($input['_token']);

        DB::transaction(function () use ($input) {
            $customer = new Customer();
            $customer->fill($input)->save();
            });

        return redirect()->route('customers.index')
            ->with('signup_message', '登録しました。');
    }

    /**
     * 顧客データを編集します。
     *
     * @param $id 顧客ID
     * @return View
     */
    public function edit($id): View
    {
        $customers = Customer::findOrFail($id);
        $prefs = Pref::all();

        return view('edit', ['customers' => $customers], ['prefs' => $prefs]);
    }
    /**
     * 編集した顧客データをアップデートします。
     *
     * @param CustomerUpdateRequest $request リクエスト
     * @return RedirectResponce リダイレクト
     */
    public function update(CustomerUpdateRequest $request): RedirectResponse
    {

        $input = $request->input();

        unset($input['_token']);

        DB::transaction(function () use ($input) {
            $customer = Customer::findOrFail($input['id']);
            $customer->fill($input)->save();
            });

        return redirect()->route('customers.index');
    }

    /**
     * 市区町村テーブルのデータをjsonで渡します。
     */
    public function prefSelect($pref_id)
    {
        $cities = Cities::findOrFail($pref_id);
        return response()->json(['cities' => $cities]);
    }
}
