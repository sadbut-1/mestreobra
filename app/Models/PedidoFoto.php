<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoFoto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pedido_fotos';

    protected $fillable = [
        'pedido_id','foto',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'pedido_id');
    }

}
