<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoInspeccionToInspeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspecciones', function (Blueprint $table) {
            $table->enum('estado_inspeccion', ['Pendiente', 'Realizada', 'Cancelada']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspecciones', function (Blueprint $table) {
            $table->dropColumn('estado_inspeccion');
        });
    }
}
