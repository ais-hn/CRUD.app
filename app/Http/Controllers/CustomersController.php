<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;


class CustomersController extends Controller
{
    public function index(){
        //customersテーブルのデータを全取得
        $customers = Customer::all();

        return view('index', compact('customers'));


    }

    public function detail($id){
        $customers = Customer::all();
        return view('detail');
    }

    public function create(){
        return view('create');
    }

    public function edit(){
        return view('edit');
    }

}
