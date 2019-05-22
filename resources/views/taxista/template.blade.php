@include('layouts.header')
<nav class="navbar navbar-expand-lg navbar-dark yellow double-nav scrolling-navbar">
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
                    <i class="fas fa-taxi"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> Perfil
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default"
                     aria-labelledby="navbarDropdownMenuLink-333">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<main>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            @include('taxista.nova_viagem')
        </div>
    </div>


</main>
