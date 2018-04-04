<?php

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'nombre' => 'Universidad Autónoma de Manizales',
            'estado' => 'Activo',
            'user_id_creacion' => 1
        ]);
    }
}
