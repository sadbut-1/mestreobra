<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmailContato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prestador;
use App\Models\Pedido;
use App\Services\AgendaService;
use App\Models\AvaliacaoPrestador;
use App\Models\EmailNovidade;
use App\Models\Boleto;
use Carbon\Carbon;

class HomeController extends Controller
{
    private $prestador;
    private $pedido;
    private $agenda;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Prestador $prestador, Pedido $pedido, AgendaService $agenda,
                                AvaliacaoPrestador $avaliacao, EmailNovidade $novidade,
                                EmailContato $contato, Boleto $boleto)
    {
        $this->middleware('auth');
        $this->prestador = $prestador;
        $this->pedido = $pedido;
        $this->agenda = $agenda;
        $this->avaliacao = $avaliacao;
        $this->novidade = $novidade;
        $this->contato = $contato;
        $this->boleto = $boleto;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestador['ativo'] = $this->prestador->where('ativo',1)->count();
        $prestador['total'] = $this->prestador->count();
        $pedido = $this->pedido->where('ativo',1)->count();
        $avaliacoes = $this->avaliacao->count();
        $novidades = $this->novidade->paginate(6);
        $contatos = $this->contato->count();
        $boletos = $this->boleto->whereMonth('data', Carbon::now()->subMonth(1)->month)
            ->orderBy('prestador_id')->paginate(8);
        $totalBoletos = $this->boleto
            ->whereMonth('data', Carbon::now()->subMonth(1)->month)->sum('valor');
        $agenda = $this->agenda();
        return view('admin.home', compact('prestador',
                                                    'pedido',
                                                    'avaliacoes',
                                                    'novidades',
                                                    'contatos',
                                                    'boletos',
                                                    'totalBoletos'));
    }

    public function agenda()
    {
        if(env('APP_ENV') == 'production') {
            return $this->agenda->sendEmailSituacaoPedido();
        }
    }
}
