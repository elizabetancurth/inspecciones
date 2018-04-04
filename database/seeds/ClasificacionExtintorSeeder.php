<?php

use Illuminate\Database\Seeder;

class ClasificacionExtintorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasificaciones_extintores')->insert([
            'nombre' => 'ABC Multiproposito',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('clasificaciones_extintores')->insert([
            'nombre' => 'CO2',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('clasificaciones_extintores')->insert([
            'nombre' => 'Agua a presión',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('clasificaciones_extintores')->insert([
            'nombre' => 'Solkaflam',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
