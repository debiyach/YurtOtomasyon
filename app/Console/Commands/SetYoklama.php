<?php

namespace App\Console\Commands;

use App\Models\Kurum;
use App\Models\Ogrenci;
use App\Models\Yoklama;
use Illuminate\Console\Command;

class SetYoklama extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yoklama:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Her gün saat 23:00 da yoklama alır';

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
        $kurumlar = Kurum::all();
        foreach ($kurumlar as $kurum) {
            $ogrenciler = Ogrenci::where('kurumId', $kurum->id)->get();
            foreach ($ogrenciler as $ogrenci) {
                Yoklama::insert([
                    'ogrenciId' => $ogrenci->id,
                    'kurumId' => $kurum->id,
                    'yokla' => $ogrenci->yoklama,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        Command::info('Yoklama başarıyla alındı.');
    }
}
