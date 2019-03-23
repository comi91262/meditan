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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'MenuController@index');
    Route::get('/{any}', 'MenuController@index')->where('any', '.*'); // ブラウザ更新時の404対応。インフラが決まるまでの暫定対応
});
