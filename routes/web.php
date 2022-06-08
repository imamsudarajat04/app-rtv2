<?php

use Illuminate\Support\Facades\Route;


Route::get('/', "User\IndexController@index")->name('landingpage.index');
Route::get('/login', "LoginController@index")->name('login');
Route::post('/postLogin', "LoginController@postLogin")->name('postLogin.store');
Route::get('/logout', "LoginController@logout")->name('logout.destroy');

Route::resource('/pendaftaran-warga', "User\PendaftaranWargaController");

//Kabupaten get id provinsi
Route::get('getKabupaten/{id}', 'Admin\DataWargaController@getKabupaten');

//Kecamatan get id kabupaten
Route::get('getKecamatan/{id}', 'Admin\DataWargaController@getKecamatan');

//Kelurahan get id kecamatan
Route::get('getKelurahan/{id}', 'Admin\DataWargaController@getKelurahan');

Route::group(['middleware' => ['auth','CekRole:superadmin,rt']], function() {
    Route::get('/dashboard', "DashboardController@index")->name('dashboard.index');

    //Khusus untuk Setting Profile
    Route::get('/setting', "Admin\SettingProfileController@index")->name('setting.index');
    Route::put('/setting/{id}', "Admin\SettingProfileController@update")->name('setting.update');

    //Khusus untuk Setting Password
    Route::resource('/ganti-password', "Admin\ChangePasswordController");

    //Khusus tujuan Data Akun
    Route::resource('/DataAkun', 'Admin\DataAkunController');

    //Khusus tujuan Data RT
    Route::resource('/DataRT', 'Admin\DataRtController');

    //Khusus tujuan Data Warga
    Route::resource('/DataWarga', 'Admin\DataWargaController');

    //Khusus tujuan Data Warga Pindahan
    Route::resource('/DataWargaPindahan', 'Admin\DataWargaPindahanController');

    //Data Warga Khusus Role RT
    Route::resource('/DataWargaRT', 'Rt\DataWargaController');

    //Data Warga Pindahan Khusus Role RT
    Route::resource('/DataWargaPindahanRT', 'Rt\DataWargaPindahanController');

    //Khusus FAQ
    Route::resource('/Faq', 'Admin\FaqController');

    // Setting Layouts Admin
    // Route::get('/setting/layouts', "Admin\Settings\SettingsController@index")->name('setting.layouts.index');


    //Setting
    Route::prefix('settings')->group(function() {
        Route::resource('header-setting', "Admin\Settings\HeaderSettingController");
        Route::resource('global-setting', "Admin\Settings\GlobalSettingController");
        Route::resource('footer-setting', "Admin\Settings\FooterSettingController");
        Route::resource('abouts-setting', "Admin\Settings\AboutsSettingController");
        Route::resource('manfaat-setting', "Admin\Settings\ManfaatSettingController");
    });
});