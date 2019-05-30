<link href="/css/cliente/procurar_viagem.css" rel="stylesheet">
<section class="view" id="procurarViagemView">
    <div class="row top-more-2">
        <div class="col-4"></div>
        <div class="col">
            <h2>Procurar Viagem</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <hr class="especial">
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            Filtros:
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2">
            <div class="md-form">
                <input type="text" id="txtTaxista" class="form-control">
                <label for="txtTaxista" class="">Motorista</label>
            </div>
        </div>
        <div class="col-2">
            <div class="md-form">
                <input type="text" id="txtData" class="form-control">
                <label for="txtData" class="">Data</label>
            </div>
        </div>
        <div class="col-2">
            <div class="md-form">
                <input type="text" id="txtOrigem" class="form-control">
                <label for="txtOrigem" class="">Origem</label>
            </div>
        </div>
        <div class="col-2">
            <div class="md-form">
                <input type="text" id="txtDestino" class="form-control">
                <label for="txtDestino" class="">Destino</label>
            </div>
        </div>
        <div class="col-1">
            <div class="md-form">
                <button type="button" class="btn btn-sm btn-outline-success">Filtrar</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover yellowTable" id="tableViagens">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Taxista</th>
                <th scope="col">Data</th>
                <th scope="col">Origem</th>
                <th scope="col">Destino</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>Larry the Bird</td>
                <td>@twitter</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<script type="text/javascript" src="/js/cliente/procurar_viagem.js"></script>
