<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinalarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binalars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurumId');
            $table->string('binaAdi');
            $table->timestamps();

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
        Schema::dropIfExists('binalars');
    }
}
