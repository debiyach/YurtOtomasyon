<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OgrenciTransfer
 *
 * @property int $id
 * @property int $ogrenciId
 * @property int $bulunduguKurumId
 * @property int $gidecegiKurumId
 * @property string $istekTarihi
 * @property string $islemTarihi
 * @property int $onayDurumu
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OgrenciTransferFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer query()
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer whereBulunduguKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer whereGidecegiKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer whereIslemTarihi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer whereIstekTarihi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer whereOgrenciId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer whereOnayDurumu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciTransfer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OgrenciTransfer extends Model
{
    protected $table = 'ogrencitransfer';
    use HasFactory;
}
