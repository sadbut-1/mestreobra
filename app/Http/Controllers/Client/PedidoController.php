<?php

namespace App\Http\Controllers\Client;

use App\Models\Prestador;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Http\Controllers\Controller;
use App\Models\LogVisualizacao;
use App\Services\PedidoService;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompartilharPedido;
use App\Models\TipoServico;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;

class PedidoController extends Controller
{

    private $categoria;
    private $pedido;
    private $prestador;
    private $pedidoService;
    private $tipoServico;
    private $cliente;

    public function __construct(Categoria $categoria,
                                Pedido $pedido,
                                Prestador $prestador,
                                PedidoService $pedidoService,
                                LogVisualizacao $logVisualizacao,
                                TipoServico $tipoServico,
                                Cliente $cliente
    )
    {
        $this->categoria = $categoria;
        $this->pedido = $pedido;
        $this->prestador = $prestador;
        $this->logVisualizacao = $logVisualizacao;
        $this->pedidoService = $pedidoService;
        $this->tipoServico = $tipoServico;
        $this->cliente = $cliente;
    }

//    public function show($hash)
    public function show($id)
    {
        $pedido = $this->pedido->find($id);
        return view('client.pedido.show',compact('pedido'));
    }

    public function share($hash)
    {
        $pedido = $this->pedido->where('hash',$hash)->first();
        return view('mail-urls.compartilharPedido',compact('pedido'));
    }

    public function store(Request $request)
    {
        $cliente = $this->cliente->where('usuario_id',Auth::user()->id)->first();
        $pedido = $this->pedido->create([
            'tipo_servico_id' => $request->get('tipo_servico_id'),
            'categoria_id' => $request->get('categoria_id'),
            'servico_id' => $request->get('servico_id'),
            'detalhes' => $request->get('detalhes'),
            'urgencia' => $request->get('urgencia'),
            'preferencia_contato' => $request->get('preferencia_contato'),
            'limite' => $request->get('limite'),
            'hash' => uniqid(),
            'ativo' => 1,
            'nome' =>          Auth::user()->name,
            'email' =>         Auth::user()->email,
            'cliente_id' =>    $cliente->id,
            'fone' =>          $telefone = (isset($cliente->telefone))? $cliente->telefone : null,
            'celular' =>       $cliente->celular,
            'cep' =>           $cliente->cep,
            'rua' =>           $rua = (isset($cliente->rua))? $cliente->rua : null,
            'numero' =>        $numero = (isset($cliente->numero))? $cliente->numero : null,
            'bairro' =>        $bairro = (isset($cliente->bairro))? $cliente->bairro : null,
            'cidade' =>        $cidade = (isset($cliente->cidade))? $cliente->cidade : null,
            'estado' =>        $estado = (isset($cliente->estado))? $cliente->estado : null,
            'complemento' =>   $complemento = (isset($cliente->complemento))? $cliente->complemento : null,
            'pal_chave' =>     $pal_chave = (isset($cliente->pal_chave))? $cliente->pal_chave : null,
        ]);

        return redirect()->back()->with(['message' => 'Pedido enviado com sucesso!']);
    }

    public function showAjax($id)
    {
        return $this->pedido->with('interessados.prestador')->find($id);
    }

    public function archive($id)
    {
        $this->pedido->where('id',$id)->update(['ativo' => 0]);
        return redirect()->back()->with('message','Pedido arquivado com sucesso!');
    }

    public function shareMail(Request $request)
    {
        $emails = explode(",", $request->get('emails'));
        $pedido = $this->pedido->find($request->get('pedido_id'));

        foreach ($emails as $email)
        {
            Mail::to($email)->send(new CompartilharPedido($pedido));
            //cria log de envio
            //$this->logCompartilharEmail->create(['pedido_id' => $pedido->id, 'email' => $email]);
        }
    }

    public function attachPrestador($pedido,$prestador)
    {
        $this->pedido->find($pedido)->prestador()->attach($prestador);

        return $this->prestador->find($prestador);
    }

    public function mailValuation($id)
    {
        $this->pedidoService->sendEmailValuation($id);

        return redirect('admin/pedido');
    }

    /*
     * Envia email solicitando status do pedido ao cliente
     */
    public function mailStatus($id)
    {
        $this->pedidoService->sendEmailStatus($id);

        return redirect('admin/pedido');
    }

    public function categoriasPorTipo($id)
    {
        return  $this->tipoServico->find($id)->categorias()->get();
    }

    public function servicosPorCategoria($id)
    {
        return $this->categoria->find($id)->servicos()->get();
    }
}
