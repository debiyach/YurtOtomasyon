<?php

namespace App\Http\Controllers\Ogrenci;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ogrenci\IzinTalep;
use App\Http\Requests\Ogrenci\SikayetIstek;
use App\Models\Aidat;
use App\Models\OgrenciAidatGecmisi;
use App\Models\OgrenciIstekSikayet;
use App\Models\Ogrenci;
use Illuminate\Http\Request;

class GenelIslemler extends Controller
{
    public function izinTalep(IzinTalep $request)
    {
        $tarihs = explode(' - ', $request->tarih);
        $izin = new OgrenciIstekSikayet;
        $izin->kurumId = session()->get('ogrenci')->kurumId;
        $izin->ogrenciId = session()->get('ogrenci')->id;
        $izin->aciklama = $request->aciklama;
        $izin->tip = 'İzin';
        $izin->izinBaslangic = Helper::firstMonthToDate($tarihs[0]);
        $izin->izinBitis = Helper::firstMonthToDate($tarihs[1]);
        $izin->created_at = now();
        $izin->updated_at = now();
        $result = $izin->save();
        if ($result) {
            return back()->withErrors(['İzin talebiniz alınmıştır.']);
        } else return back()->withErrors(['Sistemsel hata!']);
    }

    public function istekSikayet(SikayetIstek $request)
    {
        switch ($request->tip) {
            case 'sikayet':
                $tip = 'Şikayet';
                break;
            case 'istek':
                $tip = 'istek';
                break;
            case 'ariza':
                $tip = 'Arıza Bildirimi';
                break;
        }
        $izin = new OgrenciIstekSikayet;
        $izin->kurumId = session()->get('ogrenci')->kurumId;
        $izin->ogrenciId = session()->get('ogrenci')->id;
        $izin->aciklama = $request->aciklama;
        $izin->tip = $tip;
        $izin->created_at = now();
        $izin->updated_at = now();
        $result = $izin->save();
        if ($result) {
            return back()->withErrors(["$tip talebiniz alınmıştır."]);
        } else return back()->withErrors(['Sistemsel hata!']);
    }

    public function aidatListe()
    {
        $data['ogrenci'] = Ogrenci::where('id', session()->get('ogrenci')->id)->get();
        $data['aidats'] = Aidat::where('ogrenciId', session()->get('ogrenci')->id)->where('yatirilacak','>',0)->get();
        return view('ogrenci.aidatliste', $data);
    }

    public function aidatOdeme($id = null)
    {
        $data['aidat'] = Aidat::find($id);
        return view('ogrenci.aidatodeme', $data);
    }

    public function aidatOde(Request $request)
    {

        $yatir = Aidat::find($request->aidatId);
<<<<<<< HEAD
        $kalanTaksit = ($yatir->yatirilacak == $request->para) ? 1 : 0;
        $yatir->yatirilacak = $yatir->yatirilacak - $request->para;
        $yatir->yatirilan = $request->para;
        $yatir->durum = $kalanTaksit;
=======
        $yatir->yatirilacak = $yatir->yatirilacak;
        $yatir->yatirilan += $request->para;
>>>>>>> dd9f687b1a35dd0a80edb8adb397b3f3aaedebc1
        $yatir->updated_at = now();
        $ogrenci = Ogrenci::find($yatir->ogrenciId);
        $ogrenci->aidat -= $request->para;
        $result = $yatir->save() && $ogrenci->save();

<<<<<<< HEAD
        return $result ? redirect()->route('ogrenci.aidatListele')->withErrors(['Ödeme işleminiz gerçekleşti']) : redirect()->route('ogrenci.aidatListele')->withErrors(['Ödeme işleminiz sırasında hata alındı']);
=======
        $yatir2 = new OgrenciAidatGecmisi;
        $yatir2->ogrenciId = session()->get('ogrenci')->id;
        $yatir2->kurumId = session()->get('ogrenci')->kurumId;
        $yatir2->yatirilan = $request->para;
        $yatir2->faturaNo = $request->aidatId;
        $yatir2->created_at = now();
        $yatir2->updated_at = now();
        $yatir2->save();

        return  $result ? back()->withErrors(['Ödeme işleminiz gerçekleşti']) :back()->withErrors(['Ödeme işleminiz sırasında hata alındı']) ; 
>>>>>>> dd9f687b1a35dd0a80edb8adb397b3f3aaedebc1
    }
}
