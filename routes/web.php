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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/user')->group(function(){
    Route::any('user','UserController@user');
    Route::any('loginHandel','UserController@loginHandel');
    Route::any('list','UserController@list');
    Route::any('del/{id}','UserController@del');
    Route::any('edit/{id}','UserController@edit');
    Route::any('update/{id}','UserController@update');
    Route::any('checkout','UserController@checkout');
});
Route::prefix('/line')->group(function(){
    Route::any('line','LineController@line');
    Route::any('insert','LineController@insert');
    Route::any('list','LineController@list');
    Route::any('lists','LineController@lists');
    Route::any('del/{id}','LineController@del');
    Route::any('edit/{id}','LineController@edit');
    Route::any('update/{id}','LineController@update');
    Route::any('checkout','LineController@checkout');
    Route::any('circuit/{id}','LineController@circuit');
});