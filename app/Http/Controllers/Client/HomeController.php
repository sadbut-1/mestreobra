<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Categoria;
use App\Models\TipoServico;


class HomeController extends Controller
{
    private $pedido;
    private $cliente;
    private $categoria;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Cliente $cliente, Pedido $pedido, Categoria $categoria, TipoServico $tipoServico)
    {
        $this->middleware('client');
        $this->cliente = $cliente;
        $this->pedido = $pedido;
        $this->categoria = $categoria;
        $this->tipoServico = $tipoServico;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = $this->cliente->where('usuario_id',Auth::user()->id)->first();
        if(!$cliente) {
            return view('client.home-cadastro');
        }
        $pedidos = $this->pedido
            ->where('cliente_id', $cliente->id)
            ->orWhere('email',Auth::user()->email)
            ->where('ativo',1)->orderBy('id','DESC')->paginate(5);

        return view('client.home', compact('pedidos'));
    }

    public function historico()
    {
        $cliente = $this->cliente->where('usuario_id',Auth::user()->id)->first();
        if(!$cliente) {
            return view('client.home-cadastro');
        }
        $pedidos = $this->pedido
            ->where('cliente_id', $cliente->id)
            ->orWhere('email',Auth::user()->email)
            ->where('ativo',0)->orderBy('id','DESC')->paginate(5);
        return view('client.historico', compact('pedidos'));
    }

    public function pedido()
    {
        $tipos = $this->tipoServico->all();
        return view('client.pedido', compact('tipos'));
    }

}
