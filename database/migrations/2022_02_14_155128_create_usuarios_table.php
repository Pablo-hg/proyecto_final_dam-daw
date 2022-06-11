<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->tinyIncrements('id')->autoIncrement();
            $table->string('usuario', 32)->nullable(false);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('imagen', 64)->nullable();
            $table->dateTime('fecha_registro')->nullable();
            $table->text('biografia')->nullable();
            $table->tinyInteger('activo')->nullable(false)->default(0);
            $table->tinyInteger('admin')->nullable(false)->default(0);
            $table->string('titulo_post', 32)->nullable(false)->default("");
            $table->text('texto_post')->nullable();
            $table->string('imagen_post', 64)->nullable();
            $table->tinyInteger('estado_post')->nullable(false)->default(0);
            $table->string('slug', 36)->nullable();
            $table->dateTime('fecha_post')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
