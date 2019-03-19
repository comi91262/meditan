<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->group(function () {
    Route::get('questions', 'QuestionApiController@index');
    Route::get('questions/{section}/count', 'QuestionApiController@showSuccessCount');
    Route::get('questions/{section}/{number}', 'QuestionApiController@show');
    Route::get('questions/{section}/{number}/hint', 'QuestionApiController@showHint');
    Route::put('questions/{section}/{number}', 'QuestionApiController@update');
    Route::get('terms/_department/{id}', 'TermApiController@show');
    Route::get('departments', 'DepartmentApiController@index');
    Route::get('user_terms', 'UserTermApiController@index');
    Route::post('user_terms', 'UserTermApiController@create');
    Route::delete('user_terms/{id}', 'UserTermApiController@destroy');
});
