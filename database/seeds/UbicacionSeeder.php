<?php

use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicaciones')->insert([
            'piso' => 1,
            'referencia' => 'Salón de Música',
            'estado' => 'Activo',
            'edificio_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('ubicaciones')->insert([
            'piso' => 1,
            'referencia' => 'Mercadeo (Antiguo)',
            'estado' => 'Activo',
            'edificio_id' => 2,
            'user_id_creacion' => 1
        ]);

        DB::table('ubicaciones')->insert([
            'piso' => 1,
            'referencia' => 'Almacen',
            'estado' => 'Activo',
            'edificio_id' => 2,
            'user_id_creacion' => 1
        ]);
    }
}
