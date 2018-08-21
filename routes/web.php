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
    return route('dashboard.get');
});

Route::get('dashboard', [
    'uses' => 'DashboardController@getDashboard',
    'as'   => 'dashboard.get'
]);

Route::get('login', [
    'uses' => 'LoginController@getLogin',
    'as'   => 'login.get'
]);

Route::post('login', [
    'uses' => 'LoginController@postLogin',
    'as'   => 'login.post'
]);
