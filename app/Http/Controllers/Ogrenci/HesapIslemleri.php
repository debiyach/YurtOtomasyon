<?php

namespace App\Http\Controllers\Ogrenci;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ogrenci\HesapDuzenle;
use App\Http\Requests\Ogrenci\HesapSifreDuzenle;
use App\Models\Ogrenci;
use Illuminate\Http\Request;

class HesapIslemleri extends Controller
{
    public function hesapDuzenle(HesapDuzenle $request)
    {
        $ogrenci = Ogrenci::findOrFail(session()->get('ogrenci')->id);
        if (\Hash::check($request->sifre,$ogrenci->sifre)){
            $ogrenci->mail = $request->mail;
            $ogrenci->telNo = $request->telNo;
            $ogrenci->evAdresi = $request->evAdresi;
            $result = $ogrenci->save();
            if ($result){
                $ogrenci = Ogrenci::findOrFail(session()->get('ogrenci')->id);
                session()->put('ogrenci',$ogrenci);
                return back()->withErrors(['Güncelleme işlemi başarılı']);
            }else return back()->withErrors(['Sistemsel hata oluştu!']);
        }else return back()->withErrors(['Hatalı şifre']);

    }

    public function sifreDuzenle(HesapSifreDuzenle $request)
    {
        if($request->yeniSifre === $request->yeniSifreTekrar){
            $ogrenci = Ogrenci::findOrFail(session()->get('ogrenci')->id);
            if (\Hash::check($request->sifre,$ogrenci->sifre)){
                $ogrenci->sifre = \Hash::make($request->yeniSifreTekrar);
                $result = $ogrenci->save();
                if ($result){
                    $ogrenci = Ogrenci::findOrFail(session()->get('ogrenci')->id);
                    session()->put('ogrenci',$ogrenci);
                    return back()->withErrors(['Güncelleme işlemi başarılı']);
                }else return back()->withErrors(['Sistemsel hata oluştu!']);
            }else return back()->withErrors(['Hatalı şifre']);
        }else return back()->withErrors(['Girilen şifreler uyuşmamaktadır!']);


    }
}
