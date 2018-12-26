<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prestador_id', 'interesses','data','valor'
    ];


    public function prestador()
    {
        return $this->belongsTo(Prestador::class,'prestador_id');
    }


}
