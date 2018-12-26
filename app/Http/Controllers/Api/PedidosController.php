<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PrestadorContatoVerificado;
use App\Models\PedidoInteressado;
use App\Models\PedidoSituacao;

class PedidosController extends Controller
{
    private $pedido;
    private $pedidoVerificado;
    private $interessado;
    private $situacao;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido,
                                PrestadorContatoVerificado $pedidoVerificado,
                                PedidoInteressado $interessado,
                                PedidoSituacao $situacao
    )
    {
        $this->pedido = $pedido;
        $this->pedidoVerificado = $pedidoVerificado;
        $this->interessado = $interessado;
        $this->situacao = $situacao;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->pedido->with(
            'categoria',
            'servico',
            'envios',
            'envios.prestador',
            'interessados',
            'interessados.prestador',
            'situacao'
        )->where('ativo',1)->orderBy('id','DESC')->get();
    }

    public function verificado($pedidoId,$prestadorId)
    {
        $this->pedidoVerificado->firstOrCreate([
            'pedido_id' => $pedidoId,
            'prestador_id' => $prestadorId
        ]);
        $this->interessado->where('pedido_id',$pedidoId)
            ->where('prestador_id',$prestadorId)->update(['verificado' => 1]);

        return ['response' => 'success'];
    }

    public function situacao($pedidoId, $status)
    {
        $nome = ['nenhum','cancelado','escolhendo','realizando','realizado'];

        $this->situacao->create([
            'pedido_id' => $pedidoId,
            'situacao' => $status,
            'nome' => $nome[$status]
        ]);

        return ['response' => $nome[$status]];
    }
}
