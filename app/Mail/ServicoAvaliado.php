<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;

class ServicoAvaliado extends Mailable
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
            ->subject('Seu serviço foi avaliado pelo cliente')->view('mails.pedido.avaliado')
            ->cc('eduardommoya@gmail.com', 'Mestre Obra')
            ->with([
                  'nome' => $this->pedido->prestador[0]->nome,
                  'detalhes' => $this->pedido->detalhes,
                  'estrelas' => $this->pedido->avaliacao[0]->estrelas,
                  'comentario' => $this->pedido->avaliacao[0]->comentario,
                  'prestadorId' => $this->pedido->prestador[0]->id,
            ]);
    }
}
