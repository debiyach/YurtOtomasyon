<?php

namespace App\Http\Controllers\Personel;

use App\Helpers\Writer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Logs\Logs;
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

    public function direkOda($id = null)
    {
        $data['odaId'] = $id;
        return view('personel.odaSayfasi',$data);
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
                            <img src="' . $yatak->yatakToOgrenci->foto . '" alt=""
                                class="rounded-circle"
                                width="150">
                            <div class="mt-3">
                                <h4>' . $yatak->yatakToOgrenci->ad . ' ' . $yatak->yatakToOgrenci->soyad . '</h4>
                                <p class="text-secondary mb-1">' . $yatak->yatakToOgrenci->ad . ' ' . $yatak->yatakToOgrenci->soyad . '</p>
                                <p class="text-muted font-size-sm">' . $yatak->yatakToOgrenci->mail . '</p>
                                <p class="text-secondary mb-1">Yatak Adı : ' . $yatak->yatakAdi . '</p>
                                <p class="text-muted font-size-sm">Yatak No : ' . $yatak->yatakNo . '</p>
                                <button class="btn btn-outline-danger" onclick="ogrenciKaldir(' . $yatak->yatakToOgrenci->id . ')">Kaldır</button>
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
                                <h4>Boş Yatak</h4>
                                <p class="text-secondary mb-1">Yatak Adı : ' . $yatak->yatakAdi . '</p>
                                <p class="text-muted font-size-sm">Yatak No : ' . $yatak->yatakNo . '</p>
                                <button onclick="deleteBed(\'' . route('personel.odaIslemleri.yatakKaldir') . '/' . $yatak->id . '\')" class="btn delete-bed btn-outline-danger">Kaldır</button>
                                <button onclick="addBed(' . $yatak->id . ')" class="btn ogrenci-ekle btn-outline-success">Ekle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                }
            }
        } else $result = '<div class="alert alert-danger" role="alert">
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
        if (json_decode(session()->get('personel')->yetki)->binaEkle === \App\Helpers\Writer::Ekle) {
            $request->validate([
                'binaAdi' => 'required|min:2'
            ]);

            $binalar = Binalar::firstOrCreate(
                ['binaAdi' => $request->binaAdi, 'kurumId' => session()->get('personel')->kurumId],
                ['created_at' => now(), 'updated_at' => now()]
            );
            if ($binalar) {
                Logs::personelLog(Writer::BinaEkle, Writer::BinaEkle($request->binaAdi));
                return response(['type' => 'success', 'message' => 'Bina başarıyla eklendi!']);
            } else return response(['type' => 'error', 'message' => 'Bina eklenirken hata oluştu!']);
        } else return response(['type' => 'error', 'message' => 'Bina ekleme yetkiniz yok!']);

    }

    public function katEkle(Request $request)
    {
        if (json_decode(session()->get('personel')->yetki)->katEkle === \App\Helpers\Writer::Ekle) {
            $request->validate([
                'binaNo' => 'required',
                'katAdi' => 'required'
            ]);

            $katlar = Katlar::firstOrCreate(
                ['katAdi' => $request->katAdi, 'kurumId' => session()->get('personel')->kurumId, 'binaId' => $request->binaNo],
                ['created_at' => now(), 'updated_at' => now()]
            );

            if ($katlar) {
                Logs::personelLog(Writer::KatEkle, Writer::KatEkle($request->binaNo, $request->katAdi));
                return response(['type' => 'success', 'message' => 'Kat başarıyla eklendi!']);
            } else return response(['type' => 'error', 'message' => 'Kat eklenirken hata oluştu!']);
        } else return response(['type' => 'error', 'message' => 'Kat ekleme yetkiniz yok!']);

    }

    public function odaEkle(Request $request)
    {
        if (json_decode(session()->get('personel')->yetki)->odaEkle === \App\Helpers\Writer::Ekle) {
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
            if ($result) {
                Logs::personelLog(Writer::OdaEkle, Writer::OdaEkle($request->binaNo, $request->odaNo));
                return response(['type' => 'success', 'message' => 'Oda başarıyla eklendi!']);
            } else return response(['type' => 'error', 'message' => 'Oda eklenirken hata oluştu!']);
        } else return response(['type' => 'error', 'message' => 'Oda ekleme yetkiniz yok!']);
    }

    public function yatakEkle(Request $request)
    {
        if (json_decode(session()->get('personel')->yetki)->yatakEkle === \App\Helpers\Writer::Ekle) {
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
            if ($result) {
                Logs::personelLog(Writer::YatakEkle, Writer::YatakEkle($request->odaNo, $request->yatakAdi));
                return response(['type' => 'success', 'message' => 'Yatak başarıyla eklendi!']);
            } else return response(['type' => 'error', 'message' => 'Yatak eklenirken hata oluştu!']);
        } else return response(['type' => 'error', 'message' => 'Yatak ekleme yetkiniz yok!']);

    }

    public function ogrenciGetir()
    {
        return Ogrenci::where('kurumId', session()->get('personel')->kurumId)->where('yatakNo', null)->select('ad', 'id', 'soyad')->get();
    }

    public function ogrenciEkle(Request $request)
    {
        if (json_decode(session()->get('personel')->yetki)->ogrenciYatakEkle === \App\Helpers\Writer::Ekle) {
            $request->validate([
                'yatakId' => 'required',
                'ogrNo' => 'required',
            ]);

            $ogr = Ogrenci::findOrFail($request->ogrNo);
            if (!$ogr->yatakNo && !$ogr->odaNo && !$ogr->katNo) {
                $yatak = Yataklar::find($request->yatakId);
                $ekle = Yataklar::where('id', $request->yatakId)->where('kurumId', $ogr->kurumId);
                $ekle->update(['ogrenciId' => $request->ogrNo]);
                Ogrenci::where('id', $request->ogrNo)->update(
                    [
                        'yatakNo' => $request->yatakId,
                        'binaNo' => $yatak->binaId,
                        'odaNo' => $yatak->odaId,
                        'katNo' => $yatak->katId
                    ]
                );
                Logs::personelLog(Writer::OgrenciYatakEkle, Writer::OgrenciYatakEkle($request->ogrNo, $request->yatakId));
                return response(['type' => "success", 'message' => 'Öğrenci yatağa eklendi!']);
            } else return response(['type' => "error", 'message' => 'Öğrenci birden fazla yatakta bulunamaz!']);
        } else return response(['type' => 'error', 'message' => 'Öğrenciyi yatağa ekleme yetkiniz yok!']);
    }

    public function ogrenciYatakKaldir(Request $request)
    {
        if (json_decode(session()->get('personel')->yetki)->ogrenciYatakKaldir === \App\Helpers\Writer::Ekle) {
            $request->validate([
                'ogrid' => 'required'
            ]);
            $r3 = Yataklar::where('ogrenciId', $request->ogrid)->get();
            $r1 = Ogrenci::where('id', $request->ogrid)->update([
                'yatakNo' => null,
                'binaNo' => null,
                'odaNo' => null,
                'katNo' => null
            ]);
            $r2 = Yataklar::where('ogrenciId', $request->ogrid)->update(['ogrenciId' => null]);
            if ($r2 && $r1) {
                Logs::personelLog(Writer::OgrenciYatakKaldir, Writer::OgrenciYatakKaldir($request->ogrid, $r3[0]->id));
                return response(['type' => 'success', 'message' => 'Öğrenci yataktan başarıyla kaldırıldı!']);
            } else return response(['type' => 'error', 'message' => 'Bir hata oluştu!']);
        } else return response(['type' => 'error', 'message' => 'Öğrenciyi yataktan kaldırma yetkiniz yok!']);

    }

    public function yatakKaldir($id = null)
    {
        if (json_decode(session()->get('personel')->yetki)->yatakKaldir === \App\Helpers\Writer::Ekle) {
            $result = Yataklar::find($id)->delete();
            if ($result) {
                Logs::personelLog(Writer::YatakKaldir, Writer::yatakKaldir($id));
                return response(['type' => 'success', 'message' => 'Yatak başarıyla kaldırıldı!']);
            } else return response(['type' => 'error', 'message' => 'Yatak kaldırılırken hata oluştu!']);
        } else return response(['type' => 'error', 'message' => 'Yatak kaldırma yetkiniz yok!']);
    }


}
