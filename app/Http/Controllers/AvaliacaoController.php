<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Prestador;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;

class AvaliacaoController extends Controller
{
    private $prestador;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Prestador $prestador, Categoria $categoria, Pedido $pedido)
    {
        $this->prestador = $prestador;
        $this->categoria = $categoria;
        $this->pedido = $pedido;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestador = $this->prestador->where('usuario_id',Auth::user()->id)->first();

        return view('user.perfil.perfil', compact('prestador'));
    }


}
