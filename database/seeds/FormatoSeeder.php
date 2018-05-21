<?php

use Illuminate\Database\Seeder;

class FormatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formatos_inspecciones')->insert([
            'nombre' => 'Inspección mensual de extintores',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
