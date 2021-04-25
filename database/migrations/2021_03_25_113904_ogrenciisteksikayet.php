<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ogrenciisteksikayet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogrenciisteksikayet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurumId');
            $table->unsignedBigInteger('ogrenciId');
            $table->string('aciklama');
            $table->enum('tip',['İzin','Şikayet','İstek','Arıza Bildirimi']);
            $table->enum('onayDurumu',["Bekleniyor","Reddedildi","Kabul Edildi"])->default("Bekleniyor");
            $table->date('izinBaslangic')->nullable();
            $table->date('izinBitis')->nullable();
            $table->timestamps();

            $table->foreign('kurumId')->references('id')->on('kurum')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('ogrenciId')->references('id')->on('ogrenci')->cascadeOnDelete()->cascadeOnUpdate();
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
