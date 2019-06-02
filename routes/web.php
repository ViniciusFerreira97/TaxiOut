<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.login');
});
Route::get('/home', function(){
   return view(strtolower(Session::get('tipo_usuario').'.template'));
});

Route::put('/usuarios/login','UserController@login');
Route::get('/usuarios/sair',function(){
    \Illuminate\Support\Facades\Session::flush();
});
Route::post('/usuarios','UserController@CadastrarUsuario');
Route::get('/usuarios','UserController@getNome');


Route::post('/motoristas/veiculos','MotoristaController@alterarVeiculo');
Route::put('/motoristas/veiculos','MotoristaController@alterarVeiculo');
Route::get('/motoristas/veiculos','MotoristaController@getVeiculoDados');
Route::post('/motoristas/viagens','MotoristaController@cadastrarViagem');


Route::get('/viagens','ViagemController@getViagens');
