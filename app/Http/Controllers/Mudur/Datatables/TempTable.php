<?php

namespace App\Http\Controllers\Mudur\Datatables;

use App\Http\Controllers\Controller;
use App\Models\Katlar;
use App\Models\Odalar;
use App\Models\Ogrenci;
use App\Models\Aidat;
use App\Models\OgrenciAidatGecmisi;
use App\Models\OgrenciIstekSikayet;
use App\Models\Personel;
use App\Models\OgrenciLog;
use App\Models\PersonelIslemKayit;
use Illuminate\Http\Request;
use App\Models\Yoklama;
use Yajra\DataTables\Facades\DataTables;

class TempTable extends Controller
{

    public function ogrenciYoklamaGoster($id = null)
    {
        $users = Yoklama::where('kurumId', session()->get('personel')->kurumId)->where('ogrenciId', $id);
        return DataTables::eloquent($users)
        ->editColumn('yokla', function (Yoklama $user) {
            if($user->yokla){
                return 'İzinli';
            }else{
                return 'Devamsız';
            }
        })
        ->editColumn('created_at', function (Yoklama $user) {
            return $user->created_at->format('d-m-Y') ?? '';
        })
            ->toJson();
    }

    public function ogrenciIslemBilgileri($id = null)
    {
        $users = Ogrencilog::where('kurumId', session()->get('personel')->kurumId)->where('ogrenciId', $id);
        return DataTables::eloquent($users)
            ->editColumn('logId', function (Ogrencilog $user) {
                return $user->ogrenciToLog->tip ?? '';
            })
            ->editColumn('created_at', function (Ogrencilog $user) {
                return $user->created_at->format('d-m-Y H:i:s') ?? '';
            })
            ->toJson();
    }

    public function personelIslemBilgileri($id = null)
    {
        $users = PersonelIslemKayit::where('kurumId', session()->get('personel')->kurumId)->where('personelId', $id);
        return DataTables::eloquent($users)
            ->editColumn('logId', function (PersonelIslemKayit $user) {
                return $user->personelToLog->tip ?? '';
            })
            ->editColumn('created_at', function (PersonelIslemKayit $user) {
                return $user->created_at->format('d-m-Y H:i:s') ?? '';
            })
            ->toJson();
    }

    //Öğrenciler

    public function getStudents(Request $request)
    {
        $users = Ogrenci::where('kurumId', session()->get('personel')->kurumId);
        $data = [];
        if($request->has('odaNo') && $request->odaNo != null){
            $data['odaNo'] = [];
            $odalar = Odalar::where('kurumId', session()->get('personel')->kurumId)->whereIn('odaNo',[$request->odaNo])->get();
            foreach ($odalar as $oda) {
                $data['odaNo'][] = $oda->id;
            }
            $users->whereIn('odaNo',$data['odaNo']);
        }
        if($request->has('katNo') && $request->katNo != null){
            $data['kat'] = [];
            $katlar = Katlar::where('kurumId', session()->get('personel')->kurumId)->whereIn('katAdi',[$request->katNo])->get();
            foreach ($katlar as $kat) {
                $data['kat'][] = $kat->id;
            }
            $users->whereIn('katNo',$data['kat']);
        }
        return DataTables::eloquent($users)
            ->editColumn('binaNo', function (Ogrenci $user) {
                return $user->ogrenciToBlok->binaAdi ?? '';
            })
            ->editColumn('katNo', function (Ogrenci $user) {
                return $user->ogrenciToKat->katAdi ?? '';
            })
            ->editColumn('odaNo', function (Ogrenci $user) {
                return $user->ogrenciToOda->odaNo ?? '';
            })
            ->make();
    }

    //personeller
    public function getPersonels(Request $request)
    {
        $users = Personel::where('kurumId', session()->get('personel')->kurumId);
        return Datatables::of($users)->make();
    }

    //istek-sikayet
    public function getIstekSikayet(Request $request)
    {
        $data = OgrenciIstekSikayet::where('kurumId', session()->get('personel')->kurumId);
        return Datatables::of($data)
        ->editColumn('created_at', function (OgrenciIstekSikayet $user) {
            return $user->created_at->format('d-m-Y H:i:s') ?? '';
        })
        ->make();
    }
    
    //Öğrenci Aidat Görüntüleme
    public function ogrenciAidatGoruntule($id = null)
    {
        $users = OgrenciAidatGecmisi::where('kurumId', session()->get('personel')->kurumId)->where('ogrenciId', $id);
        return DataTables::eloquent($users)
        ->editColumn('created_at', function (OgrenciAidatGecmisi $user) {
            return $user->created_at->format('d-m-Y H:i:s') ?? '';
        })
            ->toJson();

    }

    // öğrenci aidat listesi 
    public function aidatListesi($id)
    {

        $users = Aidat::where('ogrenciId', $id);
        return DataTables::eloquent($users)
        ->editColumn('durum', function (Aidat $user) {
            if($user->durum==1){
                return 'Tamamlandı';
            }else{
                return 'Devam Ediyor';
            }
        })
        ->editColumn('created_at', function (Aidat $user) {
            return $user->created_at->format('d-m-Y') ?? '';
        })
            ->toJson();

    }
}
