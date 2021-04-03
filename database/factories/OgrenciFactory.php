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
        return [
            'kurumId' => rand(1, 100),
            'ad' => $this->faker->firstName,
            'soyad' => $this->faker->lastName,
            "tcNo" => rand(10000000000,99999999999),
            'telNo' => $this->faker->phoneNumber,
            'evAdresi' => $this->faker->address,
            'mail'=>$this->faker->email,
            'sifre' => \Hash::make('123456'),
            'apiToken' => Str::random(60),
            'odaNo' => rand(1, 10),
            'yatakNo' => rand(1, 35),
            'katNo' => rand(3,7),
            'cinsiyet' => (rand(0, 1) == 1) ? 'Kız' : 'Erkek',
            'foto' => $this->faker->imageUrl($width = 640, $height = 480),
            'aidat' => json_encode(['yurtUcreti' => rand(250, 650), 'odemeDurumu' => (rand(0, 1) == 1) ? true : false]),
            'depozito' => json_encode(['depozitoUcreti' => rand(550, 950), 'odemeDurumu' => (rand(0, 1) == 1) ? true : false]),
            'izin' => (rand(0, 1) == 1) ? true : false,
            'aktif' => (rand(0, 1) == 1) ? true : false
        ];
    }
}
