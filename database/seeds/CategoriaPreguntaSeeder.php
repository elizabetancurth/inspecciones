<?php

use Illuminate\Database\Seeder;

class CategoriaPreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Extintores',
            'orden' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Botiquines',
            'orden' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Ubicaciones e instalaciones',
            'orden' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Iluminación',
            'orden' => 2,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Servicios',
            'orden' => 3,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Equipos y Utencilios',
            'orden' => 4,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Recepción y almacenamiento de los alimentos',
            'orden' => 5,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Cocina y Comedor',
            'orden' => 6,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Preparación de los alimentos',
            'orden' => 7,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Servicio de comidas',
            'orden' => 8,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Bebidas alcohólicas y no alcohólicas',
            'orden' => 9,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Salud, higiene y capacitación del personal',
            'orden' => 10,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('categorias_preguntas_formatos')->insert([
            'nombre' => 'Medidas de sanamiento',
            'orden' => 11,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
