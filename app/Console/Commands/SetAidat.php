<?php

namespace App\Console\Commands;

use App\Models\Aidat;
use App\Models\Kurum;
use App\Models\Ogrenci;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SetAidat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aidat:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aidatları oluşturur.';

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
        DB::table('aidat')->update(['mevcutAy' => 0, 'updated_at' => now()]);
        $kurumlar = Kurum::all();
        foreach ($kurumlar as $kurum) {
            $ogrenciler = Ogrenci::where('kurumId', $kurum->id)->get();
            foreach ($ogrenciler as $ogrenci) {
                if ($ogrenci->kalanTaksit > 0)
                    Aidat::insert([
                        'ogrenciId' => $ogrenci->id,
                        'kurumId' => $kurum->id,
                        'yatirilacak' => ($ogrenci->aidat / $ogrenci->kalanTaksit),
                        'durum' => 0,
                        'mevcutAy' => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                $ogrenci->kalanTaksit = $ogrenci->kalanTaksit - 1;
                $ogrenci->save();
            }
        }
        Command::info('Başarıyla adiatlar set edildi.');
    }
}
