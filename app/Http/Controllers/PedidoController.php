<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoStatusRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Http\Requests\PedidoRequest;
use App\Models\Servico;
use App\Models\PedidoFoto;
use App\Models\Prestador;
use App\Models\LogVisualizacao;
use App\Models\LogSolicitacaoVisita;
use App\Models\AvaliacaoPrestador;
use Illuminate\Support\Facades\Auth;
use App\Models\PedidoSituacao;
use App\Services\PedidoService;
use App\Models\PedidoInteressado;
use App\Services\CadastroService;
use App\Models\ParceiroConfig;

class PedidoController extends Controller
{

    private $categoria;
    private $pedido;
    private $foto;
    private $prestador;
    private $logVisualizacao;
    private $logVisita;
    private $avaliacao;
    private $pedidoSituacao;
    private $servico;
    private $pedidoService;
    private $pedidoInteressado;
    private $cadastroService;

    public function __construct(Categoria $categoria,
                                Pedido $pedido,
                                Servico $servico,
                                PedidoFoto $foto,
                                Prestador $prestador,
                                LogVisualizacao $logVisualizacao,
                                LogSolicitacaoVisita $logVisita,
                                PedidoSituacao $pedidoSituacao,
                                AvaliacaoPrestador $avaliacao,
                                PedidoService $pedidoService,
                                PedidoInteressado $pedidoInteressado,
                                CadastroService $cadastroService,
                                ParceiroConfig $parceiroConfig
)
    {
        $this->categoria = $categoria;
        $this->pedido = $pedido;
        $this->foto = $foto;
        $this->prestador = $prestador;
        $this->logVisualizacao = $logVisualizacao;
        $this->logVisita = $logVisita;
        $this->pedidoSituacao = $pedidoSituacao;
        $this->avaliacao = $avaliacao;
        $this->servico = $servico;
        $this->pedidoService = $pedidoService;
        $this->pedidoInteressado = $pedidoInteressado;
        $this->cadastroService = $cadastroService;
        $this->parceiroConfig = $parceiroConfig;
    }

    //Mostra tela com formulario para realizar o pedido
    public function index()
    {
        $categorias = $this->categoria->all();
        $parceiros = $this->parceiroConfig->find(1);
        return view('public.pedido.pedido',compact('categorias','parceiros'));
    }

    //Mostra tela com todos os detalhes do pedido para o prestador que recebeu email/sms
    public function show($hash,$id)
    {
        $pedido = $this->pedido->where('hash',$hash)->first();
        $prestador = $this->prestador->find($id);
        $categorias = $this->categoria->all();
        if($pedido) {
            $this->logVisualizacao->firstOrCreate(['prestador_id' => $prestador->id, 'pedido_id' => $pedido->id]);
            $interessados = $this->pedido->find($pedido->id)->interessados()->where('interesse',1)->get();
            $prestadorInteressado = $this->pedido->find($pedido->id)->interessados()->where('prestador_id',$id)->first();
        }

        return view('mail-urls.responderPedido',compact('pedido','categorias','prestador','interessados','prestadorInteressado'));
    }

    //Mostra dados do cliente via home do prestador (chamado via ajax)
    public function showHome($id)
    {
        return $this->logVisualizacao->firstOrCreate(['prestador_id' => Auth::user()->empresa->id, 'pedido_id' => $id]);
    }

    //Salva o pedido feito pelo cliente
    public function store(PedidoRequest $request)
    {
        $emails = [];
        $data =  $request->except('_token');
        $data['tipo_servico_id'] = 1;
        $servicoId = $request->get('servico_id');
        $data['hash'] = uniqid();
        $pedido = $this->pedido->create($data);
        $this->cadastroService->novo($pedido,User::CLIENT);
        $fotos = $request->session()->pull('pedido.fotos');
        if($fotos) {
            foreach ($fotos as $foto) {
                $this->foto->create([
                    'pedido_id' => $pedido->id,
                    'foto' => $foto
                ]);
            }
        }
        if($servicoId) {
            $prestadores = $this->servico->find($servicoId)->prestadores()->get();
            foreach ($prestadores as $prestador)
            {
                $emails[] = $prestador->email;
            }
        }
        $this->pedidoService->sendEmail($emails,$pedido);
        if(!isset($data['cliente_id'])) {
            return view('public.pedido.pedidoEnviado');
        } else {
            return redirect('/client/home')->with(['message' => 'Pedido realizado com sucesso!']);
        }
    }

    //Armazenas as imagens do pedido na session enquanto o pedido não é finalizado
    public function pictures(Request $request)
    {
        $file = $request->file('file');

        $request->session()->push('pedido.fotos', $file->store('pedidos','public'));

    }

    public function interesse(Request $request)
    {
        $interessado = $this->pedidoInteressado->firstOrCreate($request->except('_token'));
        if($interessado->interesse > 0) {
            //if(env('APP_ENV') == 'production') {
                $this->pedidoService->sendEmailInteressado($interessado);
            //}
        }

        return redirect()->back()->with('message', 'Seu interesse pelo serviço foi registrado com sucesso. Confira abaixo os dados do cliente');
    }

    //Tela para perguntar sobre a situação do pedido
    public function pedidoStatus($hash,$resp)
    {
        $pedido = $this->pedido->where('hash',$hash)->first();
        if($resp == 1) {
            return view('mail-urls.situacaoPedidoSim', compact('pedido'));
        }
        if($resp == 2) {
            $this->pedidoSituacao->create([
                'pedido_id' => $pedido->id,
                'situacao' => 5,
                'nome' => 'nenhum contato'
            ]);
            return view('mail-urls.situacaoPedidoNao',compact('pedido'));
        }
    }

    //Salva formulario da situação do pedido
    public function savePedidoStatus(PedidoStatusRequest $request)
    {
        $data = $request->except('_token');
        if (isset($data['prestador_id'])) {
            $prestador = $data['prestador_id'];
        } else {
            $prestador = null;
        }
        $this->pedidoSituacao->create([
            'pedido_id' => $data['pedido_id'],
            'prestador_id' => $prestador,
            'situacao' => $data['situacao'],
            'nome' => $data['nome'],
            'comentario' => $data['comentario']
        ]);
        if($prestador) {
            $this->pedido->find($data['pedido_id'])->prestador()->attach($data['prestador_id']);

            if ($data['situacao'] == 1) {
                if (isset($data['anonimo'])) {
                    $anonimo = 1;
                } else {
                    $anonimo = 0;
                }
                $this->avaliacao->create([
                    'pedido_id' => $data['pedido_id'],
                    'estrelas' => $data['estrelas'],
                    'comentario' => $data['comentario_p'],
                    'anonimo' => $anonimo
                ]);
            }
        }

        return view('mail-urls.situacaoRespondida');
    }

    //Mostra tela de avaliação do serviço realizado
    public function valuate($hash,$prestadorId)
    {
        $pedido = $this->pedido->where('hash',$hash)->first();
        $prestador = $this->prestador->find($prestadorId);

        return view('mail-urls.avaliarPrestador',compact('pedido','prestador'));
    }

    //Salva avaliação e envia email da mesma para o prestador.
    public function saveValuate(Request $request)
    {
        $pedido = $this->pedido->find($request->get('pedido_id'));
        $this->avaliacao->create($request->except('_token'));
        try {
            $this->pedidoService->saveEmailValuation($pedido);
        } catch (\Exception $e) {

        }

        return view('mail-urls.prestadorAvaliado');
    }

}
