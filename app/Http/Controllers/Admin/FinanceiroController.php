<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 30/05/2017
 * Time: 11:22
 */

namespace App\Http\Controllers\Admin;

use App\Models\Prestador;

class FinanceiroController
{

    public function __construct(Prestador $prestador)
    {
        $this->prestador = $prestador;
    }

    public function index()
    {
        $prestadores = $this->prestador
            ->where('ativo',1)
            ->where('cobranca_ativa',0)
            ->orderBy('created_at','ASC')->paginate(10);
        return view('admin.financeiro.index', compact('prestadores'));
    }

}