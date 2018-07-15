<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PreguntasFormatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas_formatos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion');
            $table->integer('tipo_pregunta_id')->unsigned()->nullable();
            $table->integer('formato_inspeccion_id')->unsigned()->nullable();
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->integer('user_id_creacion')->unsigned()->nullable();
            $table->integer('user_id_modificacion')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('tipo_pregunta_id')->references('id')->on('tipos_preguntas')
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
        Schema::dropIfExists('preguntas_formatos');
    }
}
