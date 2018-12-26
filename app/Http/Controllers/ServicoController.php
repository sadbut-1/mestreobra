<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    private $servico;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Servico $servico)
    {
        $this->servico = $servico;
    }

    public function serviceByCategory($id)
    {
        return $this->servico->where('categoria_id',$id)->orderBy('ordem')->get();
    }

}
