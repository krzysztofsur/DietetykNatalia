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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');
Route::post('/logowanie','Api\AuthController@logowanie');
Route::get('/test','Api\AuthController@test');
Route::post('personaldata/{id}', 'Api\PersonalDataController@update');
Route::get('personaldata/{id}', 'Api\PersonalDataController@show');
Route::post('measurement/{id}', 'Api\MeasurementController@update');
Route::get('measurement/{id}', 'Api\MeasurementController@show');
Route::post('diary/{id}', 'Api\DiaryController@update');
Route::get('diary/{id}', 'Api\DiaryController@show');
Route::post('illnessandallergies/{id}', 'Api\IllnessAndAllergiesController@update');
Route::get('illnessandallergies/{id}', 'Api\IllnessAndAllergiesController@show');

