<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use Socialite;
use App\Http\Controllers\UserController;

class GoogleController extends Controller
{
    //

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return view('user.login');
            //return redirect('/home');
        }
        // check if they're an existing user
        $existingUser = usuario::where('email', $user->email)->first();
        if(!$existingUser){
            // create a new user
            $newUser                  = new usuario();
            $newUser->nome            = $user->name;
            $newUser->email           = $user->email;
            $newUser->senha           = sha1($newUser->nome);
            $newUser->tipo            = 'Cliente';
            //$newUser->google_id       = $user->id;
            $newUser->save();
        }
        $tipo_usuario = Usuario::where('email',$user->email)->pluck('tipo')->first();
        Session::put('tipo_usuario',$tipo_usuario);
        $id_usuario = Usuario::where('email',$user->email)->pluck('id_usuario')->first();
        Session::put('id_usuario',$id_usuario);
        $user = Usuario::find($id_usuario);
        $user->ultimo_login = date('d-m-Y');
        $user->save();
        return redirect()->to('/home');
    }
}
