<?php

namespace Database\Factories;

use App\Models\IslemCesitleri;
use Illuminate\Database\Eloquent\Factories\Factory;

class IslemCesitleriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IslemCesitleri::class;


    public function definition()
    {
        $logs = [
            "Giriş yapıldı.",
            "Çıkış yapıldı.",
            "Bina eklendi.",
            "Kat eklendi.",
            "Oda eklendi.",
            "Yatak eklendi.",
            "Yatak kaldırdı.",
            "Öğrenciyi yataktan kaldırdı.",
            "Yeni bir öğrenci ekledi.",
        ];
        foreach ($logs as $log){
            IslemCesitleri::insert([
               'tip' => $log
            ]);
        }
    }
}
