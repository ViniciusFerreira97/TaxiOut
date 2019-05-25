<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqw6U1Puw1OUsO0ezJs0F2GNFRaX7eb9k&callback=initMap"
        async defer></script>
<div class="row top-more-3">
    <div class="col-4"></div>
    <div class="col">
        <h2>Agendamento de viagem</h2>
    </div>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <hr class="especial">
    </div>
</div>
<div class="row top-more-5 menuItems">
    <div class="col-4">
        <div class="row" id="controlCamposInicial">
            <div class="col-10">
                <a href="#">Ponto inicial</a>
            </div>
            <div class="col"><i class="fas fa-angle-right" id="iControlInicial"></i></div>
        </div>
        <div class="row">
            <div class="col">
                <hr>
            </div>
        </div>
        <section id="camposPontoInicial" class="toHide">
            <div class="row">
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="logradouroInicial" class="form-control">
                        <label for="logradouroInicial">Logradouro</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="md-form">
                        <input type="number" id="numeroInicial" class="form-control">
                        <label for="numeroInicial">Número</label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="md-form">
                        <input type="text" id="cepInicial" class="form-control">
                        <label for="cepInicial">CEP</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="md-form">
                        <input type="text" id="cidadeInicial" class="form-control">
                        <label for="cidadeInicial">Cidade</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="md-form">
                        <select class="mdb-select form-control">
                            <option value="" disabled selected>UF</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
        </section>
        <div class="row top-more-4" id="controlCamposFinal">
            <div class="col-10">
                <a href="#">Ponto final</a>
            </div>
            <div class="col"><i class="fas fa-angle-right" id="iControlFinal"></i></div>
        </div>
        <div class="row">
            <div class="col">
                <hr>
            </div>
        </div>
        <section id="camposPontoFinal" class="toHide">
            <div class="row">
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="logradouroFinal" class="form-control">
                        <label for="logradouroFinal">Logradouro</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="md-form">
                        <input type="number" id="numeroFinal" class="form-control">
                        <label for="numeroFinal">Número</label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="md-form">
                        <input type="text" id="cepFinal" class="form-control">
                        <label for="cepFinal">CEP</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="md-form">
                        <input type="text" id="cidadeFinal" class="form-control">
                        <label for="cidadeFinal">Cidade</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="md-form">
                        <select class="mdb-select form-control">
                            <option value="" disabled selected>UF</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
        </section>

        <div class="row top-more-5">
            <div class="col">
                <div class="md-form">
                    <input type="number" id="precoCriarViagem" class="form-control">
                    <label for="precoCriarViagem">Preço da viagem (R$)</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="md-form">
                    <input type="number" id="capacidadeCriarViagem" class="form-control">
                    <label for="capacidadeCriarViagem">Capacidade de passageiros para a viagem</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-7">
        <div id="map">

        </div>
    </div>
</div>

<script type="text/javascript" src="/js/taxista/nova_viagem.js"></script>
<!-- AIzaSyCqw6U1Puw1OUsO0ezJs0F2GNFRaX7eb9k -->
<?php /**PATH /var/www/html/TaxiOut/resources/views/taxista/nova_viagem.blade.php ENDPATH**/ ?>