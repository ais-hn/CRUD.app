<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Pref;


class CustomersController extends Controller
{
    public function index(){
        //customersテーブルのデータを全取得
        $customers = Customer::all();

        return view('index', compact('customers'));


    }

    public function detail($id){
        //idでcustomersから情報取得
        $customers = Customer::findOrFail($id);
        return view('detail', compact('customers'));
    }

    public function create(){
        //prefsテーブルのデータを取得
        $prefs = Pref::all();
        return view('create', compact('prefs'));
    }

    //createのデータ送り先
    public function store(Request $request){
        $rules = [
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
            'last_kana' => 'required|max:50',
            'first_kana' => 'required|max:50',
            'gender' => 'required',
            'birthday' => 'required',
            'pref_id' => 'required',
            'address' => 'required|max:80|regex:/^[0-9]{3}-[0-9]{4}$/',
            'buildding' => 'max:80',
            'tel' => 'required|regex:/^0\d{1,3}-\d{1,4}-\d{4}$/',
            'mobile' => 'required|regex:/^(070|080|090)-\d{4}-\d{4}$/',
            'email' => 'required|email|unique:customers|max:80'
        ];

        $validated = $this->validate($request,$rules);

        $inputs = new Customer;
        $inputs -> Request::all();
        $inputs -> save();

        //下記は教材仕様で取得、DBに登録
        //$inputs = \Request::all();
        //Customer::create($inputs);

        return redirect()->route('customers.index');

    }

    public function edit(){
        return view('edit');
    }

}
