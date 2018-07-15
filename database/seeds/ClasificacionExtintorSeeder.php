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
            'descripcion' => 'Para fuegos Tipo A: solidos, maderas, telas, papel. Tipo B: liquidos inflamables y combustibles, grasas, pinturas. Tipo C: equipos electrónicos.',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('clasificaciones_extintores')->insert([
            'nombre' => 'CO2',
            'descripcion' => 'Para fuegos Tipo C: equipos electrónicos.',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('clasificaciones_extintores')->insert([
            'nombre' => 'Agua a presión',
            'descripcion' => 'Para fuegos Tipo A: solidos, maderas, telas, papel.',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('clasificaciones_extintores')->insert([
            'nombre' => 'Solkaflam',
            'descripcion' => 'Para apagar incendios de cualquier tipo de equipo eléctrico (especialmente computadoras)',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
