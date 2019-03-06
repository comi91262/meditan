<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::get('questions/_user/{userId}', 'QuestionController@index');
Route::get('questions/{section}/{number}', 'QuestionController@show');
Route::get('questions/{section}/{number}/hint', 'QuestionController@showHint');
Route::put('questions/{section}/{number}', 'QuestionController@update');

Route::get('terms/_department/{id}', 'TermApiController@show');

Route::get('departments', 'DepartmentApiController@index');
Route::post('user_terms', 'UserTermApiController@create');

