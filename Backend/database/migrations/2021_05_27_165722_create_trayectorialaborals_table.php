<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrayectorialaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trayectorialaborals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa');
            $table->string('puestoTrabajo');
            $table->string('responsabilidades');
            $table->string('fechaInicio');
            $table->string('fechaSalida');
            $table->string('contacto');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('trayectorialaborals');
    }
}
