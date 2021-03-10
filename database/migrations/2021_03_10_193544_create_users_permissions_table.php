<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_permissions', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->enum('is_room',[0,1]);
            $table->enum('is_restaurant',[0,1]);
            $table->enum('is_holiday',[0,1]);
            $table->enum('is_criminal',[0,1]);
            $table->enum('is_laundry',[0,1]);
            $table->enum('is_rental',[0,1]);
            $table->enum('is_student',[0,1]);
            $table->enum('is_admin',[0,1]);
            $table->enum('is_super_admin',[0,1]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_permissions');
    }
}
