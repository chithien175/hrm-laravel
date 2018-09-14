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
])->middleware('auth');

// User Routes...
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/', ['uses'=>'UserController@index','as'=>'user.index']);
    Route::get('/add', ['uses'=>'UserController@create','as'=>'user.add.get']);
    Route::post('/add', ['uses'=>'UserController@store','as'=>'user.add.post']);
    Route::get('/edit/{id}', ['uses' =>'UserController@edit','as'=>'user.edit.get']);
    Route::post('/edit', ['uses'=>'UserController@update','as'=>'user.edit.post']);
    Route::get('/delete/{id}', ['uses'=>'UserController@destroy','as'=>'user.delete.get']);
});

// Nhân Sự Routes...
Route::prefix('staffs')->middleware('auth')->group(function () {
    Route::get('/', ['uses'=>'NhanSuController@index','as'=>'nhan_su.index']);
    Route::get('/read/{id}', ['uses'=>'NhanSuController@read','as'=>'nhan_su.read.get']);
    Route::get('/add', ['uses'=>'NhanSuController@create','as'=>'nhan_su.add.get']);
    Route::post('/add', ['uses'=>'NhanSuController@store','as'=>'nhan_su.add.post']);
    Route::get('/edit/{id}', ['uses' =>'NhanSuController@edit','as'=>'nhan_su.edit.get']);
    Route::post('/edit/{id}', ['uses'=>'NhanSuController@update','as'=>'nhan_su.edit.post']);
    Route::get('/delete/{id}', ['uses'=>'NhanSuController@destroy','as'=>'nhan_su.delete.get']);
    Route::get('/import-excel', ['uses'=>'NhanSuController@importExcel','as'=>'nhan_su.import-excel.get']);
    Route::post('/upload-excel', ['uses'=>'NhanSuController@uploadExcel','as'=>'nhan_su.upload-excel.post']);
});

// Company Routes...
Route::prefix('company')->middleware('auth')->group(function () {
    Route::get('/init', ['uses'=>'CompanyController@init','as'=>'company.init']);
    Route::get('/', ['uses'=>'CompanyController@index','as'=>'company.index']);
    Route::post('/update', ['uses'=>'CompanyController@update','as'=>'company.update']);
});

// Ajax Routes...
Route::prefix('ajax')->middleware('auth')->group(function () {
    Route::post('/dsBoPhanTheoPhongBan', ['uses'=>'NhanSuController@dsBoPhanTheoPhongBan','as'=>'dsBoPhanTheoPhongBan']);
    Route::post('/postThemHopDong', ['uses'=>'HopDongController@postThemHopDong','as'=>'postThemHopDong']);
    Route::post('/postTimHopDongTheoId', ['uses'=>'HopDongController@postTimHopDongTheoId','as'=>'postTimHopDongTheoId']);
    Route::post('/postSuaHopDong', ['uses'=>'HopDongController@postSuaHopDong','as'=>'postSuaHopDong']);
    Route::post('/postXoaHopDong', ['uses'=>'HopDongController@postXoaHopDong','as'=>'postXoaHopDong']);
});
// MediaManager
ctf0\MediaManager\MediaRoutes::routes();