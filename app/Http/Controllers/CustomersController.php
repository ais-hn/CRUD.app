<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Pref;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use DB;


class CustomersController extends Controller
{
    public function index(){
        //customersテーブルのデータを全取得
        $customers = Customer::all();

        //prefsテーブルのデータを全取得
        $prefs = Pref::all();

        return view('index', compact('customers','prefs'));


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
