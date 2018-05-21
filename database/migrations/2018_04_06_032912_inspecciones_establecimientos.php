<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InspeccionesEstablecimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecciones_establecimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inspeccion_id')->unsigned()->nullable();
            $table->integer('establecimiento_id')->unsigned()->nullable();
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('inspeccion_id')->references('id')->on('inspecciones')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('establecimiento_id')->references('id')->on('establecimientos')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspecciones_establecimientos');
    }
}
