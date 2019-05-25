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

Route::post('/usuario/login','UserController@login');
Route::post('/usuario/cadastrar','UserController@CadastrarUsuario');
Route::get('/usuario/getNome','UserController@getNome');


Route::post('/motorista/alterarVeiculo','MotoristaController@alterarVeiculo');
Route::get('/motorista/getVeiculoDados','MotoristaController@getVeiculoDados');
Route::post('/motorista/cadastrarViagem','MotoristaController@cadastrarViagem');
