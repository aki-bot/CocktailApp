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

//一番最初にトップページに飛ぶように指示
    Route::get('/','TopController@index');

    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' =>'admin','middleware' => 'auth'],function(){
    // ->middleware('auth');をすることによってこのアクションにブラウザから命令がきたらまずログイン画面にリダイレクト(移動)するように命令することができる
    // middlwareはフィルタリング機能がある
    Route::get('drink/create','Admin\DrinkController@add');
    //postはgetと違ってURLを一緒に送らない/データの更新とかそう言う時に使う
    Route::post('drink/create','Admin\DrinkController@create');
    //カクテルの一覧画面を表示させるように言っている
    Route::get('drink', 'Admin\DrinkController@index');
    //カクテルの編集画面に移動するように言っている
    Route::get('drink/edit', 'Admin\DrinkController@edit');
    //編集を押したら編集できるようにしている
    Route::post('drink/edit', 'Admin\DrinkController@update');
    //削除を押したら削除できるようにしている
    Route::get('drink/delete', 'Admin\DrinkController@delete');
    //ユーザーがしてくれたレビューに対してのページ
    Route::get('review','Admin\ReviewController@create');
    Route::get('review/delete', 'Admin\ReviewController@delete');
    //リクエスト一覧を表示することができる
    Route::get('proporsal','Admin\ProporsalController@create');
});


    
    //カクテル一覧画面の分類
    Route::get('drink/index', 'DrinkController@index');
    Route::get('drink/show','DrinkController@show');
    Route::get('drink/create','DrinkController@create');
    
    //レビューに関する分類
    Route::get('review/index','ReviewController@index');
    Route::get('review/create','ReviewController@add');
    Route::post('review/create','ReviewController@create');
    Route::get('review/end','ReviewController@end');
    // Route::get('review/show','ReviewController@abb');
    Route::get('review/show','ReviewController@show');
    
    //リクエストに関する分類
    Route::get('request/index','RequestController@index');
    //データを保存する時にはaddアクションからのpostでcreateアクションへ
    //addのbladeファイルは実際にはない
    //飛ばせるようにする
    Route::get('request/create','RequestController@add');
    Route::post('request/create','RequestController@create');
    Route::get('request/end','RequestController@end');
    

    //ホームページに関する分類
    Route::get('top/index','TopController@index');
    
