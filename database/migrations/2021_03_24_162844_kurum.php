<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kurum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurum', function (Blueprint $table) {
            $table->id();
            $table->string("kurumAdi");
            $table->string("mail");
            $table->string('telNo');
            $table->string("faxNo");
            $table->string('adres');
            $table->enum('yurtCinsiyet',['Kız','Erkek']);
            $table->integer('binaSayisi');
            $table->integer('katSayisi');
            $table->integer('odaSayisi')->comment('Bir kattaki oda sayısı');
            $table->integer('odaYatakSayisi');
            $table->boolean('aktiflik');
            $table->string('sehir',50);
            $table->string('yemekhaneFirma');
            $table->string('yöneticiAdi');
            $table->json('fotograflar');
            $table->json('yemekhaneBakiyesi');
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
        Schema::dropIfExists('kurum');
    }
}
