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

Route::get('/', 'WelcomeController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('goals', 'GoalsController', ['only' => ['create','store', 'destroy']]);
});

Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('good', 'GoodUserController@store')->name('user.good');
        Route::delete('ungood', 'GoodUserController@destroy')->name('user.ungood');
        // Route::get('goodings', 'UsersController@goodings')->name('users.goodings');
        // Route::get('gooders', 'UsersController@gooders')->name('users.gooders');
    });