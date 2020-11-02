<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Evento;

class BoletaSeeder extends Seeder
{
    private $table = 'boletas';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->crearBoletasEvento(1);
        $this->crearBoletasEvento(2);        
    }

    private function crearBoletasEvento($eventoId){

        $eventoEncontrado = Evento::find($eventoId);
        $filas = $eventoEncontrado->ubicacion->filas;
        $columnas = $eventoEncontrado->ubicacion->columnas;

        $p = chr(65);
        for ($fila = 1; $fila <= $filas; $fila++){
            for($columna = 1; $columna <= $columnas; $columna++){
                $puesto = $p.$columna;

                DB::table($this->table)->insert(
                    [
                        'evento_id'   => $eventoId,
                        'puesto'    => $puesto
                    ]
                );
            }
            $p++;    
        }
    }
}
