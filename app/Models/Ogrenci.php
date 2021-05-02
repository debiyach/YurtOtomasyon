<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ogrenci
 *
 * @OA\Schema (
 *     title="Ogrenci",
 *     description="Ogrenci model"
 * )
 * @property int $id
 * @property int $kurumId
 * @property string $ad
 * @property string $soyad
 * @property string $mail
 * @property string $sifre
 * @property string $apiToken
 * @property string $cinsiyet
 * @property string $tcNo
 * @property string $telNo
 * @property string $evAdresi
 * @property int $odaNo
 * @property int $katNo
 * @property int $yatakNo
 * @property string $foto
 * @property string $aidat
 * @property string $depozito
 * @property string $izin
 * @property int $aktif
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OgrenciFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereAd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereAidat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereCinsiyet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereDepozito($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereEvAdresi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereIzin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereKatNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereOdaNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereSifre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereSoyad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereTcNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereTelNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ogrenci whereYatakNo($value)
 * @mixin \Eloquent
 */
class Ogrenci extends Model
{
    protected $table = 'ogrenci';
    //protected $fillable = ['ad','soyad','telNo','foto','apiToken','mail','sifre'];
    //protected $hidden = ['tcNo','sifre','aidat','created_at','updated_at','izin','depozito','apiToken'];

//    public function getYatak()
//    {
//        return $this->hasOne('App\Models\Yataklar','ogrenciId','id');
//    }
    public function ogrenciToBlok()
    {
        return $this->hasOne('\App\Models\Binalar', 'id', 'binaNo');
    }

    public function ogrenciToKat()
    {
        return $this->hasOne('\App\Models\Katlar', 'id', 'katNo');
    }

    public function ogrenciToOda()
    {
        return $this->hasOne('\App\Models\Odalar', 'id', 'odaNo');
    }

    use HasFactory;
}
