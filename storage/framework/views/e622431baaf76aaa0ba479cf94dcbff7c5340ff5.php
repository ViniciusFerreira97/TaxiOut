<link href="/css/cliente/procurar_viagem.css" rel="stylesheet">
<section class="view" id="procurarViagemView">
    <div class="row top-more-2 titleSection">
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
        <div class="col-7"></div>
        <div class="col-4">
            <div class="md-form">
                <input type="text" id="txtProcurarViagem" class="form-control">
                <label for="txtProcurarViagem" class=""><i class="fas fa-search"></i> Procurar</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="scrollTable">
                <table class="table table-hover yellowTable tableSearch" id="tableViagens">
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
        </div>
    </div>
</section>

<script type="text/javascript" src="/js/cliente/procurar_viagem.js"></script>
<?php /**PATH /var/www/html/TaxiOut/resources/views/cliente/procurar_viagem.blade.php ENDPATH**/ ?>