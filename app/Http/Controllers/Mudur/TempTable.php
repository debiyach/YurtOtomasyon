<?php

namespace App\Http\Controllers\Mudur;

use App\Http\Controllers\Controller;
use App\Models\PersonelMaas;
use App\Models\Yoklama;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TempTable extends Controller
{
    public function personelMaasGoster($id = null)
    {
        $users = PersonelMaas::where('kurumId', session()->get('mudur')->kurumId)->where('personelId', $id);
        return DataTables::eloquent($users)
            ->toJson();
    }

    public function ogrenciYoklamaGoster($id = null)
    {
        $users = Yoklama::where('kurumId', session()->get('mudur')->kurumId)->where('ogrenci', $id);
        return DataTables::eloquent($users)
            ->toJson();
    }
}
