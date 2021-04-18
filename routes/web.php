<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('personel/d', fn()=> view('test'));


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

Route::group(['namespace'=>'Personel','middleware'=>'personel','as' => 'personel.','prefix'=>'personel'],function(){

    Route::get('/',function (){ return view('personel.index');})->name('index');
    Route::get('/cikis-yap',function (){
        session()->remove('personel');
        return view('index');
    })->name('logout');


    Route::get('/oda-islemleri','OdaIslemleri@odaSayfasi')->name('odaSayfasi');
    Route::get('/hesap-ayarlari',fn() => view('personel.accountsettings'))->name('hesapAyarlari');
    Route::get('/ogrenci-ekle',fn() => view('personel.insertstudent'))->name('ogrenciEkle');
    Route::get('/personel-ekle',fn() => view('personel.insertpersonel'))->name('personelEkle');
    Route::get('/istek-talep-list',fn() => view('personel.istektaleplist'))->name('istekTalepList');
    Route::get('/izin-talep',fn() => view('personel.izintalep'))->name('izinTalep');
    Route::get('/ogrenci-listele',fn() => view('personel.studentlist'))->name('ogrenciListele');


    Route::group(['prefix'=>'oda-islemleri','as'=>'odaIslemleri.'],function(){
        ## POST ##

        Route::post('/bina-ekle','odaIslemleri@binaEkle')->name('binaEkle');
        Route::post('/kat-ekle','odaIslemleri@katEkle')->name('katEkle');
        Route::post('/oda-ekle','odaIslemleri@odaEkle')->name('odaEkle');
        Route::post('/yatak-ekle','odaIslemleri@yatakEkle')->name('yatakEkle');

        ## END POST ##

        ##=========================================================================================##

        ## GET ##

        Route::get('/bina-getir','odaIslemleri@binaGetir')->name('binaGetir');
        Route::get('/kat-getir/{id??}','odaIslemleri@katGetir')->name('katGetir');
        Route::get('/oda-getir/{id??}','odaIslemleri@odaGetir')->name('odaGetir');
        Route::get('/yatak-getir/{id??}','odaIslemleri@yatakGetir')->name('yatakGetir');
        Route::get('/yatak-kaldir/{id??}','odaIslemleri@yatakKaldir')->name('yatakKaldir');

        ## END GET ##
    });



    Route::group(['as'=>'ogrenci.','prefix'=>'ogrenci-islemleri'],function(){
        Route::post('/ogrenci','OgrenciIslemleri\OgrenciEkle@ogrenciEkle')->name('ogrenciEkle');
    });




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
