<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Personelislemkayit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personelislem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personelId');
            $table->unsignedBigInteger('kurumId');
            $table->unsignedBigInteger('logId')->nullable();
            $table->string('logName')->nullable();
            $table->timestamps();

            $table->foreign('personelId')->references('id')->on('personel')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('personelislem');
    }
}
