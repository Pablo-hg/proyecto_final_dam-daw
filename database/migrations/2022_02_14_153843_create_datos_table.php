<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            //Columnas
            $table->tinyIncrements('id_partida')->autoIncrement();
            $table->string('usuario', 32)->nullable(false);
            $table->integer('frutas')->nullable(false)->default(0);
            $table->integer('enemigos')->nullable(false)->default(0);
            $table->integer('ult_distancia')->nullable(false)->default(0);
            $table->dateTime('fecha_record')->nullable();
            $table->integer('record')->nullable(false)->default(0);
            $table->tinyInteger('numero_partidas',)->nullable(false)->default(0);
            $table->tinyInteger('activo',)->default(1);
            $table->tinyInteger('visible',)->default(1);

            //Columnas created_at y updated_at
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
        Schema::dropIfExists('datos');
    }
}
