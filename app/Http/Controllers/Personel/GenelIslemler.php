<?php

namespace App\Http\Controllers\Personel;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Personel\IzinTalep;
use App\Http\Requests\Personel\PersonelEkle;
use App\Mail\SendPasswordMail;
use App\Models\Binalar;
use App\Models\IslemCesitleri;
use App\Models\Katlar;
use App\Models\Personel;
use App\Models\PersonelIslemKayit;
use App\Models\PersonelIzin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;


class GenelIslemler extends Controller
{


    public function ogrenciListelePage()
    {
        $data['katlar'] = Katlar::where('kurumId',session()->get('personel')->kurumId)->get();
        $data['binalar'] = Binalar::where('kurumId',session()->get('personel')->kurumId)->get();
        return view('personel.studentlist',$data);
    }

    public function personelSetYetki(Request $request)
    {
        return $request->all();
    }


    public function personelYetkiPage()
    {
        $data['personels'] = Personel::where('tip','=','Personel')
                                        ->where('kurumId',session()->get('personel')->kurumId)
                                        ->get();
        return view('personel.personelYetkilendirme', $data);
    }

    public function personelYetkiGetir($id = null)
    {
        if ($id) {
            $personel = Personel::find($id);
            return response(($personel->yetki), 200);
        } else return response(['success' => false, 'message' => 'Hatalı işlem'], 404);

    }

    public function persoenlEkle(PersonelEkle $request)
    {
        if (json_decode(session()->get('personel')->yetki)->personelEkle === \App\Helpers\Writer::Ekle) {
            $sifre = Str::random(4) . time();
            $personel = new Personel;
            $personel->kurumId = session()->get('personel')->kurumId;
            $personel->ad = $request->ad;
            $personel->soyad = $request->soyad;
            $personel->mail = $request->mail;
            $personel->sifre = \Hash::make($sifre);
            $personel->apiToken = \Hash::make($request->mail);
            $personel->cinsiyet = session()->get('personel')->cinsiyet;
            $personel->tcNo = $request->tcNo;
            $personel->telNo = $request->telNo;
            $personel->evAdresi = $request->evAdresi;
            $personel->foto = $this->putFile($request, 'resim', '/personel/profil');
            $personel->tip = "Personel";
            $personel->maas = json_encode([]);
            $personel->izin = 0;
            $personel->aktif = 1;
            $personel->created_at = now();
            $personel->updated_at = now();
            $result = $personel->save();
            if ($result) {
                $mailData = [
                    "password" => $sifre,
                    "mail" => $request->mail,
                    "title" => "Personelimiz {$request->ad} {$request->soyad}",
                    "body" => "Burası body alanı"
                ];
                Mail::to($request->mail)->send(new SendPasswordMail($mailData));
                $log = IslemCesitleri::where('tip', \App\Helpers\Writer::PersonelEkle)->get();
                PersonelIslemKayit::insert([
                    "kurumId" => session()->get('personel')->kurumId,
                    "personelId" => session()->get('personel')->id,
                    "logId" => $log[0]->id
                ]);
                return back()->with('success', 'Personel Ekleme Başarılı!');
            } else return back()->withErrors(['Beklenmeyen Hata Oluştu!']);
        } else return back()->withErrors(['Bu işlemi gerçekleştirmek için yetkili değilsiniz!']);
    }

    public function izinTalep(IzinTalep $request)
    {
        $tarihs = explode(' - ', $request->tarih);
        $izin = new PersonelIzin();
        $izin->kurumId = session()->get('personel')->kurumId;
        $izin->personelId = session()->get('personel')->id;
        $izin->aciklama = $request->aciklama;
        $izin->izinBaslangic = Helper::firstMonthToDate($tarihs[0]);
        $izin->izinBitis = Helper::firstMonthToDate($tarihs[1]);
        $izin->created_at = now();
        $izin->updated_at = now();
        $result = $izin->save();
        if ($result) {
            return back()->withErrors(['İzin talebiniz alınmıştır.']);
        } else return back()->withErrors(['Sistemsel hata!']);
    }
}
