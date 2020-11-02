<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Boleta;
use App\Models\Comprador;
use App\Models\Evento;

class BoleteriaController extends Controller
{
    public function reservar(Request $request){
        $eventoId = $request->evento_id;
        $compradorId = $request->comprador_id;
        $numeroBoletas = $request->numero_boletas;

        $errores = $this->validarCondicionesReservas($eventoId, $compradorId, $numeroBoletas);

        if (!$errores) {
            Boleta::where('evento_id', $eventoId)
            ->where('estado', 'DISPONIBLE')
            ->limit($numeroBoletas)
            ->update(['estado' => 'RESERVADA','comprador_id' => $compradorId]);

            return response()->json(['code'=>200,'message'=>'Boletas reservadas exitosamente'], 200);
        }

        return response()->json(['errors'=>$errores], 409);        
    }

    private function validarCondicionesReservas($eventoId, $compradorId, $numeroBoletas){
        $errores = [];

        $boletasDisponibles = Boleta::where('evento_id', $eventoId)->where('estado','DISPONIBLE')->count();
        $comprador = Comprador::where('id', $compradorId)->first();
        $evento = Evento::where('id', $eventoId)->first();
        
        if($numeroBoletas>$boletasDisponibles){
            $errores[] = ['code' => 409, 'message' => 'Número de boletas solicitadas es mayor al número de boletas disponibles'];
        }

        if(!$comprador){
            $errores[] = ['code' => 409, 'message' => 'El comprador no existe'];
        }

        if(!$evento){
            $errores[] = ['code' => 409, 'message' => 'El evento no existe'];
        }
        
        return $errores;
    }

}
