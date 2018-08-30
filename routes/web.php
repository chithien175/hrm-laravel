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

// Auth::routes();
// Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Authentication Routes...
Route::get('login', [
    'uses' => 'LoginController@getLogin',
    'as'   => 'login'
]);
Route::post('login', [
    'uses' => 'LoginController@postLogin',
    'as'   => 'login.post'
]);
Route::get('logout', 'LoginController@getLogout')->name('logout.get');

// Home Routes...
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard Routes...
Route::get('dashboard', [
    'uses' => 'DashboardController@getDashboard',
    'as'   => 'dashboard'
]);

// User Routes...
Route::prefix('users')->group(function () {
    Route::get('/', ['uses'=>'UserController@index','as'=>'user.index']);
    Route::get('/add', ['uses'=>'UserController@create','as'=>'user.add.get']);
    Route::post('/add', ['uses'=>'UserController@store','as'=>'user.add.post']);
    Route::get('/edit/{id}', ['uses' =>'UserController@edit','as'=>'user.edit.get']);
    Route::post('/edit', ['uses'=>'UserController@update','as'=>'user.edit.post']);
    Route::get('/delete/{id}', ['uses'=>'UserController@destroy','as'=>'user.delete.get']);
});

// Nhân Sự Routes...
Route::prefix('staffs')->group(function () {
    Route::get('/', ['uses'=>'NhanSuController@index','as'=>'nhan_su.index']);
    Route::get('/add', ['uses'=>'NhanSuController@create','as'=>'nhan_su.add.get']);
    Route::post('/add', ['uses'=>'NhanSuController@store','as'=>'nhan_su.add.post']);
});

// Ajax Routes...
Route::prefix('ajax')->group(function () {
    Route::post('/dsBoPhanTheoPhongBan', ['uses'=>'BoPhanController@dsBoPhanTheoPhongBan','as'=>'dsBoPhanTheoPhongBan']);
});