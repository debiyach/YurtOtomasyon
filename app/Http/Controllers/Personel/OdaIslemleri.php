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
        $data['katlar'] = Katlar::where('kurumId', session()->get('personel')->kurumId)->select('katAdi')->get();
        $data['yataklar'] = Yataklar::select('yatakAdi')->where('kurumId', session()->get('personel')->kurumId)->get();
        $data['odalar'] = Odalar::where('kurumId', session()->get('personel')->kurumId)->select('odaAdi')->get();
        return view('personel.odaSayfasi', $data);
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
            ->with('yatakToOgrenci');
        if ($id) $yataklar->where('odaId', $id);
        return $yataklar->get();
    }

    public function odaGetir()
    {
        return Odalar::where('odalars.kurumId', session()
            ->get('personel')->kurumId)
            ->leftJoin('katlars', 'odalars.katId', '=', 'katlars.id')
            ->rightJoin('binalars', 'odalars.binaId', '=', 'binalars.id')
            ->select('odalars.odaAdi', 'odalars.id', 'katlars.katAdi', 'binalars.binaAdi')->get();
    }

    public function binaEkle(Request $request)
    {
        $request->validate([
            'binaAdi' => 'required|min:2'
        ]);

        $binalar = new Binalar();
        $binalar->kurumId = session()->get('personel')->kurumId;
        $binalar->binaAdi = $request->binaAdi;
        $binalar->created_at = now();
        $binalar->updated_at = now();
        $result = $binalar->save();
        return ($result) ? true : false;
    }

    public function katEkle(Request $request)
    {
        $request->validate([
            'binaNo' => 'required',
            'katAdi' => 'required'
        ]);

        $katlar = new Katlar();
        $katlar->kurumId = session()->get('personel')->kurumId;
        $katlar->binaId = $request->binaNo;
        $katlar->katAdi = $request->katAdi;
        $katlar->created_at = now();
        $katlar->updated_at = now();
        $result = $katlar->save();
        return ($result) ? true : false;
    }

    public function odaEkle(Request $request)
    {
        $request->validate([
            'odaAdi' => 'required',
            'katNo' => 'required',
            'binaNo' => 'required'
        ]);

        $odalar = new Odalar;
        $odalar->kurumId = session()->get('personel')->kurumId;
        $odalar->binaId = $request->binaNo;
        $odalar->katId = $request->katNo;
        $odalar->odaAdi = $request->odaAdi;
        $result = $odalar->save();
        return ($result) ? true : false;
    }

    public function yatakEkle(Request $request)
    {
        $request->validate([
            'odaSecSelect' => 'required',
            'yatakAdi' => 'required'
        ]);
        $oda = Odalar::find($request->odaSecSelect);
        $yataklar = new Yataklar;
        $yataklar->odaId = $request->odaSecSelect;
        $yataklar->binaId = $oda->binaId;
        $yataklar->katId = $oda->katId;
        $yataklar->kurumId = session()->get('personel')->kurumId;
        $yataklar->yatakAdi = $request->yatakAdi;
        $result = $yataklar->save();
        return ($result) ? true : false;

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

    public function yatakKaldir(Request $request)
    {
        $request->validate([
            'yatakId' => 'required'
        ]);

        Yataklar::find($request->yatakId)->delete();
        return true;
    }

}
