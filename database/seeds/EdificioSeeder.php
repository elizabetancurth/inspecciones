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

        DB::table('edificios')->insert([
            'nombre' => 'IPS',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Bloque 3',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Vagones',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Parqueadero',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Economia',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Biblioteca',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Vagones',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Bloque 12',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Bloque 13',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Bloque F - Edificio Fundadores',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Bloque 16',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Babaria',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('edificios')->insert([
            'nombre' => 'Gastronomía',
            'estado' => 'Activo',
            'empresa_id' => 1,
            'user_id_creacion' => 1
        ]);
    }
}
