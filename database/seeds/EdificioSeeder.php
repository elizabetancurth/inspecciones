<?php

use Illuminate\Database\Seeder;

class EdificioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edificios')->insert([
            'nombre' => 'Torre del Saber',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Edificio Central',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Bloque 2',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);
    }
}
