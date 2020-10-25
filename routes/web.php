<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\CustomersController;

//indexファイル(検索一覧)の表示
Route::get('/','CustomersController@index')->name('customers.index');

//createファイル(顧客作成)の表示
Route::get('/create','CustomersController@create')->name('customers.create');

//detailファイル(顧客詳細)の表示
Route::get('/{id}','CustomersController@detail')->name('customers.detail');

//顧客作成後の送信先
Route::post('/store', 'CustomersController@store')->name('customers.store');

//editファイルの(顧客編集)の表示
Route::get('/{id}/edit','CustomersController@edit')->name('customers.edit');

//editファイルの更新送信先
Route::post('/update', 'CustomersController@update')->name('customers.update');

//detailファイルからの削除
Route::get('/destoroy/{id}', 'CustomersController@destroy')->name('customers.destroy');
