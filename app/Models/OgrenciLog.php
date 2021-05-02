<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OgrenciLog
 *
 * @property int $id
 * @property int $ogrenciId
 * @property int $kurumId
 * @property int $logId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OgrenciLogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciLog whereKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciLog whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciLog whereOgrenciId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OgrenciLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OgrenciLog extends Model
{
    protected $table = 'ogrenciLog';

    public function ogrenciToLog()
    {
        return $this->hasOne(IslemCesitleri::class, 'id', 'logId');
    }
    use HasFactory;
}
