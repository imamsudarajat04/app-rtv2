<?php

use Illuminate\Support\Facades\Route;


Route::get('/', "User\IndexController@index");
Route::get('/login', "LoginController@index")->name('login');
Route::post('/postLogin', "LoginController@postLogin")->name('postLogin.store');
Route::get('/logout', "LoginController@logout")->name('logout.destroy');

Route::group(['middleware' => ['auth','CekRole:superadmin']], function() {
    Route::get('/dashboard', "DashboardController@index")->name('dashboard.index');

    //Khusus untuk Setting Profile
    Route::get('/setting', "Admin\SettingProfileController@index")->name('setting.index');
    Route::put('/setting/{id}', "Admin\SettingProfileController@update")->name('setting.update');

    //Khusus tujuan Data Akun
    Route::resource('/DataAkun', 'Admin\DataAkunController');

    //Khusus tujuan Data RT
    Route::resource('/DataRT', 'Admin\DataRtController');

    //Khusus tujuan Data Warga
    Route::resource('/DataWarga', 'Admin\DataWargaController');

    //Kabupaten get id provinsi
    Route::get('getKabupaten/{id}', 'Admin\DataWargaController@getKabupaten');

    //Kecamatan get id kabupaten
    Route::get('getKecamatan/{id}', 'Admin\DataWargaController@getKecamatan');

    //Kelurahan get id kecamatan
    Route::get('getKelurahan/{id}', 'Admin\DataWargaController@getKelurahan');
});