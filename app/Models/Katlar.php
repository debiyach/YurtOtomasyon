<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Katlar
 *
 * @property int $id
 * @property int $kurumId
 * @property int $binaId
 * @property string $katAdi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\KatlarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Katlar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Katlar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Katlar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Katlar whereBinaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Katlar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Katlar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Katlar whereKatAdi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Katlar whereKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Katlar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Katlar extends Model
{
    protected $fillable = ['kurumId','binaId','katAdi'];
    use HasFactory;
}
