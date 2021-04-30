<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lecturaAnt');
            $table->bigInteger('lecturaAct');
            $table->date('fechaMedicion');
            $table->bigInteger('consumo');
            $table->boolean('pagado');
            $table->bigInteger('total');
            $table->unsignedBigInteger('medidor_id')->nullable();
            $table->foreign('medidor_id')
                    ->references('id')->on('medidors')
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
        Schema::dropIfExists('medicions');
    }
}
