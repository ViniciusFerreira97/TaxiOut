<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ponto_rota extends Model
{
    protected $table = 'Ponto_rota';
    protected $primaryKey = 'id_ponto_rota';

    protected $fillable = [
        'latitude',
        'longitude',
        'sequencia',
        'id_viagem',
    ];
}
