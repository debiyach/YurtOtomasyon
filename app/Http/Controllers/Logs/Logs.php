<?php


namespace App\Http\Controllers\Logs;


use App\Helpers\Writer;
use App\Models\IslemCesitleri;
use App\Models\PersonelIslemKayit;

class Logs
{

    public static function ogrenciLog($log, $name=null)
    {
        $data = [
            "kurumId" => session()->get('ogrenci')->kurumId,
            "personelId" => session()->get('ogrenci')->id,
            "logId" => (new Logs)->logId($log),
            "created_at" => now(),
            "updated_at" => now()
        ];
        if ($name) {
            $data = array_merge(["logName" => $name], $data);
        }

        PersonelIslemKayit::insert($data);
    }

    public static function personelLog($log, $name=null)
    {

        $data = [
            "kurumId" => session()->get('personel')->kurumId,
            "personelId" => session()->get('personel')->id,
            "created_at" => now(),
            "logId" => (new Logs)->logId($log),
            "updated_at" => now()
        ];
        if ($name) {
            $data = array_merge(["logName" => $name], $data);
        }

        PersonelIslemKayit::insert($data);
    }

    public function logId($log)
    {
        $log = IslemCesitleri::where('tip',$log)->get();
        return $log[0]->id;
    }

}
