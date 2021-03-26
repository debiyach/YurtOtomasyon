<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ogrencitransfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogrencitransfer', function (Blueprint $table) {
            $table->id();
            $table->integer('ogrenciId');
            $table->integer('bulunduguKurumId');
            $table->integer('gidecegiKurumId');
            $table->time('istekTarihi');
            $table->time('islemTarihi');
            $table->boolean('onayDurumu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ogrencitransfer');
    }
}
