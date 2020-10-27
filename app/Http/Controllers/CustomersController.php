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

        return view('index', compact('customers','prefs'));


    }

    //検索処理方法
    public function serch(CustomerSerchRequest $request){


        //prefsテーブルのデータを全取得
        $prefs = Pref::all();

        //検索リクエストを取得
        $serch = $request->input();
        //クエリの取得
        $query = Customer::query();


        //条件1(全て空欄時)
        if(empty($serch['last_kana']) && empty($serch['first_kana']) && empty($serch['gender']) && empty($serch['pref_id'])) {
            return redirect()->route('customers.index');
        }
        //条件2
        elseif(!empty($serch['last_kana']) && empty($serch['first_kana']) && empty($serch['gender']) && empty($serch['pref_id'])) {
            $customers = $query->where('last_kana','like', '%'.$serch['last_kana'].'%')->get();
            if($customers != Customer::all()){
                return redirect()->route('customers.index')->with('no_serch_message','該当データが見つかりません。');
            }
            return view('index',compact('customers','prefs'));
        }
        //条件3
        elseif(!empty($serch['last_kana']) && !empty($serch['first_kana']) && empty($serch['gender']) && empty($serch['pref_id'])) {
            $customers = $query->where('last_kana','like', '%'.$serch['last_kana'].'%')
                               ->where('first_kana','like', '%'.$serch['first_kana'].'%')
                               ->get();
            if($customers != Customer::all()){
                return view('index',compact('customers','prefs','no_serch_message'));
            }
            return view('index',compact('customers','prefs'));
        }
        //条件4
        elseif(!empty($serch['last_kana']) && !empty($serch['first_kana']) && !empty($serch['gender']) && empty($serch['pref_id'])) {
            $customers = $query->where('last_kana','like', '%'.$serch['last_kana'].'%')
                               ->where('first_kana','like', '%'.$serch['first_kana'].'%')
                               ->where('gender','like',$serch['gender'])
                               ->get();
             if($customers != Customer::all()){
                 return view('index',compact('customers','prefs','no_serch_message'));
            }
            return view('index',compact('customers','prefs'));
        }
        //条件5
        elseif(!empty($serch['last_kana']) && !empty($serch['first_kana']) && !empty($serch['gender']) && !empty($serch['pref_id'])) {
            $customers = $query->where('last_kana','like', '%'.$serch['last_kana'].'%')
                               ->where('first_kana','like', '%'.$serch['first_kana'].'%')
                               ->where('gender','like',$serch['gender'])
                               ->where('pref_id','like',$serch['pref_id'])
                               ->get();
            if($customers != Customer::all()){
                  return view('index',compact('customers','prefs','no_serch_message'));
            }
            return view('index',compact('customers','prefs'));
        }
        //条件6
        elseif(!empty($serch['last_kana']) && !empty($serch['first_kana']) && empty($serch['gender']) && !empty($serch['pref_id'])) {
            $customers = $query->where('last_kana','like', '%'.$serch['last_kana'].'%')
                               ->where('first_kana','like', '%'.$serch['first_kana'].'%')
                               ->where('pref_id','like',$serch['pref_id'])
                               ->get();
                if($customers != Customer::all()){
                     return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }
        //条件7
        elseif(!empty($serch['last_kana']) && empty($serch['first_kana']) && !empty($serch['gender']) && empty($serch['pref_id'])) {
            $customers = $query->where('last_kana','like', '%'.$serch['last_kana'].'%')
                               ->where('gender','like',$serch['gender'])
                               ->get();
                if($customers != Customer::all()){
                    return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }

        //条件8
        elseif(!empty($serch['last_kana']) && empty($serch['first_kana']) && !empty($serch['gender']) && !empty($serch['pref_id'])) {
            $customers = $query->where('last_kana','like', '%'.$serch['last_kana'].'%')
                               ->where('gender','like',$serch['gender'])
                               ->where('pref_id','like',$serch['pref_id'])
                               ->get();
                if($customers != Customer::all()){
                    return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }
        //条件9
        elseif(!empty($serch['last_kana']) && empty($serch['first_kana']) && empty($serch['gender']) && !empty($serch['pref_id'])) {
            $customers = $query->where('last_kana','like', '%'.$serch['last_kana'].'%')
                               ->where('pref_id','like',$serch['pref_id'])
                               ->get();
                if($customers != Customer::all()){
                    return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }
        //条件10
        elseif(empty($serch['last_kana']) && !empty($serch['first_kana']) && empty($serch['gender']) && empty($serch['pref_id'])) {
            $customers = $query->where('first_kana','like', '%'.$serch['first_kana'].'%')
                               ->get();
                if($customers != Customer::all()){
                    return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }
        //条件11
        elseif(empty($serch['last_kana']) && !empty($serch['first_kana']) && !empty($serch['gender']) && empty($serch['pref_id'])) {
            $customers = $query->where('first_kana','like', '%'.$serch['first_kana'].'%')
                               ->where('gender','like',$serch['gender'])
                               ->get();
                if($customers != Customer::all()){
                    return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }
        //条件12
        elseif(empty($serch['last_kana']) && !empty($serch['first_kana']) && !empty($serch['gender']) && !empty($serch['pref_id'])) {
            $customers = $query->where('first_kana','like', '%'.$serch['first_kana'].'%')
                               ->where('gender','like',$serch['gender'])
                               ->where('pref_id','like',$serch['pref_id'])
                               ->get();
                if($customers != Customer::all()){
                    return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }
        //条件13
        elseif(empty($serch['last_kana']) && !empty($serch['first_kana']) && empty($serch['gender']) && !empty($serch['pref_id'])) {
            $customers = $query->where('first_kana','like', '%'.$serch['first_kana'].'%')
                               ->where('pref_id','like',$serch['pref_id'])
                               ->get();
                if($customers != Customer::all()){
                    return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }
        //条件14
        elseif(empty($serch['last_kana']) && empty($serch['first_kana']) && !empty($serch['gender']) && empty($serch['pref_id'])) {
            $customers = $query->where('gender','like',$serch['gender'])
                               ->get();
                if($customers != Customer::all()){
                    return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }
        //条件15
        elseif(empty($serch['last_kana']) && empty($serch['first_kana']) && !empty($serch['gender']) && !empty($serch['pref_id'])) {
            $customers = $query->where('gender','like',$serch['gender'])
                               ->where('pref_id','like',$serch['pref_id'])
                               ->get();
                if($customers != Customer::all()){
                    return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }
        //条件16
        elseif(empty($serch['last_kana']) && empty($serch['first_kana']) && empty($serch['gender']) && !empty($serch['pref_id'])) {
            $customers = $query->where('pref_id','like',$serch['pref_id'])
                               ->get();
                if($customers != Customer::all()){
                    return view('index',compact('customers','prefs','no_serch_message'));
                }
            return view('index',compact('customers','prefs'));
        }
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
