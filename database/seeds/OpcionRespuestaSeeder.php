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
            'valor' => '1',
            'tipo_pregunta_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('opciones_respuestas')->insert([
            'nombre' => 'No Cumple',
            'valor' => '2',
            'tipo_pregunta_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('opciones_respuestas')->insert([
            'nombre' => 'Bueno',
            'valor' => '3',
            'tipo_pregunta_id' => 2,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('opciones_respuestas')->insert([
            'nombre' => 'Regular',
            'valor' => '4',
            'tipo_pregunta_id' => 2,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('opciones_respuestas')->insert([
            'nombre' => 'Malo',
            'valor' => '5',
            'tipo_pregunta_id' => 2,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
