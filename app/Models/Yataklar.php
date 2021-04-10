<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Yataklar
 *
 * @property int $id
 * @property int $kurumId
 * @property int|null $ogrenciId
 * @property int $binaId
 * @property int $katId
 * @property int $odaId
 * @property string $yatakAdi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\YataklarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar whereBinaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar whereKatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar whereKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar whereOdaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar whereOgrenciId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yataklar whereYatakAdi($value)
 * @mixin \Eloquent
 */
class Yataklar extends Model
{
    use HasFactory;
    public function yatakToOgrenci()
    {
        return $this->belongsTo('App\Models\Ogrenci','ogrenciId','id');
    }

    public function yatakToBina()
    {
        return $this->belongsTo('App\Models\Binalar','binaId','id');
    }
}
