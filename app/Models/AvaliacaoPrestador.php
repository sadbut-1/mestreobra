<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoPrestador extends Model
{
    protected $table = 'avaliacao_prestadores';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pedido_id',
        'estrelas',
        'comentario',
        'anonimo'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
