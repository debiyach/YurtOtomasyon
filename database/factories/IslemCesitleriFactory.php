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
            ["Giriş yapıldı.", 3],
            ["Çıkış yapıldı.", 3],
            ["Bina eklendi.", 2],
            ["Kat eklendi.", 2],
            ["Oda eklendi.", 2],
            ["Yatak eklendi.", 2],
            ["Yatak kaldırdı.", 2],
            ["Öğrenciyi yataktan kaldırdı.", 2],
            ["Yeni bir öğrenci ekledi.", 2],
            ["Yetki değiştirildi.", 2]
        ];

        foreach ($logs as $log) {
            IslemCesitleri::insert([
                'tip' => $log[0],
                'tur' => $log[1]
            ]);
        }
    }
}
