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
Route::get('/FrontUserRequest', 'FrontPageController@FrontUserRequest');
Route::post('/FrontUserRequestSend', 'FrontPageController@FrontUserRequestSend');

Route::resource('userRequest', 'UserRequestController');
Route::resource('createUser', 'UserCreateController');
Route::resource('userList', 'UserListController');
Route::resource('products', 'ProductController');
Route::resource('addCategory', 'ProductCategoryControllse');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'middleware' => 'roles',
    'roles' => 'Master'
], function () {
    Route::get('/userRequest_Creator/{id}', 'UserRequestController@showCreator');
    Route::resource('recipes', 'RecipesController');
});