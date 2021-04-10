<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Binalar
 *
 * @property int $id
 * @property int $kurumId
 * @property string $binaAdi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BinalarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Binalar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Binalar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Binalar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Binalar whereBinaAdi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Binalar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Binalar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Binalar whereKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Binalar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Binalar extends Model
{
    use HasFactory;
}
