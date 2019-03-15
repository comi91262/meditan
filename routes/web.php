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


Route::middleware(['auth'])->group(function () {
    Route::get('/', 'MenuController@index');
    Route::get('/select', 'MenuController@select')->name('menu.select');
    Route::post('/exam', 'MenuController@exam')->name('menu.exam');
    Route::get('/select_condition', 'MenuController@selectCondition')->name('menu.select_condition');
    Route::post('/exam_condition', 'MenuController@examCondition')->name('menu.exam_condition');
    Route::get('/exam_retry', 'MenuController@examRetry')->name('menu.exam_retry');
    Route::get('/add_term', 'MenuController@showAdditionTerm')->name('menu.show_add_term');
    Route::get('/list', 'MenuController@list')->name('menu.list');
});

Auth::routes();
