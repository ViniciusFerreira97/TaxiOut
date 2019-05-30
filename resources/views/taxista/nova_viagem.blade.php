<link href="/css/taxista/nova_viagem.css" rel="stylesheet">
<div class="row top-more-2">
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
                <i class="fas fa-map-marked-alt"></i> Ponto inicial
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
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="bairroInicial" class="form-control">
                        <label for="bairroInicial">Bairro</label>
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
                        <input type="text" value="Belo Horizonte" id="cidadeInicial" class="form-control">
                        <label for="cidadeInicial">Cidade</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="md-form">
                        <select class="mdb-select form-control" id="ufInicial">
                            <option value="" disabled>UF</option>
                            <option value="MG">MG</option>
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
                <i class="fas fa-map-marked"></i> Ponto final
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
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="bairroFinal" class="form-control">
                        <label for="bairroFinal">Bairro</label>
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
                        <input type="text" value="Belo Horizonte" id="cidadeFinal" class="form-control">
                        <label for="cidadeFinal">Cidade</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="md-form">
                        <select class="mdb-select form-control">
                            <option value="" disabled>UF</option>
                            <option value="MG">MG</option>
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

        <div class="row">
            <div class="col">
                <div class="md-form">
                    <input type="number" value="4.5" id="precoCriarViagem" class="form-control">
                    <label for="precoCriarViagem"> <i class="fas fa-money-bill-wave"></i> Preço da viagem (R$)</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="md-form">
                    <input type="number" value="4" id="capacidadeCriarViagem" class="form-control">
                    <label for="capacidadeCriarViagem"> <i class="fas fa-users"></i> Capacidade de passageiros para a viagem</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="md-form">
                    <input type="text" value="08:00" id="horarioCriarViagem" class="form-control">
                    <label for="horarioCriarViagem"> <i class="far fa-clock"></i> Horário de saída</label>
                </div>
            </div>
            <div class="col-6">
                <div class="md-form">
                    <input type="text" id="dataCriarViagem" class="form-control">
                    <label for="dataCriarViagem"> <i class="far fa-calendar-alt"></i> Data de saída</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5"></div>
            <div class="col">
                <button type="button" class="btn btn-success" id="btnAgendarViagem">Agendar viagem</button>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col">
        <div id="map">

        </div>
    </div>
</div>

<script type="text/javascript" src="/js/taxista/nova_viagem.js"></script>
<!-- AIzaSyCqw6U1Puw1OUsO0ezJs0F2GNFRaX7eb9k -->
