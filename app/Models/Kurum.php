<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Kurum
 *
 * @property int $id
 * @property string $kurumAdi
 * @property string $mail
 * @property string $telNo
 * @property string $faxNo
 * @property string $adres
 * @property string $yurtCinsiyet
 * @property int $binaSayisi
 * @property int $katSayisi
 * @property int $odaSayisi Bir kattaki oda sayısı
 * @property int $odaYatakSayisi
 * @property int $aidatMiktar
 * @property int $depozitoMiktar
 * @property int $aktiflik
 * @property string $sehir
 * @property string $yemekhaneFirma
 * @property string $yöneticiAdi
 * @property string $fotograflar
 * @property string $yemekhaneBakiyesi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\KurumFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereAdres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereAidatMiktar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereAktiflik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereBinaSayisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereDepozitoMiktar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereFaxNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereFotograflar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereKatSayisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereKurumAdi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereOdaSayisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereOdaYatakSayisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereSehir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereTelNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereYemekhaneBakiyesi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereYemekhaneFirma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereYurtCinsiyet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kurum whereYöneticiAdi($value)
 * @mixin \Eloquent
 */
class Kurum extends Model
{
    protected $table = 'kurum';


    public function getStudents()
    {
        return $this->hasMany('\App\Models\Ogrenci','kurumId','id');
    }
    public function getPersonel()
    {
        return $this->hasMany('\App\Models\Personel','kurumId','id');
    }
    use HasFactory;

}
