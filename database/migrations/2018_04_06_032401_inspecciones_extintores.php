<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InspeccionesExtintores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecciones_extintores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inspeccion_id')->unsigned()->nullable();
            $table->integer('extintor_id')->unsigned()->nullable();
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->integer('user_id_creacion')->unsigned()->nullable();
            $table->integer('user_id_modificacion')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('inspeccion_id')->references('id')->on('inspecciones')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('extintor_id')->references('id')->on('extintores')
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
        Schema::dropIfExists('inspecciones_extintores');
    }
}
