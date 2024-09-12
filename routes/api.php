<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/store/data-warga', 'Api\ApiStoreDataWargaController@store')->name('store.api-data-warga');
Route::post('/register/data-warga', 'Api\ApiRegisterWargaController@store')->name('register.api-data-warga');
Route::post('/store/data-kematian', 'Api\ApiStoreDataKematianController@store')->name('store.api-data-kematian');