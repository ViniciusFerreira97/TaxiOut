@include('layouts.header')
<link href="{{asset('css/user/login.css')}}" rel="stylesheet" type="text/css">

<div class="row" id="login">
    <div class="col-7 loginMenu">
        <img src="/img/taxiOutIndex1.png" id="imgLogin">
    </div>

    <div class="col-5 inputs">
        <div class="row">
            <form class="hrDiv">
                <div class="row">
                    <div class="col-4">
                        <div class="md-form">
                            <input type="text" class="form-control" id="iptLogin">
                            <label for="iptLogin">Login</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="md-form">
                            <input type="password" class="form-control" id="iptSenha">
                            <label for="iptSenha">Senha</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="md-form">
                            <button id="btnLogin" type="button" class="btn btn-yellow btn-sm">Entrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <hr>
        <form id="ContainerFormInicial">
            <div class="row margin2">
                <div class="col-2"></div>
                <div class="col">
                    <img src="/img/taxiPng.png" id="miniTaxiInicial">
                </div>
            </div>
            <div class="row margin1">
                <div class="col-2"></div>
                <div class="col-8">
                    <h2 class="font-weight-bold">Taxista ou Cliente, venha viajar pelo mundo agora.</h2>
                    <br>
                    <h5 class="font-weight-bold">Faça parte do TaxiOut</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="md-form">
                        <button type="button" class="btn btn-success btn-lg btn-block" id="btnInscrever">Inscrever-se
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <form class="to-Hide" id="containerInscrever">
            <div class="row text-center">
                <div class="col">
                    <h1>Increver-se</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked type="radio" class="custom-control-input" id="rbnTaxista"
                           name="inlineDefaultRadiosExample">
                    <label class="custom-control-label" for="rbnTaxista">Taxista</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="rbnCliente" name="inlineDefaultRadiosExample">
                    <label class="custom-control-label" for="rbnCliente">Cliente</label>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="md-form">
                        <i class="fas fa-user-plus prefix grey-text"></i>
                        <input type="text" id="nomeInscrever" class="form-control">
                        <label for="nomeInscrever">Nome</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="md-form">
                        <i class="fas fa-unlock prefix grey-text"></i>
                        <input type="password" id="senhaInscrever" class="form-control">
                        <label for="senhaInscrever">Senha</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="md-form">
                        <i class="fas fa-unlock prefix grey-text"></i>
                        <input type="password" id="confirmSenha" class="form-control">
                        <label for="confirmSenha">Confirmar Senha</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="md-form">
                        <i class="fas fa-at prefix grey-text"></i>
                        <input type="text" id="emailInscrever" class="form-control">
                        <label for="emailInscrever">Email</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-4">
                    <button type="button" id="btnCadastrar" class="btn btn-yellow btn-sm">Inscrever-se</button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-deep-orange btn-sm" id="btnVoltar">Voltar</button>
                </div>
            </div>
        </form>
    </div>

    @include('layouts.footer')
    <script type="text/javascript" src="/js/login.js"></script>
