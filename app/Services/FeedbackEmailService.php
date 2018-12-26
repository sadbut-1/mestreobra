<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 06/03/2017
 * Time: 15:16
 */

namespace App\Services;

use App\Mail\FeedbackCliente;
use App\Models\Pedido;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class FeedbackEmailService
{

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function send()
    {
        $pedidos = $this->pedido->whereDate('created_at','=', Carbon::now()->subDay(1))->get();

        foreach ($pedidos as $pedido)
        {
            Mail::to('eduardommoya@gmail.com')->send(new FeedbackCliente($pedido));
        }
    }
}