<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Aidat
 *
 * @property int $id
 * @property int $ogrenciId
 * @property int $kurumId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AidatFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Aidat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Aidat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Aidat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Aidat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aidat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aidat whereKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aidat whereOgrenciId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aidat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Aidat extends Model
{
    protected $table = 'aidat';
    use HasFactory;
}
