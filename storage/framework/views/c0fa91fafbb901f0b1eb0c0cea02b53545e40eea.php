<link href="<?php echo e(asset('css/user/login.css')); ?>" rel="stylesheet" type="text/css">
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row" id="login">
    <div class="col-7 loginMenu">
        <img src="/img/Koala.jpg" id="imgLogin">
    </div>

    <div class="col-5 inputs">
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
                    <button type="button" class="btn btn-yellow btn-sm">Entrar</button>
                </div>
            </div>
        </div>
    </form>  
    <hr>

    <form id="containerInscrever">
        <div class="row text-center">
            <div class="col">
                <h1>Increver-se</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6"><hr></div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="custom-control custom-radio custom-control-inline">
                <input checked type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
                <label class="custom-control-label" for="defaultInline1">Taxista</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
                <label class="custom-control-label" for="defaultInline2">Cliente</label>
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
            <div class="col-4"></div>
            <div class="col-4">
                    <div class="md-form">
                        <button type="button" class="btn btn-yellow btn-sm">Inscrever-se</button>
                    </div>
            </div>
        </div>
    </form>
</div>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript" src="/js/login.js"></script><?php /**PATH C:\Users\Vinicius\Desktop\TaxiLotação\TaxiLotacao\resources\views/user/login.blade.php ENDPATH**/ ?>