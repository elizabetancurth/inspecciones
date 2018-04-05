<?php

use Illuminate\Database\Seeder;

class TipoBotiquinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_botiquines')->insert([
            'nombre' => 'Básico',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);

        DB::table('tipos_botiquines')->insert([
            'nombre' => 'Avanzado',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
