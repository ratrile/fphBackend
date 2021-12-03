<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuboCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cubo_costos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidadMinimaCubo');
            $table->integer('costoMinimoConsumo');
            $table->float('costoCuboAdicional');
            $table->boolean('activo');
            $table->string('detalle');
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
        Schema::dropIfExists('cubo_costos');
    }
}
