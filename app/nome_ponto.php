<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nome_ponto extends Model
{
    protected $table = 'Nome_Ponto';
    protected $primaryKey = 'id_nome_ponto';

    protected $fillable = [
        'logradouro',
        'bairro',
        'numero',
        'cep',
        'cidade',
        'estado',
        'id_ponto_rota',
        'tipo_ponto',
    ];
}
