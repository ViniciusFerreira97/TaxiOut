<link href="/css/taxista/estatisticas.css" rel="stylesheet">
<section class="view toHide" id="estatisticasTaxView">
    <div class="row top-more-2 text-center">
        <div class="col">
            <h2>Estatisticas</h2>
        </div>
    </div>
    <div class="row top-more-2">
        <div class="col-3"></div>
        <div class="col-md-6">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <hr>
        </div>
    </div>
    <div class="row text-center top-more-4">
        <div class="col">
            <h3>Listagem de Viagens</h3>
        </div>
    </div>
    <div class="row top-more-2 left-more-1">
        <table class="table table-hover " id="tableRealizadasTax">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Taxista</th>
                <th scope="col">Data</th>
                <th scope="col">Origem</th>
                <th scope="col">Destino</th>
                <th scope="col">Tarifa</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</section>

<script type="text/javascript" src="/js/taxista/estatisticas.js"></script>
<?php /**PATH /var/www/html/TaxiOut/resources/views/taxista/estatisticas.blade.php ENDPATH**/ ?>