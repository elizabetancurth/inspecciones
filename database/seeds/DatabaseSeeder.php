<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(EdificioSeeder::class);
        $this->call(UbicacionesSeeder::class);
        $this->call(ClasificacionExtintorSeeder::class);
        $this->call(TipoBotiquinSeeder::class);
    }
}
