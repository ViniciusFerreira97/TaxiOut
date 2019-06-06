<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario_viagem extends Model
{
    protected $table = 'Usuario_Viagem';
    protected $primaryKey = 'id_usuario_viagem';

    protected $fillable = [
        'id_viagem',
        'id_passageiro',
        'presenca',
    ];
}
