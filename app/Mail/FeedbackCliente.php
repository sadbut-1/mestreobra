<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Pedido;
//use App\Models\Prestador;

class FeedbackCliente extends Mailable
{
    use Queueable, SerializesModels;

    private $pedido;
    //private $prestador;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
        //$this->prestador = $prestador;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('contato@mestreobra.com.br','Mestre Obra')
            ->subject('Encontrou o profissional desejado?')->view('mails.pedido.feedback')
            ->cc('eduardommoya@gmail.com', 'Mestre Obra')
            ->with([
                  'hash' => $this->pedido->hash,
                  'id' => $this->pedido->id,
                  'nome' => $this->pedido->nome,
                  'categoria' => $this->pedido->categoria->nome,
                  'detalhes' => $this->pedido->detalhes,
                  //'prestadorId' => $this->prestador->id,
            ]);
    }
}
