<?php

namespace Database\Factories;

use App\Models\Ogrenci;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OgrenciFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ogrenci::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $taksit= rand(1,12);
        return [
            'kurumId' => rand(1, 100),
            'ad' => $this->faker->firstName,
            'soyad' => $this->faker->lastName,
            "tcNo" => rand(10000000000, 99999999999),
            'telNo' => $this->faker->phoneNumber,
            'evAdresi' => $this->faker->address,
            'mail' => $this->faker->email,
            'sifre' => \Hash::make('123456'),
            'apiToken' => Str::random(60),
            'cinsiyet' => (rand(0, 1) == 1) ? 'Kız' : 'Erkek',
            'foto' => $this->faker->imageUrl($width = 640, $height = 480),
            'aidat' => rand(2000,8000),
            "taksitSayisi" => $taksit,
            "kalanTaksit" => $taksit,
            "depozito" => rand(500,1500),
            'izin' => (rand(0, 1) == 1) ? true : false,
            'aktif' => (rand(0, 1) == 1) ? true : false,
            'yoklama' => rand(0, 1)
        ];
    }
}
