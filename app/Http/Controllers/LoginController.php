<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Logs\Logs;
use App\Models\IslemCesitleri;
use App\Models\Ogrenci;
use App\Models\Personel;
use App\Models\PersonelIslemKayit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function personelLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:4|max:20'
            ]);

        // Eğer form doğruysa

        $personel = Personel::where('mail','=',$request->email)->with('personelToKurum')->first(); // mail adresinin varlığını kontrol ediyoruz.
        if ($personel) if(Hash::check($request->password,$personel->sifre)){ // şifreleri kontrol ediyoruz.
            $request->session()->put('personel',$personel); // sessiona atıyoruz.
            Logs::personelLog(\App\Helpers\Writer::LogIn);
            if ($personel->tip == 'Müdür')
                return redirect()->route('mudur.index');
            else
                return redirect()->route('personel.index');
        }else return back()->withErrors(['Geçersiz parola!']); else return back()->withErrors(['Bu mail adresine bağlı hesap bulunmamaktadır!']);

    }


    public function ogrenciLogout()
    {
        Logs::ogrenciLog(\App\Helpers\Writer::LogOut);
        session()->remove('ogrenci');
        return view('index');
    }

    public function personelLogout()
    {
        Logs::personelLog(\App\Helpers\Writer::LogOut);
        session()->remove('personel');
        return view('index');
    }

    public function ogrenciLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:4|max:20'
            ]);

        // Eğer form doğruysa

        $ogrenci = Ogrenci::where('mail','=',$request->email)->with('ogrenciToKurum')->first(); // mail adresinin varlığını kontrol ediyoruz.
        if ($ogrenci){
            if(Hash::check($request->password,$ogrenci->sifre)){ // şifreleri kontrol ediyoruz.
                $request->session()->put('ogrenci',$ogrenci); // sessiona atıyoruz.
                Logs::ogrenciLog(\App\Helpers\Writer::LogIn);
                return redirect()->route('ogrenci.index');
            }else return back()->withErrors(['Geçersiz parola!']);

        }else return back()->withErrors(['Bu mail adresine bağlı hesap bulunmamaktadır!']);
    }
}
