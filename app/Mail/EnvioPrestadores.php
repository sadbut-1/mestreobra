<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Pedido;
use App\Models\Prestador;

class EnvioPrestadores extends Mailable
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

        return $this->from('contato@mestreobra.com.br','Mestre Obra')
            ->subject('Novo Pedido!')->view('mails.pedido.prestadores')
            ->with([
                  'hash' => $this->pedido->hash,
                  'id' => $this->pedido->id,
                  'nome' => $this->pedido->nome,
                  'categoria' => $this->pedido->categoria->nome,
                  'tipo_de_servico' => $tipo_de_servico,
                  'detalhes' => $this->pedido->detalhes,
                  'prestadorId' => $this->prestador->id,
//                'email' => $this->pedido->email,
//                'fone' => $this->pedido->fone,
//                'celular' => $this->pedido->celular,
//                'preferencia' => $this->pedido->preferencia_contato,
            ]);
    }
}
