<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KurumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kurum::factory(100)->create();
    }
}
