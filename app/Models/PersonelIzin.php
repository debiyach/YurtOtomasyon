<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PersonelIzin
 *
 * @property int $id
 * @property int $personelId
 * @property int $kurumId
 * @property string $aciklama
 * @property string $onayDurumu
 * @property string $izinBaslangic
 * @property string $izinBitis
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PersonelIzinFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin whereAciklama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin whereIzinBaslangic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin whereIzinBitis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin whereKurumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin whereOnayDurumu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin wherePersonelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonelIzin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PersonelIzin extends Model
{
    protected $table  = 'personelizin';
    use HasFactory;

}
