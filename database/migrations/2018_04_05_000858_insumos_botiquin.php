<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsumosBotiquin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos_botiquin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->enum('tipo', ['Fármaco', 'Utencilio']);
            $table->date('fecha_vencimiento')->nullable();
            $table->integer('cantidad');
            $table->integer('botiquin_id')->unsigned()->nullable();
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->integer('user_id_creacion')->unsigned()->nullable();
            $table->integer('user_id_modificacion')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('botiquin_id')->references('id')->on('botiquines')
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
        Schema::dropIfExists('insumos_botiquin');
    }
}
