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
        $users = Ogrencilog::where('kurumId',session()->get('personel')->kurumId)->where('ogrenciId',$id);
        return Datatables::of($users)->make();
    }

    public function personelIslemBilgileri($id = null)
    {
        $users = PersonelIslemKayit::where('kurumId',session()->get('personel')->kurumId)->where('personelId',$id);
        return Datatables::of($users)->make();
    }

    //Öğrenciler

    public function getStudents(Request $request)
    {
        $users = Ogrenci::where('kurumId',session()->get('personel')->kurumId);
        return Datatables::of($users)->make();
    }

    //personeller
    public function getPersonels(Request $request)
    {
        $users = Personel::where('kurumId',session()->get('personel')->kurumId);
        return Datatables::of($users)->make();
    }

    //istek-sikayet
    public function getIstekSikayet(Request $request)
    {
        $data = OgrenciIstekSikayet::where('kurumId',session()->get('personel')->kurumId);
        return Datatables::of($data)->make();
    }
}
