<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Pref;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\CustomerSerchRequest;
use DB;


class CustomersController extends Controller
{
    public function index(){
        //customersテーブルのデータを全取得
        $customers = Customer::all();

        //prefsテーブルのデータを全取得
        $prefs = Pref::all();

        //初期の検索リクエスト値（serchアクションの$serch表示のため）
        $serch_last_kana = NULL;
        $serch_first_kana = NULL;
        $serch_gender1 = NULL;
        $serch_gender2 = NULL;
        $serch_pref_id = NULL;

        return view('index', compact('customers','prefs','serch_last_kana','serch_first_kana','serch_gender1','serch_gender2','serch_pref_id'));


    }

    //検索処理方法
    public function serch(CustomerSerchRequest $request){


        //prefsテーブルのデータを全取得
        $prefs = Pref::all();

        //検索リクエストを取得
        $serch_last_kana = $request->input('last_kana');
        $serch_first_kana = $request->input('first_kana');
        $serch_gender1 = $request->input('gender1');
        $serch_gender2 = $request->input('gender2');
        $serch_pref_id = $request->input('pref_id');

        //クエリ取得
        $query = Customer::query();

        //条件1
        if(!empty($serch_last_kana))  {
            $query->where('last_kana','like', '%'.$serch_last_kana.'%');
        }

        //条件2
        if(!empty($serch_first_kana)) {
            $query->where('first_kana','like', '%'.$serch_first_kana.'%');
        }

        //条件3
        if(!empty($serch_gender1) || !empty($serch_gender2) ) {
                $query->whereIn('gender', [$serch_gender1,$serch_gender2]);
        }

        //条件4
        if(!empty($serch_pref_id)) {
            $query->where('pref_id', $serch_pref_id);
        }

        $customers = $query->get();

        return view('index',compact('customers','prefs','serch_last_kana','serch_first_kana','serch_gender1','serch_gender2','serch_pref_id') );

    }


    public function detail($id){
        //customersテーブルのIDで顧客情報を取得
        $customers = Customer::findOrFail($id);
        return view('detail', compact('customers'));
    }

    //deatailファイルからの削除方法
    public function destroy($id){
        $customers = Customer::findOrFail($id);

        $customers->delete();

        return redirect()->route('customers.index');
    }

    public function create(){
        //prefsテーブルのデータを取得
        $prefs = Pref::all();
        return view('create', compact('prefs'));
    }

    //createのデータ送り先
    public function store(CustomerRequest $request){
        //formの値を取得
        $input = $request->input();
        //トークンを消す
        unset($input['_token']);

        DB::transaction(function () use ($input) {
        $customer = new Customer();
        $customer->fill($input)->save();
        });

        return redirect()->route('customers.index')->with('signup_message','登録しました。');

    }

    public function edit($id){
        $customers = Customer::findOrFail($id);
        $prefs = Pref::all();


        return view('edit', compact('customers', 'prefs'));
    }

    //update時のformの値を取得
    public function update(CustomerUpdateRequest $request){

        //formの値を取得
        $input = $request->input();
        //トークンを消す
        unset($input['_token']);

        DB::transaction(function () use ($input) {
        $customer = Customer::findOrFail($input['id']);
        $customer->fill($input)->save();
        });

        return redirect()->route('customers.index');


    }

}
