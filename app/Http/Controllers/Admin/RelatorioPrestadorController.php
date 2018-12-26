<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 30/03/2017
 * Time: 10:13
 */

namespace App\Http\Controllers\Admin;

use App\Models\Prestador;

class RelatorioPrestadorController
{

    public function __construct(Prestador $prestador)
    {
        $this->prestador = $prestador;
    }

    public function prestadores()
    {
        $prestadores = $this->prestador->orderBy('created_at')->get();
        $ativos = $this->prestador->where('ativo',1)->count();

        return view('admin.relatorios.prestadores', compact('prestadores','ativos'));
    }

}