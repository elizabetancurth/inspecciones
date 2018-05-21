<?php

use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preguntas_formatos')->insert([
            'descripcion' => 'Estado del cilindro',
            'tipo_pregunta_id' => 2,
            'formato_inspeccion_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('preguntas_formatos')->insert([
            'descripcion' => 'Estado de la boquilla',
            'tipo_pregunta_id' => 2,
            'formato_inspeccion_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('preguntas_formatos')->insert([
            'descripcion' => 'Estado de la manguera',
            'tipo_pregunta_id' => 2,
            'formato_inspeccion_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('preguntas_formatos')->insert([
            'descripcion' => 'Estado del manómetro',
            'tipo_pregunta_id' => 2,
            'formato_inspeccion_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('preguntas_formatos')->insert([
            'descripcion' => 'Estado del PIN',
            'tipo_pregunta_id' => 2,
            'formato_inspeccion_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('preguntas_formatos')->insert([
            'descripcion' => 'Señalización',
            'tipo_pregunta_id' => 2,
            'formato_inspeccion_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('preguntas_formatos')->insert([
            'descripcion' => 'Fecha de recarga',
            'tipo_pregunta_id' => 3,
            'formato_inspeccion_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('preguntas_formatos')->insert([
            'descripcion' => 'Observaciones',
            'tipo_pregunta_id' => 4,
            'formato_inspeccion_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
