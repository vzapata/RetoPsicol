<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::apiResource('compradores','Api\CompradorController',[ 'only'=>['index', 'store'] ]);
Route::get('/compradores/buscar/{email}', 'Api\CompradorController@showByEmail');
Route::post('/compradores/registrar', 'Api\CompradorController@store');
Route::get('/boletas', 'Api\BoletaController@index');
Route::get('/boletas/{eventoId}', 'Api\BoletaController@showByEventoId');
Route::post('/boletas/reservar', 'Api\BoleteriaController@reservar');
Route::get('/eventos', 'Api\EventoController@index');
Route::get('/eventos/{evento}', 'Api\EventoController@show');