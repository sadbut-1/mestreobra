<?php

namespace App\Http\Controllers\Admin;

use App\Models\AvaliacaoPrestador;
use App\Http\Controllers\Controller;

class AvaliacaoController extends Controller
{
    private $servico;
    private $categoria;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AvaliacaoPrestador $avaliacao)
    {
        $this->avaliacao = $avaliacao;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avaliacoes = $this->avaliacao->orderBy('id','DESC')->get();
        return view('admin.avaliacoes.index', compact('avaliacoes'));
    }

}
