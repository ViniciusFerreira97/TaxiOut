<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<meta name="google-site-verification" content="cGuR1sDmtt_NPoRw89WZh7H8Ag65aU-EPmWqCOTN4r4" />
<link href="<?php echo e(asset('css/user/login.css')); ?>" rel="stylesheet" type="text/css">

<div class="row" id="login">
    <div class="col-7 loginMenu">
        <img src="img/taxiOutIndex1.png" id="imgLogin">
    </div>

    <div class="col-5 inputs">
        <form>
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
        <hr>
        <form id="ContainerFormInicial">
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <img src="img/taxiPng.png" id="miniTaxiInicial">
                </div>
            </div>
            <div class="row">
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
                        <button type="button" class="btn btn-success btn-lg btn-block" id="btnInscrever">
                            <i class="fas fa-taxi"></i> <span class="left-more-3"> Inscrever-se</span>
                        </button>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <a href="<?php echo e(url('/google')); ?>" class="btn btn-lg btn-danger btn-block">
                            <i class="fab fa-google"></i> <span class="left-more-3"> Entrar com o Google </span>
                        </a>
                    </div>
                </div>
        </form>

        <form class="to-Hide" id="containerInscrever">
            <div class="row text-center">
                <div class="col">
                    <h1>Inscrever-se</h1>
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
                    <button type="button" id="btnCadastrar" class="btn btn-yellow btn-sm">Inscrever</button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-deep-orange btn-sm" id="btnVoltar">Voltar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript" src="js/login.js"></script>
<?php /**PATH /var/www/html/TaxiOut/resources/views/user/login.blade.php ENDPATH**/ ?>