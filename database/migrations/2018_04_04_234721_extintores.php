<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Extintores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extintores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->integer('clasificacion_extintor_id')->unsigned()->nullable();
            $table->integer('capacidad');
            $table->string('altura');
            $table->integer('ubicacion_id')->unsigned()->nullable();
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->integer('user_id_creacion')->unsigned()->nullable();
            $table->integer('user_id_modificacion')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('clasificacion_extintor_id')->references('id')->on('clasificaciones_extintores')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones')
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
        Schema::dropIfExists('extintores');
    }
}
