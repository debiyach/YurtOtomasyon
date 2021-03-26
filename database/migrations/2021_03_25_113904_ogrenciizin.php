<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ogrenciizin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogrenciizin', function (Blueprint $table) {
            $table->id();
            $table->integer('kurumId');
            $table->integer('kullaniciId');
            $table->string('aciklama');
            $table->enum('onayDurumu',[null,false,true])->default(null);
            $table->time('izinBaslangic');
            $table->time('izinBitis');
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
        Schema::dropIfExists('ogrenciizin');
    }
}
