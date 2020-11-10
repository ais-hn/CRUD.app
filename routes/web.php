<?php
/**
 * CRUDアプリのルート。
 */
use App\Http\Controllers\CustomersController;

//indexファイル(検索一覧)の表示
Route::get('/', 'CustomersController@index')->name('customers.index');

//indexファイルから検索処理
Route::get('/serch', 'CustomersController@search')->name('customers.search');

//createファイル(顧客作成)の表示
Route::get('/create', 'CustomersController@create')->name('customers.create');

//detailファイルの顧客データの詳細表示
Route::get('/{id}', 'CustomersController@detail')->name('customers.detail');

//顧客データ作成後の送信先
Route::post('/store', 'CustomersController@store')->name('customers.store');

//editファイルの顧客編集画面の表示
Route::get('/{id}/edit', 'CustomersController@edit')->name('customers.edit');

//editファイルの顧客データの更新送信先
Route::post('/update', 'CustomersController@update')->name('customers.update');

//detailファイルからの顧客データの削除
Route::get('/destoroy/{id}', 'CustomersController@destroy')->name('customers.destroy');

//createファイル、editファイルの市区町村 ajax用
Route::get('/prefselect/{pref_id}', 'PrefSelectController@prefSelect')->name('pref.select');
