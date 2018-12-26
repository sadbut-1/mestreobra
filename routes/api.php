<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tipos', 'Api\TipoServicoController@index');
Route::get('/pedidos', 'Api\PedidosController@index');
Route::get('/verificado/{pedidoId}/{prestadorId}', 'Api\PedidosController@verificado');
Route::get('/situacao/{pedidoId}/{status}', 'Api\PedidosController@situacao');
