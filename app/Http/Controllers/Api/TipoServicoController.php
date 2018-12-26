<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\TipoServico;
use App\Http\Controllers\Controller;

class TipoServicoController extends Controller
{
    private $categoria;
    private $tipoServico;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Categoria $categoria, TipoServico $tipoServico)
    {
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
        return $this->tipoServico->with('categorias','categorias.servicos')->orderBy('id','DESC')->get();
    }


}
