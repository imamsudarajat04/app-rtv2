<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/store/data-warga', 'Api\ApiStoreDataWargaController@store')->name('store.api-data-warga');
Route::post('/register/data-warga', 'Api\ApiRegisterWargaController@store')->name('register.api-data-warga');