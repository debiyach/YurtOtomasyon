<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Odalar
 *
 * @property int $id
 * @property int $kurumId
 * @property int $binaId
 * @property int $katId
 * @property string $odaAdi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OdalarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Odalar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Odalar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Odalar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Odalar whereBinaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Odalar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Odalar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Odalar whereKatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Odalar whereKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Odalar whereOdaAdi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Odalar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Odalar extends Model
{
    use HasFactory;

    public function toKat()
    {
        $this->hasOne('\App\Models\Katlar','kurumId','id');
    }

    public function odaToBina()
    {
        return $this->hasOne('\App\Models\Binalar','binaId','id');
    }
}
