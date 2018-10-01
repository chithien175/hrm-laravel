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

use Illuminate\Support\Facades\Input;
use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;

// Elkfinder...
Route::get('glide/{path}', function($path){
    $server = ServerFactory::create([
        'source' => app('filesystem')->disk('public')->getDriver(),
        'cache' => storage_path('glide'),
        'response' => new LaravelResponseFactory(app('request'))
    ]);
    $response = $server->getImageResponse($path, Input::query());
    $response->send();
})->where('path', '.+');

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
    'middleware' => ['permission:read-dashboard'],
    'uses' => 'DashboardController@getDashboard',
    'as'   => 'dashboard'
])->middleware(['auth','only_active_user']);

// User Routes...
Route::prefix('users')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-users'], 'uses'=>'UserController@index','as'=>'user.index']);
    Route::get('/add', ['middleware' => ['permission:create-users'], 'uses'=>'UserController@create','as'=>'user.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-users'], 'uses'=>'UserController@store','as'=>'user.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-users'], 'uses' =>'UserController@edit','as'=>'user.edit.get']);
    Route::post('/edit', ['middleware' => ['permission:update-users'], 'uses'=>'UserController@update','as'=>'user.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-users'], 'uses'=>'UserController@destroy','as'=>'user.delete.get']);
});

// Nhân Sự Routes...
Route::prefix('staffs')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-nhan-su'], 'uses'=>'NhanSuController@index','as'=>'nhan_su.index']);
    Route::get('/read/{id}', ['middleware' => ['permission:read-nhan-su'], 'uses'=>'NhanSuController@read','as'=>'nhan_su.read.get']);
    Route::get('/add', ['middleware' => ['permission:create-nhan-su'], 'uses'=>'NhanSuController@create','as'=>'nhan_su.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-nhan-su'], 'uses'=>'NhanSuController@store','as'=>'nhan_su.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-nhan-su'], 'uses' =>'NhanSuController@edit','as'=>'nhan_su.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-nhan-su'], 'uses'=>'NhanSuController@update','as'=>'nhan_su.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-nhan-su'], 'uses'=>'NhanSuController@destroy','as'=>'nhan_su.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-nhan-su'], 'uses'=>'NhanSuController@exportExcel','as'=>'nhan_su.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-nhan-su'], 'uses'=>'NhanSuController@importExcel','as'=>'nhan_su.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-nhan-su'], 'uses'=>'NhanSuController@postImportExcel','as'=>'nhan_su.import-excel.post']);
});

// Company Routes...
Route::prefix('company')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/init', ['middleware' => ['permission:update-company'], 'uses'=>'CompanyController@init','as'=>'company.init']);
    Route::get('/', ['middleware' => ['permission:update-company'], 'uses'=>'CompanyController@index','as'=>'company.index']);
    Route::post('/update', ['middleware' => ['permission:update-company'], 'uses'=>'CompanyController@update','as'=>'company.update']);
});

// Ajax Routes...
Route::prefix('ajax')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::post('/dsBoPhanTheoPhongBan', ['uses'=>'NhanSuController@dsBoPhanTheoPhongBan','as'=>'dsBoPhanTheoPhongBan']);
    Route::post('/postThemHopDong', ['middleware' => ['permission:create-hop-dong'], 'uses'=>'HopDongController@postThemHopDong','as'=>'postThemHopDong']);
    Route::post('/postTimHopDongTheoId', ['uses'=>'HopDongController@postTimHopDongTheoId','as'=>'postTimHopDongTheoId']);
    Route::post('/postSuaHopDong', ['middleware' => ['permission:update-hop-dong'], 'uses'=>'HopDongController@postSuaHopDong','as'=>'postSuaHopDong']);
    Route::post('/postXoaHopDong', ['middleware' => ['permission:delete-hop-dong'], 'uses'=>'HopDongController@postXoaHopDong','as'=>'postXoaHopDong']);

    Route::post('/postThemQuyetDinh', ['middleware' => ['permission:create-quyet-dinh'], 'uses'=>'QuyetDinhController@postThemQuyetDinh','as'=>'postThemQuyetDinh']);
    Route::post('/postTimQuyetDinhTheoId', ['uses'=>'QuyetDinhController@postTimQuyetDinhTheoId','as'=>'postTimQuyetDinhTheoId']);
    Route::post('/postSuaQuyetDinh', ['middleware' => ['permission:update-quyet-dinh'], 'uses'=>'QuyetDinhController@postSuaQuyetDinh','as'=>'postSuaQuyetDinh']);
    Route::post('/postXoaQuyetDinh', ['middleware' => ['permission:delete-quyet-dinh'], 'uses'=>'QuyetDinhController@postXoaQuyetDinh','as'=>'postXoaQuyetDinh']);

});

// File Manager
Route::prefix('file-manager')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:update-file-manager'], 'uses'=>'FileManagerController@index','as'=>'file-manager.index']);
});

// Role Route...
Route::prefix('roles')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-acl'], 'uses'=>'RoleController@index','as'=>'role.index']);
    Route::get('/create', ['middleware' => ['permission:create-acl'], 'uses'=>'RoleController@create','as'=>'role.create']);
    Route::post('/store', ['middleware' => ['permission:create-acl'], 'uses'=>'RoleController@store','as'=>'role.store']);
    Route::get('/show/{id}', ['middleware' => ['permission:update-acl'], 'uses'=>'RoleController@show','as'=>'role.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-acl'], 'uses'=>'RoleController@edit','as'=>'role.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:delete-acl'], 'uses'=>'RoleController@update','as'=>'role.update']);
});