<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UbicacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/ubicaciones', 'UbicacionController@index');


// Route::get('/eventos', 'EventoController@index');

// Route::resource('compradores','CompradorController',[ 'only'=>['index','showByEmail', 'store'] ]);
// Route::get('/compradores', 'CompradorController@index');
// Route::get('/compradores/buscar/{email}', 'CompradorController@showByEmail');
// Route::post('/compradores/registrar', 'CompradorController@store');

Route::group(['prefix'=>'api'], function(){
    // Route::apiResource('compradores','Api\CompradorController');
});