<?php

use Illuminate\Database\Seeder;

class OpcionRespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opciones_respuestas')->insert([
            'nombre' => 'Cumple',
            'tipo_pregunta_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('opciones_respuestas')->insert([
            'nombre' => 'No Cumple',
            'tipo_pregunta_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('opciones_respuestas')->insert([
            'nombre' => 'Bueno',
            'tipo_pregunta_id' => 2,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('opciones_respuestas')->insert([
            'nombre' => 'Regular',
            'tipo_pregunta_id' => 2,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('opciones_respuestas')->insert([
            'nombre' => 'Malo',
            'tipo_pregunta_id' => 2,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
