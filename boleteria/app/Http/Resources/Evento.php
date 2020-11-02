<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Boleta;

class Evento extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'nombre'        => $this->nombre,
            'ubicacion'     => $this->ubicacion->nombre,
            'descripcion'   => $this->descripcion,
            'fecha_inicio'   => $this->fecha_inicio,
            'capacidad'     => $this->ubicacion->filas * $this->ubicacion->columnas,
            //'boletas_disponibles' => $this->boletas->where('estado','DISPONIBLE')->count()
            'boletas_disponibles' => Boleta::where('evento_id', $this->id)->where('estado','DISPONIBLE')->count() //Esta consulta es más rápida
        ];
    }
}
