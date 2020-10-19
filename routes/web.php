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
    return view('welcome');
});

Auth::routes(['register' => false]);

//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function () {
    Route::get('home', 'UserController@index');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'AdminController@showLoginForm')->middleware('guest:admin');
    Route::post('login', 'AdminController@login')->middleware('guest:admin');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('home', 'AdminController@index');
    });
});
