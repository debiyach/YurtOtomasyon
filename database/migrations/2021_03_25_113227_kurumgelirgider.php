<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kurumgelirgider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurumgelirgider', function (Blueprint $table) {
            $table->id();
            $table->integer('kurumId');
            $table->string('aciklama');
            $table->enum('tip',["Gelir","Gider"]);
            $table->integer('tutar');
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
        Schema::dropIfExists('kurumgelirgider');
    }
}
