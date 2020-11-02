<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comprador;
use Illuminate\Http\Request;
use App\Http\Resources\Comprador as CompradorResource;
use App\Http\Resources\CompradorCollection;
use App\Http\Requests\Comprador as CompradorRequest;

class CompradorController extends Controller
{
    protected $comprador;

    public function __construct(Comprador $comprador)
    {
        $this->comprador = $comprador;
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
                'data'=>new CompradorCollection($this->comprador->get())
            ]
        );
    }


    /**
     * Display the specified resource.
     *
     * @param  String $email
     * @return \Illuminate\Http\Response
     */
    public function showByEmail($email)
    {
        $compradorEncontrado = Comprador::where('email', $email)->first();

        if ($compradorEncontrado)
        {
            $compradorResponse = new CompradorResource($compradorEncontrado);
            return response()->json(['status'=>'ok','data'=>$compradorResponse],200);
        }
        
        return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un comprador con ese email.'])],404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompradorRequest $request)
    {
        $compradorEncontrado = Comprador::where('email', $request->email)->first();

        if(!$compradorEncontrado){
            $compradorNuevo = $this->comprador->create($request->all());        
            return response()->json(new CompradorResource($compradorNuevo), 201);
        }

        return response()->json(['errors'=>array(['code'=>409,'message'=>'El email ya se encuentra registrado.'])],409);     
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comprador  $comprador
     * @return \Illuminate\Http\Response
     */
    public function show(Comprador $comprador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comprador  $comprador
     * @return \Illuminate\Http\Response
     */
    public function update(CompradorRequest $request, Comprador $comprador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comprador  $comprador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comprador $comprador)
    {
        //
    }
}
