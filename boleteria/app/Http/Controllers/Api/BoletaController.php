<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Boleta;
use Illuminate\Http\Request;

use App\Http\Resources\BoletaCollection;

class BoletaController extends Controller
{
    protected $boleta;

    public function __construct(Boleta $boleta)
    {
        $this->boleta = $boleta;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            [
                'status'=>'ok',
                'data'=>new BoletaCollection($this->boleta->get())
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  String $email
     * @return \Illuminate\Http\Response
     */
    public function showByEventoId($eventoId)
    {
        $boletasEncontradas = $this->boleta->where('evento_id', $eventoId)->get();

        if ($boletasEncontradas)
        {
            $boletasResponse = new BoletaCollection($boletasEncontradas);
            return response()->json(['status'=>'ok','data'=>$boletasResponse],200);
        }
        
        return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encontraron boletas asociadas al evento.'])],404);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function show(Boleta $boleta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boleta $boleta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boleta $boleta)
    {
        //
    }
}
