<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OgrenciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Ogrenci::factory(100)->create();
    }
}
