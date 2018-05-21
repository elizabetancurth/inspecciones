<?php

use Illuminate\Database\Seeder;

class ExtintorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('extintores')->insert([
            'codigo' => '1',
            'clasificacion_extintor_id' => 1,
            'capacidad' => 20,
            'altura' => 'Piso',
            'ubicacion_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('extintores')->insert([
            'codigo' => '2',
            'clasificacion_extintor_id' => 1,
            'capacidad' => 10,
            'altura' => 'Piso',
            'ubicacion_id' => 2,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('extintores')->insert([
            'codigo' => '3',
            'clasificacion_extintor_id' => 1,
            'capacidad' => 10,
            'altura' => '140',
            'ubicacion_id' => 3,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('recargas_extintores')->insert([
            'fecha_recarga' => '2017-06-29',
            'fecha_vencimiento' => '2018-07-30',
            'extintor_id' => 1,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('recargas_extintores')->insert([
            'fecha_recarga' => '2017-06-29',
            'fecha_vencimiento' => '2018-07-30',
            'extintor_id' => 2,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('recargas_extintores')->insert([
            'fecha_recarga' => '2017-06-29',
            'fecha_vencimiento' => '2018-07-30',
            'extintor_id' => 3,
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
