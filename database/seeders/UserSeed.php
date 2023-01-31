<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombres_users' => 'Jose Alberto',
            'apellidos' => 'Mendez Leite',
            'username' => 'betoml',
            'email' => 'betomendez.2011@gmail.com',
            'password' => Hash::make('12345678'),
            'planes_id' => '1',
            'vencimiento_plan' => '2023/03/30',
            'admin' => '1',
            'telefonos' => '67985250',
        ]);
        DB::table('users')->insert([
            'nombres_users' => 'Jose Alberto',
            'apellidos' => 'Mendez Leite',
            'username' => 'test',
            'email' => 'test@email.com',
            'password' => Hash::make('12345678'),
            'planes_id' => '2',
            'vencimiento_plan' => '2023/03/30',
            'admin' => '0',
            'telefonos' => '67985250',
        ]);
        DB::table('users')->insert([
            'nombres_users' => 'Jose Alberto',
            'apellidos' => 'Mendez Leite',
            'username' => 'family',
            'email' => 'familia@email.com',
            'password' => Hash::make('12345678'),
            'planes_id' => '4',
            'vencimiento_plan' => '2023/03/30',
            'admin' => '0',
            'telefonos' => '67985250',
        ]);
    }
}
