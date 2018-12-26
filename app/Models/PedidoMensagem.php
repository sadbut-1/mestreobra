<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoMensagem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pedido_mensagens';

    protected $fillable = [
        'pedido_id','prestador_id','mensagem','lido','cliente'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'pedido_id');
    }

    public function prestador()
    {
        return $this->belongsTo(Prestador::class,'prestador_id');
    }

}
