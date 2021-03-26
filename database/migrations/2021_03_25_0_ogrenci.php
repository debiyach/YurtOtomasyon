<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ogrenci extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogrenci', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurumId');
            $table->string('ad',60);
            $table->string('soyad',60);
            $table->integer("tcNo")->unique();
            $table->integer('telNo')->unique();
            $table->string('sehir',50);
            $table->integer('odaNo');
            $table->integer('yatakNo');
            $table->json('foto');
            $table->json('aidat');
            $table->json('depozito');
            $table->json('izin');
            $table->boolean('aktif');
            $table->json('yemekhaneBakiyesi');
            $table->timestamps();


            $table->foreign('kurumId')->references('id')->on('kurum')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ogrenci');
    }
}
