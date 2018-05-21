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
        $this->call(InspeccionClasificacionSeeder::class);
        $this->call(TipoPreguntaSeeder::class);
        $this->call(OpcionRespuestaSeeder::class);
        $this->call(UbicacionSeeder::class);
        $this->call(ExtintorSeeder::class);
        $this->call(FormatoSeeder::class);
        $this->call(PreguntaSeeder::class);
    }
}
