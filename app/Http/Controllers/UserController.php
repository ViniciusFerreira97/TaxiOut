<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\usuario as Usuario;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function sair(){

    }

    public function login(Request $request)
    {
        $verificaLogin = Usuario::where('email','=',$request->email)->where('senha','=',$request->senha);
        $return = array();

        if($verificaLogin->count() > 0)
        {
            $return['success'] = true;
            $return['data'][] = 'Login Efetuado';
            
            $tipo_usuario = Usuario::where('email',$request->email )->pluck('tipo')->first();
            Session::put('tipo_usuario',$tipo_usuario);
            $id_usuario = Usuario::where('email',$request->email )->pluck('id_usuario')->first();
            $user = Usuario::find($id_usuario);
            $user->ultimo_login = date('d-m-Y');
            $user->save();
            Session::put('id_usuario',$id_usuario);
            return $return;
        }
        else{
            $return['success'] = false;
            $return['data'][] = 'Usuário ou senha incorretos';
            return $return;
        }
    }

    public function CadastrarUsuario(Request $request){
        $return = array();
        $rules = array(
            'nome' => 'required',
            'email' => 'required|email',
            'senha' => 'required',
            'tipoUsu' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $return['success'] = false;
            $return['data'] = $validator->errors()->all();
            return $return;
        }

        $existenciaEmail = \App\usuario::where('email','=',$request->email)->get();
        if($existenciaEmail->count() < 1){
            $usuario = new usuario;
            $usuario->email = $request->email;
            $usuario->senha = $request->senha;
            $usuario->nome = $request->nome;
            $usuario->tipo = $request->tipoUsu;
            $usuario->save();

            $return['success'] = true;
            return $return;
        }else{
            $return['success'] = false;
            $return['data'][] = 'Email já em uso.';
            return $return;
        }
    }

    public function getNome(){
        $user = Usuario::find(Session::get('id_usuario'));
        if(!isset($user) || $user == ''){
            $return['success'] = false;
            return $return;
        }
        $return['success'] = true;
        $return['data'] = $user->nome;
        return $return;
    }
}
