<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orcamento;


class OrcamentoController extends Controller
{
    private $orcamento;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Orcamento $orcamento)
    {
        $this->orcamento = $orcamento;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if($request->hasFile('arquivo')){
            $data['arquivo'] = $request->file('arquivo')->store('orcamentos','public');
        }
        $this->orcamento->create($data);

        return redirect()->back()->with('message','Orçamento enviado com sucesso!');
    }

    public function showByPedidoAndPrestador($pedidoId,$prestadorId)
    {
        return $this->orcamento->where('pedido_id', $pedidoId)->where('prestador_id',$prestadorId)->first();
    }

}
