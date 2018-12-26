<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Pedido;

class CompartilharPedido extends Mailable
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

        return $this->view('mails.pedido.compartilhar')
            ->with([
                  'hash' => $this->pedido->hash,
                  'id' => $this->pedido->id,
                  'nome' => $this->pedido->nome,
                  'categoria' => $this->pedido->categoria->nome,
                  'detalhes' => $this->pedido->detalhes,
//                'email' => $this->pedido->email,
            ]);
    }
}
