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

Route::get('questions/_user/{userId}', 'QuestionController@index');
Route::get('questions/{section}/count', 'QuestionController@showSuccessCount');
Route::get('questions/{section}/{number}', 'QuestionController@show');
Route::get('questions/{section}/{number}/hint', 'QuestionController@showHint');
Route::put('questions/{section}/{number}', 'QuestionController@update');

Route::get('terms/_department/{id}', 'TermApiController@show');
Route::get('departments', 'DepartmentApiController@index');

Route::get('user_terms/_user/{userId}', 'UserTermApiController@index');
Route::post('user_terms/_user/{userId}', 'UserTermApiController@create');
Route::delete('user_terms/{id}/_user/{userId}', 'UserTermApiController@destroy');


// TODO laravel airport を試す。
// Route::middleware(['auth:api'])->group(function () {
// });