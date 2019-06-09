<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usuario extends Model
{
    use HasApiTokens, Notifiable;
    protected $table = 'Usuario';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'tipo',
        'ultimo_login'
    ];
}
