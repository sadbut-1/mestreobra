<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Prestador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $prestador;
    private $pedido;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido, Prestador $prestador)
    {
        $this->middleware('auth');
        $this->pedido = $pedido;
        $this->prestador = $prestador;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = [];
        $prestador = $this->prestador->where('usuario_id',Auth::user()->id)->first();

        if(count($prestador) > 0 ) {
            foreach ($prestador->orcamentos_recebidos as $o) {
                $ids[] = $o->pedido_id;
            }

            if (count($ids) > 0) {
                $pedidos = $this->pedido->doesntHave('interessados')
                    ->where('ativo', 1)->whereIn('id', $ids)->orderBy('id', 'DESC')->get();

                $interesses = $this->pedido->whereHas('interessados', function ($query) {
                    $query->where('interesse', 1);
                })->where('ativo', 1)->whereIn('id', $ids)->orderBy('id', 'DESC')->get();
            }
        } else {
            $pedidos = [];
            $interesses = [];
        }

        return view('user.home', compact('pedidos','interesses'));
    }

    public function interesses()
    {
        $ids = [];

        $prestador = $this->prestador->where('usuario_id',Auth::user()->id)->first();

        foreach ($prestador->orcamentos_recebidos as $o)
        {
            $ids[] = $o->pedido_id;
        }

        if(count($ids) >0) {
            $interesses = $this->pedido->whereHas('interessados',function($query){
                $query->where('interesse',1);
            })->where('ativo',1)->whereIn('id',$ids)->orderBy('id','DESC')->get();
        }

        return view('user.interesses', compact('interesses'));
    }
}
