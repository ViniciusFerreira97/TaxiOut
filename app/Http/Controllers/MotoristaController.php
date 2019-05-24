<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\veiculo as veiculo;
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
}
