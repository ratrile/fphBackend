<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medidor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidors', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->boolean('estado');
            $table->date('fecha');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id')
                    ->references('id')->on('usuarios')
                    ->onDelete('set null');
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
         Schema::dropIfExists('medidors');
    }
}
