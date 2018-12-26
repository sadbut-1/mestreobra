<?php

namespace App\Http\Controllers\Client;

use App\Models\Prestador;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Http\Controllers\Controller;
use App\Models\AgendaCliente;
use Illuminate\Support\Facades\Mail;
use App\Mail\AgendadoPrestador;

class AgendaController extends Controller
{

    private $categoria;
    private $pedido;
    private $prestador;
    private $agenda;

    public function __construct(Categoria $categoria,
                                Pedido $pedido,
                                Prestador $prestador,
                                AgendaCliente $agenda
    )
    {
        $this->categoria = $categoria;
        $this->pedido = $pedido;
        $this->prestador = $prestador;
        $this->agenda = $agenda;
    }

    public function store(Request $request)
    {
        $agenda = $this->agenda->create($request->except('_token'));
        $prestador = $this->prestador->find($request->get('prestador_id'));
        $pedido = $this->pedido->find($request->get('pedido_id'));
        if($prestador) {
            Mail::to($prestador->email)->send(new AgendadoPrestador($pedido,$agenda));
        }
        return redirect('/client/home');
    }
}
