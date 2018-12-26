<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class LogEmailSituacaoPedido extends Model
{
    protected $table = 'log_email_situacao_pedidos';
    /**
     * Esta tabela registra quando um profissional acessou o site para visualizar mais detalhes do pedido.
     *
     * @var array
     */
    protected $fillable = [
        'pedido_id'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'pedido_id');
    }

}
