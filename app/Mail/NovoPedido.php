<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Pedido;

class NovoPedido extends Mailable
{
    use Queueable, SerializesModels;

    private $pedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
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

        return $this->view('mails.pedido.novo')
            ->with([
                  'hash' => $this->pedido->hash,
                  'id' => $this->pedido->id,
                  'nome' => $this->pedido->nome,
                  'categoria' => $this->pedido->categoria->nome,
                  'tipo_de_servico' => $tipo_de_servico,
                  'detalhes' => $this->pedido->detalhes,
//                'email' => $this->pedido->email,
//                'fone' => $this->pedido->fone,
//                'celular' => $this->pedido->celular,
//                'preferencia' => $this->pedido->preferencia_contato,
            ]);
    }
}
