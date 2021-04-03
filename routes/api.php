<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/ogrenci/login','Ogrenci\AuthLoginController@authLoginOgrenci');
Route::post('/personel/login','Ogrenci\AuthLoginController@authLoginPersonel');

Route::group(['middleware'=>'ApiLogin'],function(){
    Route::apiResource('ogrenci','Api\OgrenciApiController');
});

