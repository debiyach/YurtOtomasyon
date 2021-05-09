<?php

namespace App\Http\Controllers\Personel\OgrenciIslemleri;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personel\OgrenciIslemleri\OgrenciEkle as ReqOgrenciEkle;
use App\Mail\Ogrenci\SifreGonder;
use App\Models\IslemCesitleri;
use App\Models\Ogrenci;
use App\Helpers\Writer;
use App\Http\Controllers\Logs\Logs;
use App\Models\PersonelIslemKayit;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OgrenciEkle extends Controller
{
    public function ogrenciEkle(ReqOgrenciEkle $request)
    {

        if (json_decode(session()->get('personel')->yetki)->ogrenciEkle === \App\Helpers\Writer::Ekle){
            $sifre = Str::random(4).time();
            $ogrenci = new Ogrenci;
            $ogrenci->kurumId = session()->get('personel')->kurumId;
            $ogrenci->ad = $request->ad;
            $ogrenci->soyad = $request->soyad;
            $ogrenci->mail = $request->email;
            $ogrenci->sifre = \Hash::make($sifre);
            $ogrenci->apiToken = \Hash::make($request->email);
            $ogrenci->cinsiyet = session()->get('personel')->cinsiyet;
            $ogrenci->tcNo = $request->tcNo;
            $ogrenci->telNo = $request->telNo;
            $ogrenci->evAdresi = $request->adres;
            $ogrenci->foto = $this->putFile($request,'resim','/ogrenci/profil');
            $ogrenci->aidat = json_encode([]);
            $ogrenci->depozito = json_encode([]);
            $ogrenci->izin = 0;
            $ogrenci->aktif = 1;
            $ogrenci->created_at = now();
            $ogrenci->updated_at = now();
            $result = $ogrenci->save();
            if ($result) {
                $mailData = [
                    "password" => $sifre,
                    "mail" => $request->email,
                    "title" => "Ogrencimiz {$request->ad} {$request->soyad}",
                    "body" => "Burası body alanı"
                ];
                Mail::to($request->email)->send(new SifreGonder($mailData));
                if ($result) {
                    Logs::personelLog(Writer::OgrenciEkle);
                    back()->with('success','Öğrenci Ekleme Başarılı!');
                } else return response(['type' => 'error', 'message' => 'Kat eklenirken hata oluştu!']);
            }else return back()->withErrors(['Beklenmeyen Hata Oluştu!']);
        }else return back()->withErrors(['Bu işlemi gerçekleştirmek için yetkili değilsiniz!']);

    }
}
