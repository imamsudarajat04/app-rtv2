<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/store/data-warga', 'Api\ApiStoreDataWargaController@store')->name('store.api-data-warga');
Route::post('/register/data-warga', 'Api\ApiRegisterWargaController@store')->name('register.api-data-warga');
Route::post('/store/data-kematian', 'Api\ApiStoreDataKematianController@store')->name('store.api-data-kematian');
Route::get('/get/data-warga-verif', 'Api\ApiGetDataWargaVerifController@index')->name('get.api-data-warga-verif');
Route::post('/search/data-warga-verif', 'Api\ApiGetDataWargaVerifController@search')->name('search.api-data-warga-verif');