<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class veiculo extends Model
{
    protected $table = 'Veiculo';
    protected $primaryKey = 'id_veiculo';

    protected $fillable = [
        'placa',
        'modelo',
        'cor',
        'marca',
        'id_motorista'
    ];
}
