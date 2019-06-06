<?php

namespace App\Http\Controllers;
use App\viagem;
use App\ponto_rota;
use App\nome_ponto;
use App\usuario_viagem;
use DB;

use Illuminate\Http\Request;

class ViagemController extends Controller
{
    public function getViagens(Request $request){
        $filtro = $request->query('finalizadas');
        if(isset($filtro) && $filtro)
            $viagens = DB::table('Viagem as v')
                ->join('Usuario as u','u.id_usuario','=','v.id_motorista')
                ->where('v.status','=',1)
                ->get();
        else
            $viagens = DB::table('Viagem as v')
                ->join('Usuario as u','u.id_usuario','=','v.id_motorista')
                ->get();
        $return['success'] = true;
        $cont = 0;
        foreach ($viagens as $viagem){
            $return['data'][$cont]['id'] = $viagem->id_viagem;
            $return['data'][$cont]['tarifa'] = $viagem->tarifa;
            $return['data'][$cont]['nome'] = $viagem->nome;
            $return['data'][$cont]['hora'] = $viagem->hora;
            $return['data'][$cont]['data'] = $viagem->data;
            $np = new nome_ponto();
            $inicial = $np->where('id_viagem',$viagem->id_viagem)->where('tipo_ponto','Inicial')->first();
            $return['data'][$cont]['OrigemLogradouro'] = isset($inicial->logradouro) ? $inicial->logradouro : '';
            $return['data'][$cont]['OrigemNumero'] = isset($inicial->numero) ? $inicial->numero : '';
            $return['data'][$cont]['OrigemBairro'] = isset($inicial->bairro) ? $inicial->bairro : '';
            $return['data'][$cont]['OrigemCep'] = isset($inicial->cep) ? $inicial->cep : '';
            $return['data'][$cont]['OrigemCidade'] = isset($inicial->cidade) ? $inicial->cidade : '';
            $return['data'][$cont]['OrigemUf'] = isset($inicial->estado) ? $inicial->estado : '';
            $np = new nome_ponto();
            $final = $np->where('id_viagem',$viagem->id_viagem)->where('tipo_ponto','Final')->first();
            $return['data'][$cont]['FinalLogradouro'] = isset($final->logradouro) ? $final->logradouro : '';
            $return['data'][$cont]['FinalNumero'] = isset($final->numero) ? $final->numero : '';
            $return['data'][$cont]['FinalBairro'] = isset($final->bairro) ? $final->bairro : '';
            $return['data'][$cont]['FinalCep'] = isset($final->cep) ? $final->cep : '';
            $return['data'][$cont]['FinalCidade'] = isset($final->cidade) ? $final->cidade : '';
            $return['data'][$cont]['FinalUf'] = isset($final->estado) ? $final->estado : '';
            $cont++;
        }
        return $return;
    }

    public function getRotaViagem(Request $request){
        $pr = new ponto_rota();
        $pontos = $pr->where('id_viagem','=',$request->query('idViagem'))->orderBy('sequencia')->get();
        $result['data'] = [];
        $cont = 0;
        foreach ($pontos as $p){
            $result['data'][$cont]['lat'] = $p->latitude;
            $result['data'][$cont]['long'] = $p->longitude;
            $cont++;
        }

        return $result;
    }
    public function getUsuariosViagem(Request $request)
    {
        $usu = new usuario_viagem();
        $usuarios = $usu->where('id_viagem','=',$request->query('idViagem'))->join('usuario as u', 'id_passageiro', '=', 'u.id_usuario')->get();
        $result['data'] = [];
        $cont = 0;
        foreach ($usuarios as $u){
            $result['data'][$cont]['id'] = $u->id_usuario;
            $result['data'][$cont]['nome'] = $u->nome;
            $cont++;
        }
        return $result;
    }

    public function salvarPassageiros(Request $request)
    {
        $result['resposta'] = true;
        if(!isset($request->passageiros))
        {
            $result['resposta'] = false;
            return $result;
        }
        for($i=0; $i< count($request->passageiros); $i++)
        {
            $usu = usuario_viagem::where('id_passageiro', '=', $request->passageiros[$i])->find($request->id_viagem);
            $usu->presenca = '1';
            $usu->save();
        }
        return $result;
    }
}
