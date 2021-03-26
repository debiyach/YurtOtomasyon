<?php

namespace Database\Factories;

use App\Models\KurumModels;
use Illuminate\Database\Eloquent\Factories\Factory;

class KurumModelsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KurumModels::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "kurumAdi" => $this->faker->name . ' Yurdu',
            "mail" => $this->faker->email,
            'telNo' => $this->faker->phoneNumber,
            "faxNo" => $this->faker->phoneNumber,
            'adres' => $this->faker->address,
            'binaSayisi' => rand(1, 5),
            'odaSayisi' => rand(1, 25),
            'odaYatakSayisi' => rand(3, 13),
            'katSayisi' => rand(1,10),
            'aktiflik' => (rand(0, 1) == 1) ? true : false,
            'sehir' => $this->faker->city,
            'yemekhaneFirma' => $this->faker->name . ' Yemekcilik',
            'yöneticiAdi' => $this->faker->name,
            'fotograflar' => json_encode([$this->faker->imageUrl($width = 640, $height = 480), $this->faker->imageUrl($width = 640, $height = 480), $this->faker->imageUrl($width = 640, $height = 480), $this->faker->imageUrl($width = 640, $height = 480)])
        ];
    }
}
