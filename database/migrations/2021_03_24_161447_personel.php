<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Personel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personel', function (Blueprint $table) {
            $table->id();
            $table->integer('kurumId');
            $table->string("ad",60);
            $table->string('soyad',60);
            $table->integer('telNo')->unique();
            $table->string('mail')->unique();
            $table->string('sifre',20);
            $table->enum('tip',['Personel','Müdür']);
            $table->json('yetki');
            $table->integer('maas');
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
        Schema::dropIfExists('personel');
    }
}
