<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('personel/tablolar', 'deneme@index');


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
//Route::get('/personel/ogrencilistele',[Listeleme::class,'index']);
## Personel Route İşlemleri ##

Route::group(['middleware'=>'personel','as' => 'personel.','prefix'=>'personel'],function(){
    Route::get('/',function (){ return view('personel.index');})->name('index');
    Route::get('/cikis-yap',function (){
        session()->remove('personel');
        return view('index');
    })->name('logout');
    Route::get('/oda-islemleri','Personel\OdaIslemleri@odaSayfasi')->name('odaSayfasi');
    Route::get('/hesap-ayarlari',fn() => view('personel.accountsettings'))->name('hesapAyarlari');
    Route::get('/ogrenci-ekle',fn() => view('personel.insertstudent'))->name('ogrenciEkle');
    Route::get('/personel-ekle',fn() => view('personel.insertpersonel'))->name('personelEkle');
    Route::get('/istek-talep-list',fn() => view('personel.istektaleplist'))->name('istekTalepList');
    Route::get('/izin-talep',fn() => view('personel.izintalep'))->name('izinTalep');
    Route::get('/ogrenci-listele',fn() => view('personel.studentlist'))->name('ogrenciListele');


    ## PERSONEL AJAX ##
    Route::post('/ajax/bina-ekle','Personel\OdaIslemleri@binaEkle')->name('ajax.binaEkle');
    Route::post('/ajax/kat-ekle','Personel\OdaIslemleri@katEkle')->name('ajax.katEkle');
    Route::post('/ajax/oda-ekle','Personel\OdaIslemleri@odaEkle')->name('ajax.odaEkle');
    Route::post('/ajax/yatak-ekle','Personel\OdaIslemleri@yatakEkle')->name('ajax.yatakEkle');
    Route::post('/ajax/ogrenci-ekle','Personel\OdaIslemleri@ogrenciEkle')->name('ajax.ogrenciEkle');
    Route::post('/ajax/ogrenci-yatak-kaldir','Personel\OdaIslemleri@ogrenciYatakKaldir')->name('ajax.ogrenciYatakKaldir');
    Route::post('/ajax/yatak-kaldir','Personel\OdaIslemleri@yatakKaldir')->name('ajax.yatakKaldir');
    Route::get('/ajax/bina-getir/{notEmpty?}','Personel\OdaIslemleri@binaGetir')->name('ajax.binaGetir');
    Route::get('/ajax/ogrenci-getir','Personel\OdaIslemleri@ogrenciGetir')->name('ajax.ogrenciGetir');
    Route::get('/ajax/oda-getir/','Personel\OdaIslemleri@odaGetir')->name('ajax.odaGetir');
    Route::get('/ajax/kat-getir/{id?}','Personel\OdaIslemleri@katGetir')->name('ajax.katGetir');
    Route::get('/ajax/yatak-getir/{id?}','Personel\OdaIslemleri@yatakGetir')->name('ajax.yatakGetir');

    ## PERSONEL AJAX END ##
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
