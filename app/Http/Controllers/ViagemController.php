<?php

namespace App\Http\Controllers;
use App\viagem;
use DB;

use Illuminate\Http\Request;

class ViagemController extends Controller
{
    public function getViagens(){
        $viagens = DB::table('Viagem as v')
            ->join('Usuario as u','u.id_usuario','=','v.id_motorista')->get();
        $return['success'] = true;
        $cont = 0;
        foreach ($viagens as $viagem){
            $return['data'][$cont]['id'] = $viagem->id_viagem;
            $return['data'][$cont]['tarifa'] = $viagem->tarifa;
            $return['data'][$cont]['nome'] = $viagem->nome;
            $return['data'][$cont]['hora'] = $viagem->hora;
            $return['data'][$cont]['data'] = $viagem->data;
            $cont++;
        }
        return $return;
    }
}
