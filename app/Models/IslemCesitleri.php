<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\IslemCesitleri
 *
 * @property int $id
 * @property string $tip
 * @method static \Database\Factories\IslemCesitleriFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|IslemCesitleri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IslemCesitleri newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IslemCesitleri query()
 * @method static \Illuminate\Database\Eloquent\Builder|IslemCesitleri whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IslemCesitleri whereTip($value)
 * @mixin \Eloquent
 */
class IslemCesitleri extends Model
{
    protected $table  = 'islemcesitleri';
    use HasFactory;

    public static function logSeeder(){
        $logs = [
            "Giriş yapıldı.",
            "Çıkış yapıldı.",
            "Bina eklendi.",
            "Kat eklendi.",
            "Oda eklendi.",
            "Yatak eklendi.",
            "Yatak kaldırdı.",
            "Öğrenci yataktan kaldırdı.",
            "Yeni bir öğrenci ekledi.",
            "Yeni bir personel ekledi.",
            "Öğrenci yatağa eklendi.",
        ];
        foreach ($logs as $log){
            self::insert([
                'tip' => $log
            ]);
        }
    }
}
