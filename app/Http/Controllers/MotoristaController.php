<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\veiculo as veiculo;
use App\viagem as viagem;
use App\ponto_rota as pontoRota;
use App\nome_ponto as nomePonto;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Session;

class MotoristaController extends Controller
{
    //

    public function alterarVeiculo(Request $request){
        $rules = [
            'marca' => 'required',
            'modelo' => 'required',
            'placa' => 'required',
            'cor' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $return['success'] = false;
            $return['data'] = $validator->errors()->all();
            return $return;
        }
        $return['success'] = true;
        $veiculo = veiculo::where('id_motorista','=',Session::get('id_usuario'))->first();
        if(!isset($veiculo) || $veiculo == ''){
            $veiculo = new veiculo();
            $veiculo->placa = $request->placa;
            $veiculo->modelo = $request->modelo;
            $veiculo->marca = $request->marca;
            $veiculo->cor = $request->cor;
            $veiculo->id_motorista = Session::get('id_usuario');
            $veiculo->save();
            return $return;
        }

        $veiculo->placa = $request->placa;
        $veiculo->modelo = $request->modelo;
        $veiculo->marca = $request->marca;
        $veiculo->cor = $request->cor;
        $veiculo->save();
        return $return;
    }

    public function getVeiculoDados(){
        $veiculo = veiculo::where('id_motorista','=',Session::get('id_usuario'))->first();
        if(!isset($veiculo) || $veiculo == ''){
            $return['success'] = false;
            return $return;
        }
        $return['success'] = true;
        $return['data']['placa'] = $veiculo->placa;
        $return['data']['modelo'] = $veiculo->modelo;
        $return['data']['cor'] = $veiculo->cor;
        $return['data']['marca'] = $veiculo->marca;
        return $return;
    }

    public function cadastrarViagem(Request $request){
        $veiculoCriado = veiculo::where('id_motorista','=',Session::get('id_usuario'))->count();
        if($veiculoCriado < 1)
        {
            $return['success'] = false;
            return $return;
        }
        $viagem = new viagem();
        $viagem->tarifa = $request->preco;
        $viagem->capacidade = $request->capacidade;
        $viagem->hora = $request->hora;
        $viagem->data = $request->data;
        $viagem->id_motorista = Session::get('id_usuario');
        $viagem->save();

        $coords = json_decode($request->coords);
        $sequencia = 1;
        foreach ($coords as $c){
            $pontoRota = new pontoRota();
            $pontoRota->latitude = $c->lat;
            $pontoRota->longitude = $c->long;
            $pontoRota->sequencia = $sequencia;
            $pontoRota->id_viagem = $viagem->id_viagem;
            $pontoRota->save();
            $sequencia++;
        }
        $pontoRota = new pontoRota();
        $id = $pontoRota->where('id_viagem',$viagem->id_viagem)->where('sequencia',1)->pluck('id_ponto_rota')->first();
        $nomePonto = new nomePonto();
        $nomePonto->id_ponto_rota = $id;
        $nomePonto->logradouro = $request->origemLogradouro;
        $nomePonto->bairro = $request->origemBairro;
        $nomePonto->numero = $request->origemNumero;
        $nomePonto->cep = $request->origemCep;
        $nomePonto->cidade = $request->origemCidade;
        $nomePonto->estado = $request->origemUf;
        $nomePonto->tipo_ponto = 'Inicial';
        $nomePonto->id_viagem = $viagem->id_viagem;
        $nomePonto->save();
        $nomePonto = new nomePonto();
        $id = $pontoRota->where('id_viagem',$viagem->id_viagem)->where('sequencia',$sequencia-1)->pluck('id_ponto_rota')->first();
        $nomePonto->id_ponto_rota = $id;
        $nomePonto->logradouro = $request->destinoLogradouro;
        $nomePonto->bairro = $request->destinoBairro;
        $nomePonto->numero = $request->destinoNumero;
        $nomePonto->cep = $request->destinoCep;
        $nomePonto->cidade = $request->destinoCidade;
        $nomePonto->estado = $request->destinoUf;
        $nomePonto->tipo_ponto = 'Final';
        $nomePonto->id_viagem = $viagem->id_viagem;
        $nomePonto->save();

        $return['success'] = true;
        return $return;
    }
}
