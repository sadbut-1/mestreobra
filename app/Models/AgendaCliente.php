<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendaCliente extends Model
{
    protected $table = 'agendas';

    protected $fillable = [
        'pedido_id','prestador_id','data','hora','local',
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
