<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kurum::factory(100)->create();
        \App\Models\Ogrenci::factory(100)->create();
        \App\Models\Personel::factory(100)->create();
        \App\Models\IslemCesitleri::logSeeder();
    }
}
