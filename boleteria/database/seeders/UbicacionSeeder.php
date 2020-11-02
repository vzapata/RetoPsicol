<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeeder extends Seeder
{
    private $table = 'ubicaciones';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table($this->table)->insert(
            [
                'nombre'   => 'Oficina Psicol',
                'filas'    => 4,
                'columnas' => 5
            ]
        );

        DB::table($this->table)->insert(
            [
                'nombre'   => 'Estadio Atanasio Girardot',
                'filas'    => 100,
                'columnas' => 200
            ]
        );
    }
}
