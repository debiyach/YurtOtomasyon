<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('test');
})->name('test');


Route::post('linki', 'Personel\\Datatables\\TempTable@getStudents')->name('ogrencigetir');
Route::post('linki1', 'Personel\\Datatables\\TempTable@getPersonels')->name('personelgetir');

Route::get('personel/d', fn() => view('test'));


/* =========== !  =========== !  =========== !  =========== !  =========== !  =========== !  =========== ! */

## Müdür Route İşlemleri ##

Route::group(['middleware' => 'mudur', 'as' => 'mudur.', 'prefix' => 'mudur'], function () {
    Route::get('/', function () {
        return view('mudur.index');
    })->name('index');
    Route::get('/cikis-yap', 'LoginController@personelLogout')->name('logout');

    Route::get('/hesap-ayarlari', fn() => view('mudur.accountsettings'))->name('hesapAyarlari');
    Route::get('/personel-ekle', fn() => view('mudur.insertpersonel'))->name('personelEkle');
    Route::get('/personel-listele', fn() => view('mudur.personellist'))->name('personelListele');
    Route::get('/ogrenci-ekle', fn() => view('mudur.insertstudent'))->name('ogrenciEkle');
    Route::get('/ogrenci-listele', fn() => view('mudur.studentlist'))->name('ogrenciListele');
    Route::get('/istek-talep-list', fn() => view('mudur.istektaleplist'))->name('istekTalepList');

});

## End Müdür Route İşlemleri ##

/* =========== !  =========== !  =========== !  =========== !  =========== !  =========== !  =========== ! */
//Route::get('/personel/ogrencilistele',[Listeleme::class,'index']);
## Personel Route İşlemleri ##

Route::group(['middleware' => 'personel', 'as' => 'personel.', 'prefix' => 'personel'], function () {

    Route::get('/', function () {
        return view('personel.index');
    })->name('index');
    Route::get('/cikis-yap', 'LoginController@personelLogout')->name('logout');

    Route::group(['namespace' => 'Personel'], function () {
        Route::get('/oda-islemleri', 'OdaIslemleri\OgrenciEkle@odaSayfasi')->name('odaSayfasi');
        Route::get('/hesap-ayarlari', fn() => view('personel.accountsettings'))->name('hesapAyarlari');
        Route::get('/ogrenci-ekle', fn() => view('personel.insertstudent'))->name('ogrenciEkle');
        Route::get('/personel-ekle', fn() => view('personel.insertpersonel'))->name('personelEkle');
        Route::get('/istek-talep-list', fn() => view('personel.istektaleplist'))->name('istekTalepList');
        Route::get('/izin-talep', fn() => view('personel.izintalep'))->name('izinTalep');
        Route::get('/ogrenci-listele', fn() => view('personel.studentlist'))->name('ogrenciListele');
        Route::get('/personel-listele', fn() => view('personel.personellist'))->name('personelListele');


        Route::group(['prefix' => 'oda-islemleri', 'as' => 'odaIslemleri.'], function () {
            ## POST ##

            Route::post('/bina-ekle', 'odaIslemleri@binaEkle')->name('binaEkle');
            Route::post('/kat-ekle', 'odaIslemleri@katEkle')->name('katEkle');
            Route::post('/oda-ekle', 'odaIslemleri@odaEkle')->name('odaEkle');
            Route::post('/yatak-ekle', 'odaIslemleri@yatakEkle')->name('yatakEkle');
            route::post('/yatak-ogrenci-ekle','odaIslemleri@ogrenciEkle')->name('yatakOgrenciEkle');
            route::post('/yatak-ogrenci-kaldir','odaIslemleri@ogrenciYatakKaldir')->name('ogrenciYatakKaldir');

            ## END POST ##

            ##=========================================================================================##

            ## GET ##

            Route::get('/yatak-ogrenci-getir','odaIslemleri@ogrenciGetir')->name('yatakOgrenciGetir');
            Route::get('/bina-getir', 'odaIslemleri@binaGetir')->name('binaGetir');
            Route::get('/kat-getir/{id??}', 'odaIslemleri@katGetir')->name('katGetir');
            Route::get('/oda-getir/{id??}', 'odaIslemleri@odaGetir')->name('odaGetir');
            Route::get('/yatak-getir/{id??}', 'odaIslemleri@yatakGetir')->name('yatakGetir');
            Route::get('/yatak-kaldir/{id??}', 'odaIslemleri@yatakKaldir')->name('yatakKaldir');

            ## END GET ##
        });


    });


    Route::group(['as' => 'ogrenci.', 'prefix' => 'ogrenci-islemleri'], function () {
        Route::post('/ogrenci', 'OgrenciIslemleri\OgrenciEkle@ogrenciEkle')->name('ogrenciEkle');
    });


});


## End Personel Route İşlemleri ##

/* =========== !  =========== !  =========== !  =========== !  =========== !  =========== !  =========== ! */

## Öğrenci Route İşlemleri ##

Route::group(['middleware' => 'ogrenci', 'as' => 'ogrenci.', 'prefix' => 'ogrenci'], function () {
    Route::get('/', function () {
        return view('ogrenci.index');
    })->name('index');

    Route::group(['namespace'=>'Ogrenci'],function (){
        Route::post('/hesap-ayarlari/hesap-guncelle','HesapIslemleri@hesapDuzenle')->name('hesapDuzenlePost');
        Route::post('/hesap-ayarlari/hesap-sifre-guncelle','HesapIslemleri@sifreDuzenle')->name('hesapSifreDuzenlePost');
        Route::post('/izin-talep/post','GenelIslemler@izinTalep')->name('izinTalepPost');
        Route::post('/istek-sikayet/post','GenelIslemler@istekSikayet')->name('istekSikayetPost');
    });

    Route::get('/cikis-yap', 'LoginController@ogrenciLogout')->name('logout');
    Route::get('/izin-talep', fn() => view('ogrenci.izintalep'))->name('izinTalep');
    Route::get('/hesap-ayarlari', fn() => view('ogrenci.accountsettings'))->name('hesapAyarlari');
    Route::get('/istek-talep', fn() => view('ogrenci.istektalep'))->name('istekTalep');
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

Route::get('/datatable', function () {
    return view('ogrenci.datatable');
});

Route::get('/basitogrenci', function () {
    return view('ogrenci.hesapayarlari');
});
Route::get('/basitpersonel', function () {
    return view('personel.insertstudent');
});
Route::get('/basitmudur', function () {
    return view('mudur.ogrenciekle');
});
