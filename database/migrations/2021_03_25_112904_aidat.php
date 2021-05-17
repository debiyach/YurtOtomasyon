<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Aidat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aidat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ogrenciId');
            $table->unsignedBigInteger('kurumId');
            $table->unsignedBigInteger('yatirilacak')->comment('kurumlar tablosundaki aidat miktar');
            $table->unsignedBigInteger('durum')->comment('1 ise yatırılmış, 0 ise yatırılmamış.');
            $table->unsignedBigInteger('yatirilan')->default(0);
            $table->unsignedBigInteger('mevcutAy')->comment('1 ise bu ay aidatıdır. 0 ise geçmiş dönem aidatlarıdır.');
            $table->date('sonOdemeTarihi');
            $table->timestamps();

            $table->foreign('ogrenciId')->references('id')->on('ogrenci')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('kurumId')->references('id')->on('kurum')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aidat');
    }
}
