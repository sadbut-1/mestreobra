<?php

/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 27/03/2017
 * Time: 17:08
 */

namespace App\Services;

use App\Models\Pedido;
use App\Services\PedidoService;
use Carbon\Carbon;

class AgendaService
{
    private $pedido;

    public function __construct(Pedido $pedido, PedidoService $pedidoService)
    {
        $this->pedido = $pedido;
        $this->pedidoService = $pedidoService;
    }

    public function sendEmailSituacaoPedido()
    {
        $dias = 10;
        $pedidos = $this->pedido->doesntHave('enviosSituacao')
            ->whereDate('created_at', '<', Carbon::now()->subDay($dias))
            ->whereDate('created_at', '>', '2017-03-25')
            ->where('ativo', 1)
            ->get();

        foreach ($pedidos as $pedido) {
            $this->pedidoService->sendEmailStatus($pedido->id);
        }
        if ($pedidos) {
            return count($pedidos);
        }
    }
}