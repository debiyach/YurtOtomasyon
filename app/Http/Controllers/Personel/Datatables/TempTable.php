<?php

namespace App\Http\Controllers\Personel\Datatables;

use App\Http\Controllers\Controller;
use App\Models\Ogrenci;
use App\Models\OgrenciIstekSikayet;
use App\Models\Personel;
use App\Models\OgrenciLog;
use App\Models\PersonelIslemKayit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TempTable extends Controller
{

    public function ogrenciIslemBilgileri($id = null)
    {
        $users = Ogrencilog::where('kurumId', session()->get('personel')->kurumId)->where('ogrenciId', $id);
        return DataTables::eloquent($users)
            ->editColumn('logId', function (Ogrencilog $user) {
                return $user->ogrenciToLog->tip;
            })
            ->toJson();
    }

    public function personelIslemBilgileri($id = null)
    {
        $users = PersonelIslemKayit::where('kurumId', session()->get('personel')->kurumId)->where('personelId', $id);
        return DataTables::eloquent($users)
            ->editColumn('logId', function (PersonelIslemKayit $user) {
                return $user->personelToLog->tip;
            })
            ->toJson();
    }

    //Öğrenciler

    public function getStudents(Request $request)
    {
        $users = Ogrenci::where('kurumId', session()->get('personel')->kurumId);
        
        return DataTables::of($users)
            ->editColumn('binaNo', function (Ogrenci $user) {
                return $user->ogrenciToBlok->binaAdi;
            })
            ->editColumn('katNo', function (Ogrenci $user) {
                return $user->ogrenciToKat->katAdi;
            })
            ->editColumn('odaNo', function (Ogrenci $user) {
                return $user->ogrenciToOda->odaNo;
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
        return Datatables::of($data)->make();
    }
}
