<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 27/06/2017
 * Time: 14:32
 */

namespace App\Http\Controllers\Admin;

use App\Services\QualificacaoService;

class ConfiguracoesController
{

    public function __construct(QualificacaoService $qualificacao)
    {
        $this->qualificacao = $qualificacao;
    }

    public function index()
    {
        return view('admin.config.index');
    }

    public function qualificacoes()
    {
        $this->qualificacao->atualizar();
        return redirect('/admin/config')->with(['message' => 'Qualificações atualizadas com sucesso!']);
    }
}