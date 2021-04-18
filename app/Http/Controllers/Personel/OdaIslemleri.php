<?php

namespace App\Http\Controllers\Personel;

use App\Http\Controllers\Controller;
use App\Models\Binalar;
use App\Models\Katlar;
use App\Models\Odalar;
use App\Models\Ogrenci;
use App\Models\Yataklar;
use Illuminate\Http\Request;

class OdaIslemleri extends Controller
{
    public function odaSayfasi()
    {
        return view('personel.odaSayfasi');
    }

    public function binaGetir()
    {
        return Binalar::where('kurumId', session()->get('personel')->kurumId)->select('binaAdi', 'id')->get();
    }

    public function katGetir($id = null)
    {

        $query = Katlar::where('kurumId', session()->get('personel')->kurumId)->select('katAdi', 'id');
        if ($id) {
            $query->where('binaId', $id);
        }
        return $query->get();
    }

    public function yatakGetir($id = null)
    {

        $yataklar = Yataklar::where('kurumId', session()->get('personel')->kurumId)
            ->with('yatakToOgrenci')->where('odaId', $id)->orderBy('yatakNo')->get();
        if ($yataklar->count() > 0) {
            $result = '';
            foreach ($yataklar as $yatak) {
                if ($yatak->ogrenciId) {
                    $result .= '
                <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="'.$yatak->yatakToOgrenci->foto.'" alt=""
                                 class="rounded-circle"
                                 width="150">
                            <div class="mt-3">
                                <h4>'.$yatak->yatakToOgrenci->ad.' '.$yatak->yatakToOgrenci->soyad.'</h4>
                                <p class="text-secondary mb-1">'.$yatak->yatakToOgrenci->ad.' '.$yatak->yatakToOgrenci->soyad.'</p>
                                <p class="text-muted font-size-sm">'.$yatak->yatakToOgrenci->mail.'</p>
                                <p class="text-secondary mb-1">Yatak Adı : ' . $yatak->yatakAdi . '</p>
                                <p class="text-muted font-size-sm">Yatak No : ' . $yatak->yatakNo . '</p>
                                <button class="btn btn-outline-danger">Kaldır</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                } else {
                    $result .= '
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                 class="rounded-circle"
                                 width="150">
                            <div class="mt-3">
                                <h4>John Doe</h4>
                                <p class="text-secondary mb-1">Yatak Adı : ' . $yatak->yatakAdi . '</p>
                                <p class="text-muted font-size-sm">Yatak No : ' . $yatak->yatakNo . '</p>
                                <button onclick="deleteBed(\'' . route('personel.odaIslemleri.yatakKaldir') . '/' . $yatak->id . '\')" class="btn delete-bed btn-outline-danger">Kaldır</button>
                                <button class="btn ogrenci-ekle btn-outline-success">Ekle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                }
            }
        }
        else $result = '<div class="alert alert-danger" role="alert">
                          Oda da yatak bulunamadı!
                        </div>';

        return $result;

    }

    public function odaGetir($id = null)
    {
        return Odalar::where('kurumId', session()->get('personel')->kurumId)
            ->where('katId', $id)->get();
    }

    public function binaEkle(Request $request)
    {
        $request->validate([
            'binaAdi' => 'required|min:2'
        ]);

        $binalar = Binalar::firstOrCreate(
            ['binaAdi' => $request->binaAdi, 'kurumId' => session()->get('personel')->kurumId],
            ['created_at' => now(), 'updated_at' => now()]
        );

        return ($binalar) ?
            response(['type' => 'success', 'message' => 'Bina başarıyla eklendi!']) :
            response(['type' => 'error', 'message' => 'Bina eklenirken hata oluştu!']);
    }

    public function katEkle(Request $request)
    {
        $request->validate([
            'binaNo' => 'required',
            'katAdi' => 'required'
        ]);

        $katlar = Katlar::firstOrCreate(
            ['katAdi' => $request->katAdi, 'kurumId' => session()->get('personel')->kurumId, 'binaId' => $request->binaNo],
            ['created_at' => now(), 'updated_at' => now()]
        );

        return ($katlar) ?
            response(['type' => 'success', 'message' => 'Kat başarıyla eklendi!']) :
            response(['type' => 'error', 'message' => 'Kat eklenirken hata oluştu!']);
    }

    public function odaEkle(Request $request)
    {
        $request->validate([
            'odaAdi' => 'required',
            'katNo' => 'required',
            'binaNo' => 'required',
            'odaNo' => 'required'
        ]);

        $isRoom = Odalar::where('odaNo', $request->odaNo)
            ->where('kurumId', session()->get('personel')->kurumId)
            ->where('binaId', $request->binaNo)
            ->where('katId', $request->katNo)
            ->count();
        if ($isRoom > 0) return response(['type' => 'error', 'message' => 'Bu oda numarası dolu!']);

        $odalar = new Odalar;
        $odalar->kurumId = session()->get('personel')->kurumId;
        $odalar->binaId = $request->binaNo;
        $odalar->katId = $request->katNo;
        $odalar->odaNo = $request->odaNo;
        $odalar->odaAdi = $request->odaAdi;
        $result = $odalar->save();
        return ($result) ?
            response(['type' => 'success', 'message' => 'Oda başarıyla eklendi!']) :
            response(['type' => 'error', 'message' => 'Oda eklenirken hata oluştu!']);
    }

    public function yatakEkle(Request $request)
    {
        $request->validate([
            'binaNo' => 'required',
            'katNo' => 'required',
            'odaNo' => 'required',
            'yatakNo' => 'required',
            'yatakAdi' => 'required'
        ]);

        $isBed = Yataklar::where('binaId', $request->binaNo)
            ->where('kurumId', session()->get('personel')->kurumId)
            ->where('katId', $request->katNo)
            ->where('odaId', $request->odaNo)
            ->where('yatakNo', $request->yatakNo)
            ->count();
        if ($isBed > 0) return response(['type' => 'error', 'message' => 'Bu yatak numarası dolu!']);

        $yataklar = new Yataklar;
        $yataklar->odaId = $request->odaNo;
        $yataklar->binaId = $request->binaNo;
        $yataklar->katId = $request->katNo;
        $yataklar->kurumId = session()->get('personel')->kurumId;
        $yataklar->yatakAdi = $request->yatakAdi;
        $yataklar->yatakAdi = $request->yatakAdi;
        $yataklar->yatakNo = $request->yatakNo;
        $result = $yataklar->save();
        return ($result) ?
            response(['type' => 'success', 'message' => 'Yatak başarıyla eklendi!']) :
            response(['type' => 'error', 'message' => 'Yatak eklenirken hata oluştu!']);

    }

    public function ogrenciGetir()
    {
        return Ogrenci::where('kurumId', session()->get('personel')->kurumId)->where('yatakNo', null)->select('ad', 'id', 'soyad')->get();
    }

    public function ogrenciEkle(Request $request)
    {
        $request->validate([
            'yatakId' => 'required',
            'ogrId' => 'required',
        ]);

        $ogr = Ogrenci::findOrFail($request->ogrId);
        //dd($ogr->katNo);
        if (!$ogr->yatakNo && !$ogr->odaNo && !$ogr->katNo) {
            $ekle = Yataklar::where('id', $request->yatakId)->where('kurumId', $ogr->kurumId);
            $ekle->update(['ogrenciId' => $request->ogrId]);
            Ogrenci::where('id', $request->ogrId)->update(['yatakNo' => $request->yatakId]);
            return true;
        } else return response(['success' => false, 'message' => 'Öğrenci birden fazla yatakta bulunamaz!'], 404);
    }

    public function ogrenciYatakKaldir(Request $request)
    {
        $request->validate([
            'ogrıd' => 'required'
        ]);

        Ogrenci::where('id', $request->ogrıd)->update(['yatakNo' => null]);
        Yataklar::where('ogrenciId', $request->ogrıd)->update(['ogrenciId' => null]);

        return true;
    }

    public function yatakKaldir($id = null)
    {
        $result = Yataklar::find($id)->delete();
        return ($result) ?
            response(['type' => 'success', 'message' => 'Yatak başarıyla kaldırıldı!']) :
            response(['type' => 'error', 'message' => 'Yatak kaldırılırken hata oluştu!']);
    }

}
