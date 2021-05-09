<?php

namespace App\Http\Controllers\Ogrenci;

use App\Http\Controllers\Controller;
use App\Models\Aidat;
use App\Models\Yoklama;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TempTable extends Controller
{
    public function aidatGoruntule($id = null)
    {

        $users = Aidat::where('kurumId', session()->get('ogrenci')->kurumId)->where('ogrenciId', $id);
        return DataTables::eloquent($users)
            ->toJson();

    }
    public function ogrenciYoklamaGoster()
    {
        $users = Yoklama::where('kurumId', session()->get('ogrenci')->kurumId)->where('ogrenci', session()->get('ogrenci')->id);
        return DataTables::eloquent($users)
            ->toJson();
    }
}
