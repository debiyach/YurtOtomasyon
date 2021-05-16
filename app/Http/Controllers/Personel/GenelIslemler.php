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
use App\Models\Odalar;
use App\Models\Yataklar;
use App\Models\Yoklama;
use App\Models\Personel;
use App\Models\Ogrenci;
use App\Models\PersonelIslemKayit;
use App\Models\PersonelIzin;
use Illuminate\Http\Request;
use App\Helpers\Writer;
use App\Http\Controllers\Logs\Logs;
use Illuminate\Support\Str;
use Mail;


class GenelIslemler extends Controller
{
    public function personelIslemBilgileri()
    {
        $data['islemler'] = IslemCesitleri::whereIn('tur',[2,3])->get();
        return view('personel.personelIslemBilgileri', $data);
    }

    public function ogrenciIslemBilgileri($id = null)
    {
        $data['islemler'] = IslemCesitleri::whereIn('tur',[1,3])->get();
        return view('personel.ogrenciIslemBilgileri', $data);
    }

    public function ogrenciListelePage()
    {
        $data['katlar'] = Katlar::where('kurumId', session()->get('personel')->kurumId)->get();
        $data['binalar'] = Binalar::where('kurumId', session()->get('personel')->kurumId)->get();
        return view('personel.studentlist', $data);
    }

    public function personelSetYetki(Request $request)
    {
        if (json_decode(session()->get('personel')->yetki)->personelYetkiDuzenle === \App\Helpers\Writer::Ekle) {
            $updatePerm = Personel::find($request->id);
            $yetki = json_decode($updatePerm->yetki, 1);
            $yetki[$request->deger] = ($request->durum == 'true') ? 1 : 0;
            $result = $updatePerm->update([
                'yetki' => json_encode($yetki)
            ]);
            if ($result) {
                Logs::personelLog(Writer::changePerm, Writer::changePerm($request->durum, $request->deger));
                return response(['type' => 'success', 'message' => 'İzin başarıyla değiştirildi!']);
            } else return response(['type' => 'error', 'message' => 'İzin değiştilirken hata oluştu!']);
        } else return response(['type' => 'error', 'message' => 'İzin düzenleme yetkiniz yok!']);
    }


    public function personelYetkiPage()
    {
        $data['personels'] = Personel::where('tip', '=', 'Personel')
            ->where('kurumId', session()->get('personel')->kurumId)
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

    public function binaListele(){
        $data['binalar'] = Binalar::where('kurumId',session()->get('personel')->kurumId)->get();
        return view('personel.binaGoruntule',$data);
    }

    public function binaGetir(Request $request){
        $id = $request->id;
        $data['katlar'] = Katlar::where('kurumId',session()->get('personel')->kurumId)->where('binaId',$id)->orderBy('id','desc')->get();
        $data['odalar'] = Odalar::where('kurumId',session()->get('personel')->kurumId)->where('binaId',$id)->get();
        $data['yataklar'] = Yataklar::where('kurumId',session()->get('personel')->kurumId)->where('binaId',$id)->get();
        $data['ogrenciler'] = Ogrenci::where('kurumId',session()->get('personel')->kurumId)->where('binaNo',$id)->get();
        
        return view('layouts.components.binaGetir',$data);
    }

    public function ogrenciYoklama(){
        $data['katlar'] = Katlar::where('kurumId', session()->get('personel')->kurumId)->get();
        $data['binalar'] = Binalar::where('kurumId', session()->get('personel')->kurumId)->get();
        return view('personel.ogrenciyoklama', $data);
    }

    public function ogrenciYoklamaKaydet(Request $request){
        $bilgi = $request->post();
        $tarih = $request->post()['tarih'];
        $deneme=[];
        $sonuc=[];
            foreach ($bilgi as $row ) {
                $deneme[] = $row;
            }
            for ($i=3; $i < count($bilgi); $i++) { 
                $sonuc[] = $deneme[$i];
            }
        if(count($bilgi)==3){
            return back()->with('error','hata var');
        }

        foreach ($sonuc as $row ) {
            $deger = explode(" ",$row);
            $yoklama = new Yoklama;
            $yoklama->kurumId = session()->get('personel')->kurumId;
            $yoklama->ogrenciId = $deger[1];
            $yoklama->created_at = $tarih;
            if ($deger[0]=='izinli') {
                $yoklama->yokla = 1;
            }else{
                $yoklama->yokla = 0;
            }
            $result = $yoklama->save();
        }
        
        return back()->with('success','Öğrenci Ekleme Başarılı!');

        
    }


}
