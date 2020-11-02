<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\models\Ubicacion;

class EventoSeeder extends Seeder
{
    private $table = 'eventos';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert(
            [
                'ubicacion_id' => 1,
                'nombre'       => 'Firma contratos Psicol',
                'descripcion'  => 'Firma contratos de nuevos recursos',
                'fecha_inicio' => '2020-12-07 08:00',
                'fecha_inicio_ventas' => '2020-11-03',
                'fecha_fin_ventas' => '2020-12-06 23:59',
            ]
        );

        DB::table($this->table)->insert(
            [
                'ubicacion_id' => 2,
                'nombre'       => 'Partido Colombia vs Brasil',
                'descripcion'  => 'Partido de eliminatorias para el mundial',
                'fecha_inicio' => '2021-01-20 15:00',
                'fecha_inicio_ventas' => '2020-12-01',
                'fecha_fin_ventas' => '2021-01-10 23:59',
            ]
        );
    }

    
}
