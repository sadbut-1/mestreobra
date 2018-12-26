<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN = 1;
    const USER = 2;
    const CLIENT = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','hash'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function empresa()
    {
        return $this->hasOne(Prestador::class,'usuario_id');
    }

    public function acessos()
    {
        return $this->hasMany(LogAcesso::class,'user_id');
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class,'usuario_id');
    }
}
