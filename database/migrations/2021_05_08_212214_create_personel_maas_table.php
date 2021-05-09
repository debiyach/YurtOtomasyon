<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonelMaasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personel_maas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurumId');
            $table->unsignedBigInteger('personelId');
            $table->unsignedBigInteger('durum')->comment('1 ise yatırılmış, 0 ise yatırılmamış.');
            $table->unsignedBigInteger('yatirilan')->default(0);
            $table->unsignedBigInteger('mevcutAy')->comment('1 ise bu ay aidatıdır. 0 ise geçmiş dönem aidatlarıdır.');
            $table->timestamps();

            $table->foreign('kurumId')->references('id')->on('kurum')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('personel_maas');
    }
}
