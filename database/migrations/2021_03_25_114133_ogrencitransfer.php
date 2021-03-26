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
            $table->unsignedBigInteger('ogrenciId');
            $table->unsignedBigInteger('bulunduguKurumId');
            $table->unsignedBigInteger('gidecegiKurumId');
            $table->time('istekTarihi');
            $table->time('islemTarihi');
            $table->boolean('onayDurumu');
            $table->timestamps();

            $table->foreign('ogrenciId')->references('id')->on('ogrenci')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bulunduguKurumId')->references('id')->on('kurum')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('gidecegiKurumId')->references('id')->on('kurum')->cascadeOnUpdate()->cascadeOnDelete();
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
