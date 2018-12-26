<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 27/06/2017
 * Time: 14:45
 */

namespace App\Services;

use App\Models\PrestadorQualificacao;
use App\Models\Prestador;
use Carbon\Carbon;

class QualificacaoService
{
    public function __construct(Prestador $prestador, PrestadorQualificacao $qualificacao)
    {
        $this->qualificacao = $qualificacao;
        $this->prestador = $prestador;
    }

    public function atualizar()
    {
        $this->qualificacao->where('padrao',1)->delete();

        $prestadores = $this->prestador->where('ativo',1)->get();

        foreach ($prestadores as $p)
        {
            $this->tempoMestreObra($p);
            $this->experiencia($p);
            $this->indicacoes($p);
            $this->servicos($p);
            $this->estrelas($p);
        }
    }

    public function tempoMestreObra($p)
    {
        $data = new \DateTime($p->created_at);
        $cadastro = Carbon::create($data->format('Y'),$data->format('m'),$data->format('d'));
        $meses = $cadastro->diffInMonths(Carbon::now());
        if ($meses == 0){
            $meses = $cadastro->diffInDays(Carbon::now()).' dias';
        } elseif ($meses > 12 ){
            if(($meses % 12) > 1) {
                $meses = ' e ' . ($meses % 12) . ' meses ';
            } else {
                $meses = ' e ' . ($meses % 12) . ' mês ';
            }
        } elseif ($meses < 12) {
            if ($cadastro->diffInMonths(Carbon::now()) > 1) {
                $meses = $cadastro->diffInMonths(Carbon::now()) . ' meses';
            } else {
                $meses = $cadastro->diffInMonths(Carbon::now()) . ' mês';
            }
        } else {
            $meses = '';
        }
        $anos = $cadastro->diffInYears(Carbon::now());
        if( $anos == 0) {
            $anos = '';
        } elseif ( $anos > 1 ) {
            $anos = $anos.' anos';
        } else { $anos = $anos.' ano'; }
        $qualificacao['prestador_id'] = $p->id;
        $qualificacao['qualificacao'] = $anos.$meses." cadastrado no Mestre Obra";
        $this->qualificacao->create($qualificacao);
    }

    public function experiencia($p)
    {
        if($p->experiencia > 0) {
            $qualificacao['prestador_id'] = $p->id;
            $qualificacao['qualificacao'] = $p->experiencia . " anos de experiência na área";
            $this->qualificacao->create($qualificacao);
        }
    }

    public function indicacoes($p)
    {
        if($p->indicacoes > 0) {
            $qualificacao['prestador_id'] = $p->id;
            $qualificacao['qualificacao'] = $p->indicacoes . " recomendações positivas";
            $this->qualificacao->create($qualificacao);
        }
    }

    public function servicos($p)
    {
        if( count($p->pedido) > 0) {
            $qualificacao['prestador_id'] = $p->id;
            $qualificacao['qualificacao'] = count($p->pedido) . " serviços realizados pela plataforma";
            $this->qualificacao->create($qualificacao);
        }
    }

    public function estrelas($p)
    {
        $avaliacoes = $this->prestador->find($p->id)->pedido()->has('avaliacao')->count();
        if( $avaliacoes > 0) {
            $qualificacao['prestador_id'] = $p->id;
            $qualificacao['qualificacao'] = "Recebeu ".$avaliacoes." avaliações em ".count($p->pedido)." serviços";
            $this->qualificacao->create($qualificacao);
        }

    }
}