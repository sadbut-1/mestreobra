<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestadorFoto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'prestador_fotos';

    protected $fillable = [
        'prestador_id','foto', 'descricao'
    ];

    public function prestador()
    {
        return $this->belongsTo(Prestador::class,'prestador_id');
    }

}
