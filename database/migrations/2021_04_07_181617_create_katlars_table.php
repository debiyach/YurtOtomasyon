<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatlarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katlars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurumId');
            $table->unsignedBigInteger('binaId');
            $table->string('katAdi');
            $table->timestamps();

            $table->foreign('kurumId')->references('id')->on('kurum')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('binaId')->references('id')->on('binalars')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katlars');
    }
}
