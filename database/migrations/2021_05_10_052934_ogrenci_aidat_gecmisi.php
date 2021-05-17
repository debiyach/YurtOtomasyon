<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OgrenciAidatGecmisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogrenciAidatGecmisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ogrenciId');
            $table->unsignedBigInteger('kurumId');
            $table->unsignedBigInteger('faturaNo');
            $table->string('aciklama');
            $table->unsignedBigInteger('yatirilan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ogrenciAidatGecmisi');
    }
}
