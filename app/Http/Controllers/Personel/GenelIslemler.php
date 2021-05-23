<?php

namespace App\Http\Controllers\Personel;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Personel\IzinTalep;
use App\Http\Requests\Personel\PersonelEkle;
use App\Mail\SendPasswordMail;
use App\Models\Binalar;
use App\Models\Aidat;
use App\Models\IslemCesitleri;
use App\Models\Katlar;
use App\Models\OgrenciAidatGecmisi;
use App\Models\Odalar;
use App\Models\Yataklar;
use App\Models\Yoklama;
use App\Models\Ogrenciisteksikayet;
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
        $data['islemler'] = IslemCesitleri::get();
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
            $personel->maas = $request->maas;
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
        $personelisim = session()->get('personel')->ad;
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

            $yoklama->aciklama = ''.$tarih.' tarihinde '. $personelisim.' tarafından alınan yoklamada devamsız kayıt edildiniz.';
            $yoklama->yokla = 0;

            $gelendeger=[];
            if ($deger[0]=='izinli') {

                $yoklama->yokla = 1;
                $yoklama->aciklama = ''.$tarih.' tarihinde '.$personelisim.' tarafından alınan yoklamada izinli kayıt edildiniz.';
            
            }else{

                $kontrol = Ogrenciisteksikayet::where('ogrenciId',$deger[1])->where('tip','İzin')->where('onayDurumu','Kabul Edildi')->get();
                if($kontrol){
                    foreach ($kontrol as $row => $item) {
                        
                        if($tarih >= $item->izinBaslangic && $tarih <= $item->izinBitis){
                            $yoklama->aciklama = ''.$tarih.' tarihinde '.$personelisim.' tarafından alınan yoklamada izinli kayıt edildiniz.';
                            $yoklama->yokla = 1;
                        }else{
                            $yoklama->aciklama = ''.$tarih.' tarihinde '. $personelisim.' tarafından alınan yoklamada devamsız kayıt edildiniz.';
                            $yoklama->yokla = 0;
                        }
                    }
                }
                
                // $yoklama->yokla = 0;
                // $yoklama->aciklama = ''.$tarih.' tarihinde '. $personelisim.' tarafından alınan yoklamada devamsız kayıt edildiniz.';
            }

            $result = $yoklama->save();
        }
        
        return back()->with('success','Öğrenci Ekleme Başarılı!');

        
    }

    public function aidatListe($id){
        $data['aidats'] = Aidat::where('ogrenciId', $id)->where('yatirilacak','>',0)->get();
        return view('personel.aidatListe', $data);
    }

    public function aidatAidatGecmisiListe($id){
        $data['veri'] = Aidat::where('ogrenciId',$id)->get();
        return view('personel.ogrenciAidatGecmisi', $data);
    }

    public function pesinOdeme($id){
        $data['aidat'] = Aidat::find($id);
        return view('personel.pesinOdeme',$data);
    }

    public function pesinOde(Request $request){
        $personel['ad'] = session()->get('personel')->ad;
        $personel['soyad'] = session()->get('personel')->soyad;
        $gecmis = new OgrenciAidatGecmisi;
        $yatir = Aidat::find($request->aidatId);
        //$kalanTaksit = ($yatir->yatirilacak == $request->para) ? 1 : 0;
        $yatir->yatirilacak = $yatir->yatirilacak - $request->para;
        $yatir->yatirilan += $request->para;
        if($yatir->yatirilacak == 0){
            $yatir->durum = 1;
            $gecmis->aciklama = ''.$request->aidatId.' Numaralı Fatura için  '.$personel['ad'].' '.$personel['soyad'].' gözetiminde peşin '.$request->para.' ucret yatırılmış ve '.$yatir->mevcutAy.'. taksit ödemesi tamamlanmıştır';
        }else{
            $yatir->durum = 0;
            $gecmis->aciklama = ''.$request->aidatId.' Numaralı Fatura için  '.$personel['ad'].' '.$personel['soyad'].' gözetiminde peşin '.$request->para.' ucret yatırılmış ve  geriye ödenmesi gereken '.$yatir->yatirilacak.' tutarında ucret kalmıştır.';

        }
        //$yatir->durum = $kalanTaksit;
        $yatir->updated_at = now();
        //$ogrenci = Ogrenci::find($yatir->ogrenciId);
        //$ogrenci->aidat -= $request->para;

        $gecmis->ogrenciId = $yatir->ogrenciId;
        $gecmis->kurumId = $yatir->kurumId;
        $gecmis->faturaNo = $request->aidatId;
        $gecmis->yatirilan = $request->para;
        $gecmis->created_at = now();
        $gecmis->updated_at = now();


        $result = $yatir->save() && $gecmis->save();

        return $result ? redirect()->route('personel.aidatListe',$yatir->ogrenciId)->withErrors(['Ödeme işleminiz gerçekleşti']) : redirect()->route('personel.aidatListe',$yatir->ogrenciId)->withErrors(['Ödeme işleminiz sırasında hata alındı']);
    }

    public function istekTalepOnayla($id){

        $istek = Ogrenciisteksikayet::find($id);
        $baslangicTarihi = date('Y-m-d',strtotime($istek->izinBaslangic));
        $bitisTarihi = date('Y-m-d',strtotime($istek->izinBitis));
        
        // $simdi = date('Y-m-d',strtotime("2021-05-15"));

        // if($simdi > $baslangicTarihi && $simdi < $bitisTarihi){
        //     return 'Baslangic = '. $baslangicTarihi.'<br>'. 'Bitis Tarihi = '.$bitisTarihi.'<br>'.' simdiki zaman = '. $simdi;
        // }else{
        //     return 'Baslangic = '. $baslangicTarihi.'<br>'. 'Bitis Tarihi = '.$bitisTarihi.'<br>'.' simdiki zaman = '. $simdi .'bu nasıl çalışıyor aq';
        // }   

        $istek->onayDurumu = "Kabul Edildi";
        $result = $istek->save();
        return $result ? redirect()->route('personel.istekTalepList')->withErrors(['İşlem Başarıyla Onaylandı']) : redirect()->route('personel.istekTalepList',$yatir->ogrenciId)->withErrors(['İşlem sırasında bir sorunla karşılaşıldı.']);
    }

    public function istekTalepReddet($id){
        $istek = Ogrenciisteksikayet::find($id);
        $baslangicTarihi = date('Y-m-d',strtotime($istek->izinBaslangic));
        $bitisTarihi = date('Y-m-d',strtotime($istek->izinBitis));
        
        $istek->onayDurumu = "Reddedildi";
        $result = $istek->save();
        return $result ? redirect()->route('personel.istekTalepList')->withErrors(['İşlem Başarıyla Reddedildi']) : redirect()->route('personel.istekTalepList',$yatir->ogrenciId)->withErrors(['İşlem sırasında bir sorunla karşılaşıldı.']);
    }

    public function ogrenciYoklamaGecmisi($id){
        $data['veri'] = Yoklama::where('ogrenciId',$id)->get();
        return view('personel.ogrenciYoklamaGecmisi',$data);
    }

}
