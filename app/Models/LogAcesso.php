<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAcesso extends Model
{
    protected $table = 'log_acessos';
    /**
     * Esta tabela registra todas as entradas do profissionais na plataforma. É possível ver a contagem de acesso
     * na página administrativa no menu usuários.
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
