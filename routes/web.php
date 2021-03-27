<?php

use Illuminate\Support\Facades\Route;

## Anasayfa ##
Route::get('/', function () {
    return view('index');
});
Route::get('/ogrenci-giris', function () {
    return view('ogrencigiris');
})->name('ogrenciGiris');
Route::get('/personel-giris', function () {
    return view('personelgiris');
})->name('personelGiris');
## End Anasayfa ##

## Login İşlemleri ##

Route::post('/personel-login','LoginController@personelLogin')->name('personelLogin');
Route::post('/ogrenci-login','LoginController@ogrenciLogin')->name('ogrenciLogin');

## End Login İşlemleri ##
