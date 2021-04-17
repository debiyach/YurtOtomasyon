<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @param $request . request sınfını dahil edin.
     * @param $requestName . dosyayı çağırımdaki input adını dahil edin.
     * @param $path . kaydedilecek dosya yolunu belirtin.
     */
    public function putFile($request,$requestName,$path)    {
        $dosyAdiUzanti = $request->file($requestName)->getClientOriginalName();
        $dosyaAdi = pathinfo($dosyAdiUzanti, PATHINFO_FILENAME);
        $uzanti = $request->file($requestName)->getClientOriginalExtension();
        $dosyaAdiEkle = $dosyaAdi.'_'.time().'.'.$uzanti;
        $path = $request->file($requestName)->storeAs('public'.$path ,$dosyaAdiEkle);
        return $dosyaAdiEkle;
    }
}
