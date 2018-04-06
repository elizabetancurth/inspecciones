<?php

use Illuminate\Database\Seeder;

class TipoPreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_preguntas')->insert([
            'nombre' => 'Cumple/NoCumple',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('tipos_preguntas')->insert([
            'nombre' => 'Estado',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('tipos_preguntas')->insert([
            'nombre' => 'Fecha',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('tipos_preguntas')->insert([
            'nombre' => 'Abierta',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
