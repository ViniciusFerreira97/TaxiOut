<?php

namespace App\Http\Controllers;
use App\viagem;
use App\ponto_rota;
use App\nome_ponto;
use App\usuario_viagem;
use Mockery\Exception;
use Session;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;

class ViagemController extends Controller
{
    public function getViagens(Request $request){
        $query = DB::table('Viagem as v')
            ->join('Usuario as u','u.id_usuario','=','v.id_motorista');
        $filtro = $request->query('finalizadas');
        $user = $request->query('user');
        $mes = $request->query('mes');
        if(isset($filtro))
            $query->where('v.status','=',1);
        else
            $query->where('v.status','=',0);
        if(isset($user) && Session::get('tipo_usuario') == 'Taxista'){
            $query->where('v.id_motorista','=',Session::get('id_usuario'))
                ->where('v.status','=',1);
        }
        elseif(isset($user)){
            $query->join('Usuario_Viagem as uv','uv.id_viagem','=','v.id_viagem')
                ->where('uv.id_passageiro','=',Session::get('id_usuario'))
                ->where('uv.presenca','=',1);
        }

        $backup = clone $query;
        $viagens = $query->get();
        $return['success'] = true;
        $return['data'] = [];
        $cont = 0;
        foreach ($viagens as $viagem){
            if(isset($mes)){
                try{
                    $data = new Carbon($viagem->data);
                    if($data < Carbon::now()->subMonth(6))
                        continue;
                }catch (\Exception $e){
                    
                }
            }
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
            if(!isset($user) && Session::get('tipo_usuario') == 'Cliente'){
                $verificador = clone $backup;
                $verificador->where('uvm.id_passageiro','=',Session::get('id_usuario'))
                    ->where('v.id_viagem','=',$viagem->id_viagem)
                    ->join('Usuario_Viagem as uvm','uvm.id_viagem','=','v.id_viagem');
                if($verificador->count() > 0)
                    $return['data'][$cont]['Reservado'] = true;
                else
                    $return['data'][$cont]['Reservado'] = false;
            }

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

    public function reservarEmViagem(Request $request){
        $uv = usuario_viagem::where('id_passageiro','=',Session::get('id_usuario'))
            ->where('id_viagem','=',$request->idViagem);
        if($uv->count() < 1){
            $uv = new usuario_viagem();
            $uv->id_viagem = $request->idViagem;
            $uv->id_passageiro = Session::get('id_usuario');
            $uv->save();
        }
        $retorno['success'] = true;
        return $retorno;
    }

    public function deletarEmViagem(Request $request){
        $idViagem = $request->query("idViagem");
        DB::table('Usuario_Viagem')->where('id_viagem','=',$idViagem)
            ->where('id_passageiro','=',Session::get('id_usuario'))
            ->delete();
        $retorno['success'] = true;
        return $retorno;
    }
    public function getUsuariosViagem(Request $request)
    {
        $usu = new usuario_viagem();
        $usuarios = $usu->where('id_viagem','=',$request->query('idViagem'))
            ->join('Usuario as u', 'id_passageiro', '=', 'u.id_usuario')
            ->get();
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
            $usu = usuario_viagem::where('id_passageiro', '=', $request->passageiros[$i])
                ->where('id_viagem','=',$request->id_viagem)->select('id_usuario_viagem')->first();
            $usu = usuario_viagem::find($usu->id_usuario_viagem);
            $usu->presenca = '1';
            $usu->save();
        }
        $viagem = viagem::find($request->id_viagem);
        $viagem->status = 1;
        $viagem->save();
        return $result;
    }
}
