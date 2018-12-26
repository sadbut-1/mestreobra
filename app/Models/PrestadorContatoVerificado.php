<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestadorContatoVerificado extends Model
{

    protected $table = 'prestador_contato_verificado';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prestador_id',
        'pedido_id'
    ];

    public function pedido()
    {
        return $this->belongsToMany(Pedido::class,'pedido_prestador');
    }
}
