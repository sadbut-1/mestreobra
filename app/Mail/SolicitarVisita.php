<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Pedido;
use App\Models\Prestador;

class SolicitarVisita extends Mailable
{
    use Queueable, SerializesModels;

    private $pedido;
    private $prestador;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Prestador $prestador, Pedido $pedido)
    {
        $this->pedido = $pedido;
        $this->prestador = $prestador;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tipo_de_servico = 'Não especificado';
        if(isset($this->pedido->servico->nome))
            $tipo_de_servico = $this->pedido->servico->nome;

        return $this->from(['address' => 'contato@mestreobra.com.br', 'name' => 'Mestre Obra'])
            ->subject('Solicitação de visita')->view('mails.pedido.visita')
            ->with([
                  'nome' => $this->prestador->nome,
                  'fone' => $this->prestador->fone,
                  'email' => $this->prestador->email,
//                  'categoria' => $this->pedido->categoria->nome,
//                  'tipo_de_servico' => $tipo_de_servico,
                  'detalhes' => $this->pedido->detalhes,
                  'prestadorId' => $this->prestador->id,
//                'email' => $this->pedido->email,
//                'fone' => $this->pedido->fone,
//                'celular' => $this->pedido->celular,
//                'preferencia' => $this->pedido->preferencia_contato,
            ]);
    }
}
