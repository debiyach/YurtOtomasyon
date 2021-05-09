<?php

namespace App\Console\Commands;


use App\Models\Kurum;
use App\Models\Personel;
use App\Models\PersonelMaas;
use Illuminate\Console\Command;

class SetMaas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maas:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aylık maaşları oluşturur.';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        PersonelMaas::updated(['mevcutAy' => 0, 'updated_at' => now()]);
        $kurumlar = Kurum::all();
        foreach ($kurumlar as $kurum) {
            $personeller = Personel::where('kurumId', $kurum->id)->get();
            foreach ($personeller as $personel) {
                PersonelMaas::insert([
                    'personelId' => $personel->id,
                    'kurumId' => $kurum->id,
                    'yatirilan' => $personel->maas,
                    'durum' => 1,
                    'mevcutAy' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        Command::info('Başarıyla maaşlar set edildi.');
    }
}
