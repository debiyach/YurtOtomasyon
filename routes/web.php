<?php

use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('test');
})->name('test');

/* =========== !  =========== !  =========== !  =========== !  =========== !  =========== !  =========== ! */

## Müdür Route İşlemleri ##

Route::group(['middleware'=>'mudur','as' => 'mudur.','prefix'=>'mudur'],function(){
    Route::get('/',function (){return view('mudur.index');})->name('index');
    Route::get('/cikis-yap',function (){
        session()->remove('personel');
        return view('index');
    })->name('logout');
});

## End Müdür Route İşlemleri ##

/* =========== !  =========== !  =========== !  =========== !  =========== !  =========== !  =========== ! */

## Personel Route İşlemleri ##

Route::group(['middleware'=>'personel','as' => 'personel.','prefix'=>'personel'],function(){
    Route::get('/',function (){ return view('personel.index');})->name('index');
    Route::get('/cikis-yap',function (){
        session()->remove('personel');
        return view('index');
    })->name('logout');
    Route::get('/hesap-ayarlari',fn() => view('personel.accountsettings'))->name('hesapAyarlari');
    Route::get('/ogrenci-ekle',fn() => view('personel.insertstudent'))->name('ogrenciEkle');
    Route::get('/istek-sikayet',fn() => view('personel.isteksikayet'))->name('istekSikayet');
    Route::get('/izin-talep',fn() => view('personel.izintalep'))->name('izinTalep');
    
});

## End Personel Route İşlemleri ##

/* =========== !  =========== !  =========== !  =========== !  =========== !  =========== !  =========== ! */

## Öğrenci Route İşlemleri ##

Route::group(['middleware'=>'ogrenci','as' => 'ogrenci.','prefix'=>'ogrenci'],function(){
    Route::get('/',function (){ return view('ogrenci.index');})->name('index');
    Route::get('/cikis-yap',function (){
        session()->remove('ogrenci');
        return view('index');
    })->name('logout');
    Route::get('/izin-talep',fn() => view('ogrenci.izintalep'))->name('izinTalep');
    Route::get('/hesap-ayarlari',fn() => view('ogrenci.accountsettings'))->name('hesapAyarlari');
    Route::get('/istek-talep',fn() => view('ogrenci.istektalep'))->name('istekTalep');
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

Route::get('/datatable',function (){
    return view('ogrenci.datatable');
});

Route::get('/basitogrenci', function(){
    return view('ogrenci.hesapayarlari');
});
Route::get('/basitpersonel', function(){
    return view('personel.insertstudent');
});
Route::get('/basitmudur', function(){
    return view('mudur.ogrenciekle');
});
