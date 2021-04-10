<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Personel
 *
 * @property int $id
 * @property int $kurumId
 * @property string $ad
 * @property string $soyad
 * @property string $cinsiyet
 * @property string $tcNo
 * @property string $telNo
 * @property string $evAdresi
 * @property string $mail
 * @property string $sifre
 * @property string $apiToken
 * @property string $tip
 * @property string $yetki
 * @property string $maas Maaş ödemesi ve maaş miktarı tutulacak.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PersonelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereAd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereCinsiyet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereEvAdresi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereMaas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereSifre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereSoyad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereTcNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereTelNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereTip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personel whereYetki($value)
 * @mixin \Eloquent
 */
class Personel extends Model
{
    protected $table = 'personel';
    protected $fillable = ['ad','soyad','telNo','apiToken','yetki'];
    use HasFactory;
}
