<?php

use Illuminate\Database\Seeder;

class InspeccionClasificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspecciones_clasificaciones')->insert([
            'nombre' => 'Extintores',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('inspecciones_clasificaciones')->insert([
            'nombre' => 'Botiquines',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('inspecciones_clasificaciones')->insert([
            'nombre' => 'BPM',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
