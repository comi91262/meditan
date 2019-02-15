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

Route::middleware(['auth.basic'])->group(function () {
    Route::get('/', 'MenuController@index');
    Route::get('/exam', 'MenuController@exam')->name('menu.exam');
    Route::get('/history', 'MenuController@history')->name('menu.history');
    Route::get('/list', 'MenuController@list')->name('menu.list');
});

// TODO あとでフレームワークに頼らない形に
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
