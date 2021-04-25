<?php


namespace App\Helpers;


class Writer
{
    const Ekle = 1;
    const LogIn = "Giriş yapıldı.";
    const LogOut = "Çıkış yapıldı.";
    const KatEkle = "Kat eklendi.";
    const OdaEkle = "Oda eklendi.";
    const YatakEkle = "Yatak eklendi.";
    const YatakKaldir = "Yatak kaldırdı.";
    const OgrenciEkle = "Yeni bir öğrenci ekledi.";
    const BinaEkle  = "Bina eklendi.";
    const OgrenciYatakEkle = "Öğrenci yatağa eklendi.";
    const OgrenciYatakKaldir = "Öğrenci yataktan kaldırdı.";
    const PersonelEkle = "Yeni bir personel ekledi.";

    static function OdaEkle($binaid, $odano){
        return "$binaid idli binaya $odano nolu oda eklendi";
    }

    static function YatakEkle($odaid, $yatakadi){
        return "$odaid idli odaya $yatakadi adlı yatak eklendi";
    }

    static function KatEkle($binaid, $katadi){
        return "$binaid idli binaya $katadi adlı kat eklendi";
    }

    static function BinaEkle($binaAdi){
        return "$binaAdi adlı bina eklendi";
    }

    static function YatakKaldir($id)
    {
        return "$id idli yatak kaldırıldı.";
    }

    static function OgrenciYatakEkle($id, $yatakid)
    {
        return "$id idli öğrenci $yatakid idli yatağa eklendi.";
    }

    static function OgrenciYatakKaldir($id, $yatakid)
    {
        return "$id idli öğrenci $yatakid idli yataktan kaldırıdı.";
    }
}
