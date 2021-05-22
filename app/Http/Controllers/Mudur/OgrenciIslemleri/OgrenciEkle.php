<?php

namespace App\Http\Controllers\Mudur\OgrenciIslemleri;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personel\OgrenciIslemleri\OgrenciEkle as ReqOgrenciEkle;
use App\Mail\Ogrenci\SifreGonder;
use App\Models\IslemCesitleri;
use App\Models\Ogrenci;
use App\Models\Aidat;
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
            $ogrenci->aidat = $request->ucret;
            $ogrenci->taksitSayisi = $request->taksit;
            $ogrenci->kalanTaksit = $request->taksit;
            $ogrenci->yoklama = 1;
            $ogrenci->evAdresi = $request->adres;
            $ogrenci->foto = $this->putFile($request,'resim','/ogrenci/profil');
            //$ogrenci->aidat = json_encode([]);
            $ogrenci->depozito = 0;
            $ogrenci->izin = 0;
            $ogrenci->aktif = 1;
            $ogrenci->created_at = now();
            $ogrenci->updated_at = now();
            $result = $ogrenci->save();
            
            for ($i=0; $i < $request->taksit; $i++) { 
                $aidat = new Aidat;
                $aidat->ogrenciId = $ogrenci->id;
                $aidat->kurumId = session()->get('personel')->kurumId;
                $aidat->yatirilacak = round($request->ucret/$request->taksit);
                $aidat->yatirilan = 0;
                $aidat->durum = 0;
                $aidat->mevcutAy = $i+1;
                $i++;
                //$tarih = date("Y-m-d",strtotime("now"));
                $tarih = date("Y-m-d",strtotime("+{$i} month"));
                $i--;
                $aidat->sonOdemeTarihi = $tarih;
                $aidat->created_at = now();
                $aidat->updated_at = now();
                $aidat->save();
            }
            
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
                    return back()->with('success','Öğrenci Ekleme Başarılı!');
                } else return response(['type' => 'error', 'message' => 'Kat eklenirken hata oluştu!']);
            }else return back()->withErrors(['Beklenmeyen Hata Oluştu!']);
        }else return back()->withErrors(['Bu işlemi gerçekleştirmek için yetkili değilsiniz!']);

    }
}
