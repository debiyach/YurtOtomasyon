<?php

namespace App\Http\Controllers\Personel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personel\HesapDuzenle;
use App\Http\Requests\Personel\HesapSifreDuzenle;
use App\Models\Personel;
use Illuminate\Http\Request;

class HesapIslemleri extends Controller
{
    public function hesapSifreDuzenlePost(HesapSifreDuzenle $request)
    {
        if($request->yeniSifre === $request->yeniSifreTekrar){
            $personel = Personel::findOrFail(session()->get('personel')->id);
            if (\Hash::check($request->sifre,$personel->sifre)){
                $personel->sifre = \Hash::make($request->yeniSifreTekrar);
                $result = $personel->save();
                if ($result){
                    $personel = Personel::findOrFail(session()->get('personel')->id);
                    session()->put('personel',$personel);
                    return back()->withErrors(['Güncelleme işlemi başarılı']);
                }else return back()->withErrors(['Sistemsel hata oluştu!']);
            }else return back()->withErrors(['Hatalı şifre']);
        }else return back()->withErrors(['Girilen şifreler uyuşmamaktadır!']);
    }

    public function hesapDuzenlePost(HesapDuzenle $request)
    {
        $personel = Personel::findOrFail(session()->get('personel')->id);
        if (\Hash::check($request->sifre,$personel->sifre)){
            $personel->mail = $request->mail;
            $personel->telNo = $request->telNo;
            $personel->evAdresi = $request->evAdresi;
            $result = $personel->save();
            if ($result){
                $personel = Personel::findOrFail(session()->get('personel')->id);
                session()->put('personel',$personel);
                return back()->withErrors(['Güncelleme işlemi başarılı']);
            }else return back()->withErrors(['Sistemsel hata oluştu!']);
        }else return back()->withErrors(['Hatalı şifre']);
    }
}
