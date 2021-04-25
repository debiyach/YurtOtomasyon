<?php

namespace Database\Factories;

use App\Models\Personel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersonelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personel::class;

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
            'cinsiyet' => (rand(0, 1) == 1) ? 'Kız' : 'Erkek',
            "tcNo" => rand(10000000000, 99999999999),
            'telNo' => $this->faker->phoneNumber,
            'evAdresi' => $this->faker->address,
            'apiToken' => Str::random(60),
            'mail' => $this->faker->email,
            'sifre' => \Hash::make('123456'),
            'tip' => (rand(0, 1) == 1) ? 'Personel' : 'Müdür',
            'yetki' => json_encode([
                'binaEkle' => 1,
                'katEkle' => 1,
                'odaEkle' => 1,
                "yatakEkle" => 1,
                "yatakKaldir" => 1,
                'ogrenciYatakKaldir' => 1,
                "ogrenciYatakEkle" =>1,
                "ogrenciEkle" => 1,
                "personelEkle" => 1
            ]),
            'izin' => rand(0,1),
            'aktif' => rand(0,1),
            'foto' => $this->faker->imageUrl($width = 640, $height = 480),
            'maas' => json_encode(['maasOdendi' => (rand(0, 1) == 1) ? true : false, 'maasMiktari' => rand(3000, 7000)])
        ];
    }
}
