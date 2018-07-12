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
//toppageの指定　ログインしたらShowページに行くようにコントローラで指定した

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('ranking/good', 'RankingController@good')->name('ranking.good');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('good', 'GoodUserController@store')->name('user.good');
        Route::delete('ungood', 'GoodUserController@destroy')->name('user.ungood');
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });

    Route::resource('goals', 'GoalsController', ['only' => ['create','store', 'destroy']]);
    Route::get('goals/review', 'GoalsController@review')->name('goals.review');
    Route::post('goals/reviewed', 'GoalsController@reviewed')->name('goals.reviewed');
    Route::get('goals/search', 'GoalsController@search')->name('goals.search');
});