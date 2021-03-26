<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ogrencilog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogrenciLog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ogrenciId');
            $table->unsignedBigInteger('kurumId');
            $table->unsignedBigInteger('logId');
            $table->timestamps();

            $table->foreign('ogrenciId')->references('id')->on('ogrenci')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('kurumId')->references('id')->on('kurum')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('logId')->references('id')->on('islemcesitleri')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ogrenciLog');
    }
}
