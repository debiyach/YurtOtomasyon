<?php

namespace App\Http\Controllers\Ogrenci;

use App\Http\Controllers\Controller;
use App\Models\Aidat;
use App\Models\OgrenciAidatGecmisi;
use App\Models\Yoklama;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TempTable extends Controller
{
    public function aidatGoruntule($id = null)
    {

        $users = OgrenciAidatGecmisi::where('kurumId', session()->get('ogrenci')->kurumId)->where('ogrenciId', $id);
        return DataTables::eloquent($users)
        ->editColumn('created_at', function (OgrenciAidatGecmisi $user) {
            return $user->created_at->format('d-m-Y H:i:s') ?? '';
        })
            ->toJson();

    }

    public function aidatListesi($id = null)
    {

        $users = Aidat::where('kurumId', session()->get('ogrenci')->kurumId)->where('ogrenciId', $id);
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


    public function ogrenciYoklamaGoster()
    {
        $users = Yoklama::where('kurumId', session()->get('ogrenci')->kurumId)->where('ogrenciId', session()->get('ogrenci')->id);
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
}
