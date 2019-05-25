<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viagem extends Model
{
    protected $table = 'Viagem';
    protected $primaryKey = 'id_viagem';

    protected $fillable = [
        'tarifa',
        'capacidade',
        'hora',
        'data',
        'id_motorista'
    ];
}
