<?php
/**
 * CRUDアプリのコントローラー。
 */
namespace App\Http\Controllers;

use App\Customer;
use App\Pref;
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
 */
class CustomersController extends Controller
{
    /**
     * 検索一覧を表示します。
     *
     * @var $input 検索フォームの初期表示として使用。
     *
     * @return view
     */
    public function index(): view
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
     *
     * @param CustomerSearchRequest $request リクエスト
     *
     * @return view
     */
    public function search(CustomerSearchRequest $request): view
    {
        $prefs = Pref::all();

        $input = $request->input();

        $query = Customer::query();

        //条件1
        if (!empty($input['last_kana'])) {
            $query->where('last_kana', 'like', '%'.$input['last_kana'].'%');
        }

        //条件2
        if (!empty($input['first_kana'])) {
            $query->where('first_kana', 'like', '%'.$input['first_kana'].'%');
        }

        //条件3
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

        //条件4
        if (!empty($input['pref_id'])) {
            $query->where('pref_id', $input['pref_id']);
        }

        $customers = $query->get();

        return view('index', ['customers' => $customers], ['prefs' => $prefs])->with('input', $input);
    }

    /**
     * 顧客詳細を表示します。
     *
     * @param $id idパラメーター
     *
     * @return view
     */
    public function detail($id): view
    {
        $customers = Customer::findOrFail($id);
        return view('detail', ['customers' => $customers]);
    }

    /**
     * 顧客詳細から顧客データを消します。
     *
     * @param $id idパラメーター
     *
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
     * @return view
     */
    public function create(): view
    {
        $prefs = Pref::all();
        return view('create', ['prefs' => $prefs]);
    }

    /**
     * 顧客データの保存処理をします。
     *
     * @param CustomerRequest $request リクエスト
     *
     * @return RedirectResponce
     */
    public function store(CustomerRequest $request): RedirectResponse
    {
        $input = $request->input();

        unset($input['_token']);

        DB::transaction(function () use ($input) {
            $customer = new Customer();
            $customer->fill($input)->save();
            }
        );

        return redirect()->route('customers.index')
            ->with('signup_message', '登録しました。');
    }

    /**
     * 顧客データを編集します。
     *
     * @param $id パラメーターid
     *
     * @return view
     */
    public function edit($id): view
    {
        $customers = Customer::findOrFail($id);
        $prefs = Pref::all();

        return view('edit', ['customers' => $customers], ['prefs' => $prefs]);
    }
    /**
     * 編集した顧客データをアップデートします。
     *
     * @param CustomerUpdateRequest $request リクエスト
     *
     * @return RedirectResponce
     */
    public function update(CustomerUpdateRequest $request): RedirectResponse
    {

        $input = $request->input();

        unset($input['_token']);

        DB::transaction(function () use ($input) {
            $customer = Customer::findOrFail($input['id']);
            $customer->fill($input)->save();
            }
        );

        return redirect()->route('customers.index');
    }
}
