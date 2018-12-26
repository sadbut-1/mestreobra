<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prestador;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Http\Controllers\Controller;
use App\Models\LogVisualizacao;
use App\Services\PedidoService;
use App\Models\PedidoInteressado;

class PedidoController extends Controller
{

    private $categoria;
    private $pedido;
    private $prestador;
    private $pedidoService;
    private $interessado;

    public function __construct(Categoria $categoria,
                                Pedido $pedido,
                                Prestador $prestador,
                                PedidoService $pedidoService,
                                LogVisualizacao $logVisualizacao,
                                PedidoInteressado $interessado
    )
    {
        $this->categoria = $categoria;
        $this->pedido = $pedido;
        $this->prestador = $prestador;
        $this->logVisualizacao = $logVisualizacao;
        $this->pedidoService = $pedidoService;
        $this->interessado = $interessado;
    }

    public function index()
    {
        $pedidos = $this->pedido->with('visitas')->orderBy('id','desc')->paginate(3);
        $prestadores = $this->prestador->where('ativo',1)->select('id', 'nome')->get();
        return view('admin.pedido.index',compact('pedidos','prestadores'));
    }

    public function show($id)
    {
        return $this->pedido->with('categoria','servico','visitas','avaliacao')->find($id);
    }

    public function archive($id)
    {
        $this->pedido->where('id',$id)->update(['ativo' => 0]);
        return redirect('admin/pedido');
    }

    public function destroy($id)
    {
        $this->pedido->destroy($id);
        return redirect('admin/pedido');
    }

    public function sendMail(Request $request)
    {
        $emails = explode(",", $request->get('emails'));
        $pedido = $this->pedido->find($request->get('pedido_id'));

        return $this->pedidoService->sendEmail($emails,$pedido);
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

    public function prestadorMensagem($pedidoId,$prestadorId)
    {
        return $this->interessado->where('pedido_id',$pedidoId)
            ->where('prestador_id',$prestadorId)->first();
    }
}
