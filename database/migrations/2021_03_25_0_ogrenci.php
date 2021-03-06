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
            $table->string('mail')->unique();
            $table->string('sifre');
            $table->string('apiToken');
            $table->enum('cinsiyet',['Kız','Erkek']);
            $table->string("tcNo")->unique();
            $table->string('telNo')->unique();
            $table->string('evAdresi',50);
            $table->integer('binaNo')->nullable();
            $table->integer('odaNo')->nullable();
            $table->integer('katNo')->nullable();
            $table->integer('yatakNo')->nullable();
            $table->string('foto');
            $table->integer('aidat');
            $table->integer('taksitSayisi');
            $table->integer('kalanTaksit');
            $table->integer('depozito');
            $table->string('izin');
            $table->boolean('aktif');
            $table->unsignedInteger('yoklama')->comment('0 ise dışarda, 1 ise yurtta, 2 ise izinli');
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
