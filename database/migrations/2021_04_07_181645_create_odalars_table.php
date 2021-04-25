<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdalarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odalars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurumId');
            $table->unsignedBigInteger('binaId');
            $table->unsignedBigInteger('katId');
            $table->unsignedBigInteger('odaNo');
            $table->string('odaAdi');
            $table->timestamps();

            $table->foreign('kurumId')->references('id')->on('kurum')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('binaId')->references('id')->on('binalars')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('katId')->references('id')->on('katlars')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odalars');
    }
}
