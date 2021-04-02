<?php

use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('test');
})->name('test');

/* =========== !  =========== !  =========== !  =========== !  =========== !  =========== !  =========== ! */

## Müdür Route İşlemleri ##

Route::group(['middleware'=>'mudur','as' => 'mudur.','prefix'=>'mudur'],function(){
    Route::get('/',function (){ return view('mudur.index');})->name('index');
});

## End Müdür Route İşlemleri ##

/* =========== !  =========== !  =========== !  =========== !  =========== !  =========== !  =========== ! */

## Personel Route İşlemleri ##

Route::group(['middleware'=>'personel','as' => 'personel.','prefix'=>'personel'],function(){
    Route::get('/',function (){ return view('personel.index');})->name('index');
});

## End Personel Route İşlemleri ##

/* =========== !  =========== !  =========== !  =========== !  =========== !  =========== !  =========== ! */

## Öğrenci Route İşlemleri ##

Route::group(['middleware'=>'ogrenci','as' => 'ogrenci.','prefix'=>'ogrenci'],function(){
    Route::get('/',function (){ return view('ogrenci.index');})->name('index');
});

## End Öğrenci Route İşlemleri ##

/* =========== !  =========== !  =========== !  =========== !  =========== !  =========== !  =========== ! */


## Anasayfa ##

Route::get('/', function () {
    return view('index');
})->name('girisKontrol')->middleware('girisKontrol');
Route::get('/ogrenci-giris', function () {
    return view('ogrencigiris');
})->name('ogrenciGiris')->middleware('girisKontrol');
Route::get('/personel-giris', function () {
    return view('personelgiris');
})->name('personelGiris')->middleware('girisKontrol');
## End Anasayfa ##


## Login İşlemleri ##

Route::post('/personel-login', 'LoginController@personelLogin')->name('personelLogin');
Route::post('/ogrenci-login', 'LoginController@ogrenciLogin')->name('ogrenciLogin');

Route::post('/ogrenci', 'LoginController@ogrenciLogin')->name('ogrenciLogin');
## End Login İşlemleri ##


 ## Tema denemeleri için basit giriş 
Route::get('/basitogrenci', 'LoginController@basitogrenci');
Route::get('/basitpersonel', 'LoginController@basitpersonel');
Route::get('/basitmudur', 'LoginController@basitmudur');
