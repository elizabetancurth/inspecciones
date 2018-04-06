<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inspecciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('inspeccion_clasificacion_id')->unsigned()->nullable();
            $table->integer('formato_inspeccion_id')->unsigned()->nullable();
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->integer('user_id_creacion')->unsigned()->nullable();
            $table->integer('user_id_modificacion')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('inspeccion_clasificacion_id')->references('id')->on('inspecciones_clasificaciones')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('formato_inspeccion_id')->references('id')->on('formatos_inspecciones')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('user_id_creacion')->references('id')->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('user_id_modificacion')->references('id')->on('users')
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
        Schema::dropIfExists('inspecciones');
    }
}
