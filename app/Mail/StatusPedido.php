<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Pedido;

class StatusPedido extends Mailable
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

        return $this->from('contato@mestreobra.com.br','Mestre Obra')
            ->subject('Encontrou o profissional que precisava?')->view('mails.pedido.status')
            ->bcc('contatomestreobra@gmail.com', 'Mestre Obra')
            ->with([
                  'hash' => $this->pedido->hash,
                  'id' => $this->pedido->id,
                  'nome' => $this->pedido->nome,
                  'categoria' => $this->pedido->categoria->nome,
                  'detalhes' => $this->pedido->detalhes,
                  'visualizacoes' => $this->pedido->visitas
            ]);
    }
}
