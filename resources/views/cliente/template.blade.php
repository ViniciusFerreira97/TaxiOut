@include('layouts.header')
<link href="/TimePicker/mdtimepicker.css" rel="stylesheet">
<script src="/mask/src/jquery.mask.js"></script>

<nav class="mb-1 navbar navbar-expand-lg navbar-dark green accent-3">
    <a class="navbar-brand" href="#">
        <img src="/img/logotipoAvulso.png" height="30" alt="FactOut Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContentUser"
            aria-controls="navContentUser" aria-expanded="false" aria-label="Toggle navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navContentUser">
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light">
                    <i class="fas fa-search"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light">
                    <i class="fas fa-chart-line"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> <span id="spanNomeUsuario"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default"
                     aria-labelledby="navbarDropdownMenuLink-333">
                    <a class="dropdown-item" href="#">Alterar Dados</a>
                    <a class="dropdown-item" href="#">Sair</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<main>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            @include('cliente.procurar_viagem')
        </div>
    </div>
</main>
<script src="/TimePicker/mdtimepicker.js"></script>
<script type="text/javascript" src="/js/usuario.js"></script>
@include('layouts.footer')