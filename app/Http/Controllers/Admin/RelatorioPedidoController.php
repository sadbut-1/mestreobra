<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 30/03/2017
 * Time: 10:13
 */

namespace App\Http\Controllers\Admin;

use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class RelatorioPedidoController
{

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function graficos()
    {
        return view('admin.relatorios.pedidos');
    }

    public function usuarios()
    {
        $pedidos = \DB::table('pedidos')
            ->groupBy(['email','nome','fone','celular'])
            ->select('email', 'nome', DB::raw('count(*) as total_pedidos'),'fone','celular')
            ->orderBy('nome')
            ->get();
        return view('admin.relatorios.pedidos-usuarios', compact('pedidos'));
    }

    public function pedidosAjax()
    {
        $pedidos = [];
        $now = new \DateTime();
        $inicio = $now->modify('-5 month');

        for($i = 1; $i < 7; $i++) {
            $pedidos[$i]['mes'] = $inicio->format('m/Y');
            $pedidos[$i]['pedido'] = $this->pedido->whereMonth('created_at',$inicio->format('m'))
                ->whereYear('created_at',$inicio->format('Y'))->count();
            $inicio = $inicio->modify('+1 month');
        }
        return $pedidos;
    }
}