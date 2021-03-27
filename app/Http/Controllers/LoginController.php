<?php

namespace App\Http\Controllers;

use App\Models\Personel;
use Illuminate\Http\Request;

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

        $personel = Personel::where('mail','=',$request->email)->first(); // mail adresinin varlığını kontrol ediyoruz.
        if ($personel){
            if(Hash::check($request->password,$personel->sifre)){ // şifreleri kontrol ediyoruz.
                $request->session()->put('personelGiris',$personel); // sessiona atıyoruz.
            }else return back()->withErrors(['Geçersiz parola!']);

        }else return back()->withErrors(['Bu mail adresine bağlı hesap bulunmamaktadır!']);

    }

    public function ogrenciLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:4|max:20'
            ]);

        // Eğer form doğruysa

        $personel = Personel::where('mail','=',$request->email)->first(); // mail adresinin varlığını kontrol ediyoruz.
        if ($personel){
            if(Hash::check($request->password,$personel->sifre)){ // şifreleri kontrol ediyoruz.
                $request->session()->put('personelGiris',$personel); // sessiona atıyoruz.
            }else return back()->withErrors(['Geçersiz parola!']);

        }else return back()->withErrors(['Bu mail adresine bağlı hesap bulunmamaktadır!']);
    }
}
