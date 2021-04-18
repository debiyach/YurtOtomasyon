<?php

namespace App\Http\Controllers\Personel\Datatables;

use App\Http\Controllers\Controller;
use App\Models\Ogrenci;
use App\Models\Personel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TempTable extends Controller
{
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
}
