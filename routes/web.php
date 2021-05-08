<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/test', function () {
    return view('test');
})->name('test');




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
    Route::get('/personel-yetkilendirme', 'GenelIslemler@personelYetkiPage')->name('personelYetkilendirme');
    Route::get('/gelirgider-tablosu', fn() => view('mudur.gelirGiderTablosu'))->name('gelirGiderTablosu');


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

        ## DATATABLES ##

        Route::group(['namespace'=>'Datatables','as'=>'datatable.'],function (){
            Route::post('/get-student', 'TempTable@getStudents')->name('ogrencigetir');
            Route::post('/get-personel', 'TempTable@getPersonels')->name('personelgetir');
            Route::post('/get-istek-sikayet', 'TempTable@getIstekSikayet')->name('istekSikayetGetir'); //isteksiyaet
            Route::post('/ogrenci-islem-bilgileri/{id??}', 'TempTable@ogrenciIslemBilgileri')->name('ogrenciIslemBilgileri');
            Route::post('/personel-islem-bilgileri/{id??}', 'TempTable@personelIslemBilgileri')->name('personelIslemBilgileri');
        });

        ## END DATATABLES ##

        ##=========================================================================================##

        ## GENEL POST İSTEKLERİ ##

        Route::post('/hesap-ayarlari/duzenle','HesapIslemleri@hesapDuzenlePost')->name('hesapDuzenlePost');
        Route::post('/hesap-ayarlari/sifre-duzenle','HesapIslemleri@hesapSifreDuzenlePost')->name('hesapSifreDuzenlePost');
        Route::post('/izin-talep/post','GenelIslemler@izinTalep')->name('izinTalepPost');
        Route::post('/personel-ekle/post','GenelIslemler@persoenlEkle')->name('personelEklePost');
        Route::post('/personel-set-yetki','GenelIslemler@personelSetYetki')->name('personelSetYetki');


        ## END GENEL POST İSTEKLERİ ##

        ##=========================================================================================##

        ## GENEL GET İSTEKLERİ ##

        Route::get('/personel-yetki/{id??}','GenelIslemler@personelYetkiGetir')->name('personelYetkiGetir');
        Route::get('/personel-yetkilendirme', 'GenelIslemler@personelYetkiPage')->name('personelYetkilendirme');





        Route::get('/oda-islemleri', 'OdaIslemleri@odaSayfasi')->name('odaSayfasi');
        Route::get('/hesap-ayarlari', fn() => view('personel.accountsettings'))->name('hesapAyarlari');
        Route::get('/ogrenci-ekle', fn() => view('personel.insertstudent'))->name('ogrenciEkle');
        Route::get('/personel-ekle', fn() => view('personel.insertpersonel'))->name('personelEkle');
        Route::get('/istek-talep-list', fn() => view('personel.istektaleplist'))->name('istekTalepList');
        Route::get('/izin-talep', fn() => view('personel.izintalep'))->name('izinTalep');
        Route::get('/ogrenci-listele', 'GenelIslemler@ogrenciListelePage')->name('ogrenciListele');
        Route::get('/personel-listele', fn() => view('personel.personellist'))->name('personelListele');
        Route::get('/ogrenci-islem-bilgileri/{id??}', 'GenelIslemler@ogrenciIslemBilgileri')->name('ogrenciIslemBilgileri');
        Route::get('/personel-islem-bilgileri/{id??}', 'GenelIslemler@personelIslemBilgileri')->name('personelIslemBilgileri');


        ## END GENEL GET İSTEKLERİ ##

        ##=========================================================================================##

        Route::group(['as' => 'ogrenci.', 'prefix' => 'ogrenci-islemleri'], function () {
            Route::post('/ogrenci', 'OgrenciIslemleri\OgrenciEkle@ogrenciEkle')->name('ogrenciEkle');
        });


        ##=========================================================================================##

        ## ODA İŞLEMLERİ ##

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

        ## END ODA İŞLEMLERİ ##

        ##=========================================================================================##

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
    Route::get('/aidat-odeme', fn() => view('ogrenci.aidatodeme'))->name('aidatOdeme');
    Route::get('/devamsizlik', fn() => view('ogrenci.devamsizlik'))->name('devamsizlik');
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
