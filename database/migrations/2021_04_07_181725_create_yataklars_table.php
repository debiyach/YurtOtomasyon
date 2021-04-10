<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYataklarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yataklars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurumId');
            $table->unsignedBigInteger('ogrenciId')->nullable();
            $table->unsignedBigInteger('binaId');
            $table->unsignedBigInteger('katId');
            $table->unsignedBigInteger('odaId');
            $table->string('yatakAdi',50);
            $table->timestamps();

            $table->foreign('kurumId')->references('id')->on('kurum')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('ogrenciId')->references('id')->on('ogrenci')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('binaId')->references('id')->on('binalars')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('katId')->references('id')->on('katlars')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('odaId')->references('id')->on('odalars')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yataklars');
    }
}
