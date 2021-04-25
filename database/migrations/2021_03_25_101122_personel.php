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
            $table->unsignedBigInteger('kurumId');
            $table->string("ad", 60);
            $table->string('soyad', 60);
            $table->enum('cinsiyet',['Kız','Erkek']);
            $table->string("tcNo")->unique();
            $table->string('telNo')->unique();
            $table->string('evAdresi',50);
            $table->string('mail')->unique();
            $table->string('sifre');
            $table->string('apiToken');
            $table->enum('tip', ['Personel', 'Müdür']);
            $table->json('yetki')->nullable();
            $table->json('maas')->comment('Maaş ödemesi ve maaş miktarı tutulacak.');
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
        Schema::dropIfExists('personel');
    }
}
