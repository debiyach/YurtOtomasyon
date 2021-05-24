<?php

namespace App\Http\Controllers\Ogrenci;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Aidat;
use App\Models\OgrenciAidatGecmisi;
use App\Models\Yoklama;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TempTable extends Controller
{
    public function aidatGoruntule(Request $request)
    {

        $users = OgrenciAidatGecmisi::where('kurumId', session()->get('ogrenci')->kurumId);

        if($request->has('katNo')) $users->where('faturaNo', $request->katNo);

        if($request->has('id')) $users->where('ogrenciId',$request->id);

        if($request->has('tarih') && !empty($request->tarih)){
            $tarih = explode(' - ', $request->tarih);
            $users->whereBetween('created_at', [ Helper::firstMonthToDate($tarih[0]),  Helper::firstMonthToDate($tarih[1])]);
        }
        return DataTables::eloquent($users)
        ->editColumn('created_at', function (OgrenciAidatGecmisi $user) {
            return $user->created_at->format('d-m-Y H:i:s') ?? '';
        })
            ->toJson();

    }

    public function aidatListesi(Request $request)
    {

        $users = Aidat::where('kurumId', session()->get('ogrenci')->kurumId);
        if($request->has('id')) $users->where('ogrenciId',$request->id);

        if($request->has('tarih') && !empty($request->tarih)){
            $tarih = explode(' - ', $request->tarih);
            $users->whereBetween('sonOdemeTarihi', [ Helper::firstMonthToDate($tarih[0]),  Helper::firstMonthToDate($tarih[1])]);
        }

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


    public function ogrenciYoklamaGoster(Request $request)
    {
       

        $users = Yoklama::where('kurumId', session()->get('ogrenci')->kurumId)->where('ogrenciId', session()->get('ogrenci')->id);
        if($request->has('tarih') && !empty($request->tarih)){
            $tarih = explode(' - ', $request->tarih);
            $users->whereBetween('created_at', [ Helper::firstMonthToDate($tarih[0]),  Helper::firstMonthToDate($tarih[1])]);
        }
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
