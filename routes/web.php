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
    return view('FrontPage/mainPage');
});
Route::get('/contact', 'FrontPageController@contact');
Route::get('/userRequest', 'FrontPageController@userRequest');
Route::post('/userRequestSend', 'FrontPageController@userRequestSend');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('recipes', 'RecipesController');