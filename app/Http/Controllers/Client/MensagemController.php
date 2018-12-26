<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 06/06/2017
 * Time: 14:16
 */

namespace App\Http\Controllers\Client;

use App\Models\PedidoMensagem;
use Illuminate\Http\Request;

class MensagemController
{

    public function __construct(PedidoMensagem $mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function msgsPorPrestador($pedidoId,$prestadorId)
    {
        return $this->mensagem->where('pedido_id',$pedidoId)->where('prestador_id',$prestadorId)->get();
    }

    public function store(Request $request)
    {
        return $this->mensagem->create($request->all());
    }
}