<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Cliente extends Model
{
    protected $table ='clientes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id',
        'cep',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'complemento',
        'telefone',
        'celular',
        'empresa',
        'registro'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class,'usuario_id');
    }

}
