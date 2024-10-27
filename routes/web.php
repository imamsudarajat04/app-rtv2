<?php

use Illuminate\Support\Facades\Route;


Route::get('/', "User\IndexController@index")->name('landingpage.index');
Route::get('/login', "LoginController@index")->name('login');
Route::post('/postLogin', "LoginController@postLogin")->name('postLogin.store');
Route::get('/logout', "LoginController@logout")->name('logout.destroy');

Route::resource('/pendaftaran-warga', "User\PendaftaranWargaController")->except(['create','show', 'edit', 'update', 'destroy']);

//Kabupaten get id provinsi
Route::get('getKabupaten/{id}', 'Admin\DataWargaController@getKabupaten');

//Kecamatan get id kabupaten
Route::get('getKecamatan/{id}', 'Admin\DataWargaController@getKecamatan');

//Kelurahan get id kecamatans
Route::get('getKelurahan/{id}', 'Admin\DataWargaController@getKelurahan');

//Pengaduan
Route::resource('pengaduan-suara', 'User\PengaduanController');

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
    Route::get('/DataRT-export', 'Admin\DataRtController@export')->name('DataRT.Export');

    //Khusus tujuan Data Kematian
    Route::resource('/DataKematian', 'Admin\DataKematianController');
    Route::get('DataKematian-Export', 'Admin\DataKematianController@export')->name('DataKematian.Export');

    //Khusus tujuan Data RT
    Route::resource('DataRW', 'Admin\DataRWController');
    Route::get('/DataRW-export', 'Admin\DataRWController@export')->name('DataRW.Export');

    //Khusus tujuan Data Balita
    Route::resource('DataBalita', 'Admin\DataBalitaController');

    //Khusus tujuan Data Lansia
    Route::resource('DataLansia', 'Admin\DataLansiaController');

    //Khusus tujuan Data Warga Disabilitas
    Route::resource('DataWargaDisabilitas', 'Admin\DataWargaDisabilitasController');

    //Khusus tujuan Data Warga Bantuan Pemerintah
    Route::resource('DataWargaBantuanPemerintah', 'Admin\DataWargaBantuanPemerintahController');

    //Khusus tujuan Data Warga Berjenis Kelamin Pria
    Route::resource('DataWargaPria', 'Admin\DataWargaPriaController');

    //Khusus tujuan Data Warga Berjenis Kelamin Perempuan
    Route::resource('DataWargaPerempuan', 'Admin\DataWargaPerempuanController');

    //Khusus tujuan Data Warga
    Route::resource('/DataWarga', 'Admin\DataWargaController');
    Route::get('/Verification/DataWarga/{id}', 'Admin\DataWargaController@verification')->name('DataWarga.verification');
    Route::put('/Verification/DataWarga/{id}', 'Admin\DataWargaController@updateVerification')->name('DataWarga.UpdateVerification');
    Route::get('/DataWarga-export', 'Admin\DataWargaController@export')->name('DataWarga.export');
    Route::get('/DataWarga-exportBalita', 'Admin\DataWargaController@exportBalita')->name('DataWargaBalita.export');
    Route::get('/DataWarga-exportLansia', 'Admin\DataWargaController@exportLansia')->name('DataWargaLansia.export');
    Route::get('/DataWarga-exportDisabilitas', 'Admin\DataWargaController@exportDisabilitas')->name('DataWargaDisabilitas.export');
    Route::get('/DataWarga-exportBantuanPemerintah', 'Admin\DataWargaController@exportBantuanPemerintah')->name('DataWargaBantuanPemerintah.export');

    //Khusus tujuan Data Warga Pindahan
    Route::resource('/DataWargaPindahan', 'Admin\DataWargaPindahanController');
    Route::get('/DataWargaPindahan-export', 'Admin\DataWargaPindahanController@export')->name('DataWargaPindahan.export');

    //Data Warga Khusus Role RT
    Route::resource('/DataWargaRT', 'Rt\DataWargaController');

    //Data Warga Pindahan Khusus Role RT
    Route::resource('/DataWargaPindahanRT', 'Rt\DataWargaPindahanController');

    //Khusus FAQ
    Route::resource('/Faq', 'Admin\FaqController');

    //Pengaduan Suara
    Route::resource('pengaduan-suara-admin', 'Admin\PengaduanController');

    Route::get('/DataWargaRW', 'Rw\RwController@DataWargaRW')->name('DataWargaRW.index');
    Route::get('/DataRTKhususRW', 'Rw\RwController@DataRW')->name('DataKhususRW.index');
    Route::get('/DataWargaPindahanRW', 'Rw\RwController@DataWargaPindahanRW')->name('DataWargaPindahanRW.index');



    //Setting
    Route::prefix('settings')->group(function() {
        Route::resource('header-setting', "Admin\Settings\HeaderSettingController");
        Route::resource('global-setting', "Admin\Settings\GlobalSettingController");
        Route::resource('footer-setting', "Admin\Settings\FooterSettingController");
        Route::resource('abouts-setting', "Admin\Settings\AboutsSettingController");
        Route::resource('manfaat-setting', "Admin\Settings\ManfaatSettingController");
    });
});
