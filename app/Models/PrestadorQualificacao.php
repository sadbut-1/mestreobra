<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestadorQualificacao extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'prestador_qualificacoes';

    protected $fillable = [
        'prestador_id','qualificacao', 'padrao', 'detalhes'
    ];

    public function prestador()
    {
        return $this->belongsTo(Prestador::class,'prestador_id');
    }

}
