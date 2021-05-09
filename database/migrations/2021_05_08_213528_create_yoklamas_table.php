<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYoklamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yoklamas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurumId');
            $table->unsignedBigInteger('ogrenciId');
            $table->unsignedBigInteger('yokla')->comment('1 ise yurttaymış, 0 ise yokmuş');
            $table->timestamps();

            $table->foreign('kurumId')->references('id')->on('kurum')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ogrenciId')->references('id')->on('ogrenci')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yoklamas');
    }
}
