<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Personelizin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personelizin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personelId');
            $table->unsignedBigInteger('kurumId');
            $table->string('aciklama');
            $table->enum('onayDurumu',["Beklemede","İşlemde","Reddedildi","Kabul Edildi"])->default("Beklemede");
            $table->date('izinBaslangic');
            $table->date('izinBitis');
            $table->timestamps();

            $table->foreign('kurumId')->references('id')->on('kurum')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('personelId')->references('id')->on('personel')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personelizin');
    }
}
