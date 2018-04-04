<?php

use Illuminate\Database\Seeder;

class UbicacionesSeeder extends Seeder
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
            'referencia' => 'Frente a la oficina del rector',
            'estado' => 'Activo',
            'edificio_id' => 1,
            'user_id_creacion' => 1
        ]);

        DB::table('ubicaciones')->insert([
            'piso' => 4,
            'referencia' => 'Al lado de las sombrillas',
            'estado' => 'Activo',
            'edificio_id' => 2,
            'user_id_creacion' => 1
        ]);

        DB::table('ubicaciones')->insert([
            'piso' => 5,
            'referencia' => 'Al costado del salón 503',
            'estado' => 'Activo',
            'edificio_id' => 3,
            'user_id_creacion' => 1
        ]);
    }
}
