<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Islemcesitleri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('islemcesitleri', function (Blueprint $table) {
            $table->id();
            $table->string("tip");
            $table->unsignedInteger('tur')->default(1)->comment('1 = Sadece Öğrenciler, 2 => Sadece Personeller, 3 => Herkese açık');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('islemcesitleri');
    }
}
