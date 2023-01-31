<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('planes')->insert([
            'nombres_planes' => 'Básico',
            'periodos' => '90',
            'precios' => '30',
            'dispositivos' => '2',
            'descripciones' => 'Esto es una descripcion del plan Basico'
        ]);
        DB::table('planes')->insert([
            'nombres_planes' => 'Intermedio',
            'periodos' => '90',
            'precios' => '40',
            'dispositivos' => '3',
            'descripciones' => 'Esto es una descripcion del plan Intermedio'
        ]);
        DB::table('planes')->insert([
            'nombres_planes' => 'Avanzado',
            'periodos' => '90',
            'precios' => '45',
            'dispositivos' => '4',
            'descripciones' => 'Esto es una descripcion del plan Avanzado'
        ]);
        DB::table('planes')->insert([
            'nombres_planes' => 'Familiar',
            'periodos' => '90',
            'precios' => '55',
            'dispositivos' => '6',
            'descripciones' => 'Esto es una descripcion del plan Familiar'
        ]);


    }
}
