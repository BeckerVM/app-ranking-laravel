<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationUsers extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('email', 100);
            $table->char('username', 100);
            $table->char('password', 100);
            $table->enum('rol', ['normal', 'admin', 'comerciante']);
            $table->enum('state', ['pendiente', 'activo', 'bloqueado']);
            $table->char('img_profile', 255);
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
        Schema::dropIfExists('users');
    }
}
