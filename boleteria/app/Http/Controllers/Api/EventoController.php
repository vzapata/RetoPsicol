<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

use App\Http\Resources\Evento as EventoResource;
use App\Http\Resources\EventoCollection;

class EventoController extends Controller
{
    protected $evento;

    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
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
                'data'=>new EventoCollection($this->evento->get())
            ]
        );
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
     * @param  Strin  $evento
     * @return \Illuminate\Http\Response
     */
    public function show($eventoId)
    {
        $eventoEncontrado = Evento::where('id', $eventoId)->first();

        if ($eventoEncontrado)
        {
            $eventoResponse = new EventoResource($eventoEncontrado);
            return response()->json(['status'=>'ok','data'=>$eventoResponse],200);
        }
        
        return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra el evento.'])],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
