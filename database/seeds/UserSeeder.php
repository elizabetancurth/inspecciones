<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'lastname' => 'Super',
            'email' => 'admin@gmail.com', 
            'password' => bcrypt('123456'),
            'rol' => 'Administrador',
            'estado' => 'Activo'
        ]);

        DB::table('users')->insert([
            'name' => 'Elizabeth',
            'lastname' => 'Betancurth',
            'email' => 'elizabetancurth@gmail.com', 
            'password' => bcrypt('12345678'),
            'rol' => 'Administrador',
            'estado' => 'Activo'
        ]);

        DB::table('users')->insert([
            'name' => 'Daniel',
            'lastname' => 'Arboleda',
            'email' => 'daniel@gmail.com', 
            'password' => bcrypt('12345678'),
            'rol' => 'APH',
            'estado' => 'Activo'
        ]);
    }
}
