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

Route::get('/', 'MenuController@index')->middleware('auth.basic');
Route::get('/exam', 'MenuController@exam')->name('menu.exam')->middleware('auth.basic');
Route::get('/history', 'MenuController@history')->name('menu.history')->middleware('auth.basic');
Route::get('/list', 'MenuController@list')->name('menu.list')->middleware('auth.basic');

// TODO あとでフレームワークに頼らない形に
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
