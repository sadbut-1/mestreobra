<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoInteressado extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pedido_interessados';

    protected $fillable = [
        'pedido_id','prestador_id','interesse','contato','mensagem', 'verificado'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'pedido_id');
    }

    public function prestador()
    {
        return $this->belongsTo(Prestador::class,'prestador_id');
    }

    public function mensagens()
    {
        return $this->hasMany(PedidoMensagem::class,'prestador_id');
    }

}
