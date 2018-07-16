<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriaToPreguntasFormatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preguntas_formatos', function (Blueprint $table) {
            $table->integer('categoria_pregunta_formato_id')->after('id')->unsigned()->nullable();

            $table->foreign('categoria_pregunta_formato_id')->references('id')->on('categorias_preguntas_formatos')
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
        Schema::table('preguntas_formatos', function (Blueprint $table) {
            $table->dropColumn('categoria_pregunta_formato_id');
        });
    }
}
