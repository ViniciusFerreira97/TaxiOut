<div class="modal fade mAmber" id="inserirVeiculo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100">Inserir/Alterar Veiculo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="md-form">
                            <i class="fas fa-clipboard-list prefix"></i>
                            <input type="text" id="marcaVeiculo" class="form-control">
                            <label for="marcaVeiculo">Marca Veículo</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="md-form">
                            <i class="fas fa-taxi prefix"></i>
                            <input type="text" id="modeloVeiculo" class="form-control">
                            <label for="modeloVeiculo">Modelo Veículo</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="md-form">
                            <i class="fas fa-tools prefix"></i>
                            <input type="text" id="placaVeiculo" class="form-control">
                            <label for="placaVeiculo">Placa Veículo</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="md-form">
                            <i class="fas fa-palette prefix"></i>
                            <input type="text" id="corVeiculo" class="form-control">
                            <label for="corVeiculo">Cor Veículo</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <button type="button" class="btn btn-success btn-lg btn-block" id="btnSalvarVeiculo">Salvar Veículo</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-amber btn-sm fechar" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ver Viagem -->
<div class="modal fade" id="modalConfirmarViagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100">Detalhamento Viagem</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-5">
                <div class="row top-more-1">
                    <div class="col-1"></div>
                    <div class="col">
                      <label>Endereço Partida: <span id="ruaPartidaViagem" class="text-muted"></span></label>
                    </div>
                </div>
                <div class="row top-more-3">
                <div class="col-1"></div>
                <div class="col">
                    <label>Endereço Destino: <span id="ruaDestinoViagem" class="text-muted"></span></label>
                </div>
                </div>
                <div class="row top-more-3">
                <div class="col-1"></div>
                <div class="col">
                    <label>Tarifa: <span id="tarifaViagem" class="text-muted"></span></label>
                </div>
                </div>
                <div class="row top-more-3">
                <div class="col-1"></div>
                <div class="col">
                    <label>Hora/Data: <span id="dataViagem" class="text-muted"></span></label>
                </div>
                </div>
                <div class="row top-more-5">
                    <div class="col-1"></div>
                    <div class="col">
                        <label>Selecionar Clientes Presentes:</label>
                    </div>
                </div>
                <div class="row top-more-1 divCheck">
                    <div class="col-1"></div>
                    <div class="col">
                        <div id="rbtCliente1" class="custom-control custom-checkbox toHide">
                            <input type="checkbox" class="custom-control-input toHide " id="cliente1">
                            <label class="custom-control-label" for="cliente1">Teste</label>
                        </div>
                    </div>
                </div>
                <div class="row top-more-1 divCheck">
                    <div class="col-1"></div>
                    <div class="col">
                        <div id="rbtCliente2" class="custom-control custom-checkbox toHide">
                            <input type="checkbox" class="custom-control-input" id="cliente2">
                            <label class="custom-control-label" for="cliente2">Teste</label>
                        </div>
                    </div>
                </div>
                <div class="row top-more-1 divCheck">
                    <div class="col-1"></div>
                    <div class="col">
                        <div id="rbtCliente3" class="custom-control custom-checkbox toHide">
                            <input type="checkbox" class="custom-control-input" id="cliente3">
                            <label class="custom-control-label" for="cliente3">Teste</label>
                        </div>
                    </div>
                </div>
                <div class="row top-more-1 divCheck">
                    <div class="col-1"></div>
                    <div class="col">
                        <div id="rbtCliente4" class="custom-control custom-checkbox toHide">
                            <input type="checkbox" class="custom-control-input" id="cliente4">
                            <label class="custom-control-label" for="cliente4">Teste</label>
                        </div>
                    </div>
                </div>
                <div class="row top-more-1 divCheck">
                    <div class="col-1"></div>
                    <div class="col">
                        <div id="rbtCliente5" class="custom-control custom-checkbox toHide">
                            <input type="checkbox" class="custom-control-input" id="cliente5">
                            <label class="custom-control-label" for="cliente5">Teste</label>
                        </div>
                    </div>
                </div>
                <div class="row top-more-1 divCheck">
                    <div class="col-1"></div>
                    <div class="col">
                        <div id="rbtCliente6" class="custom-control custom-checkbox toHide">
                            <input type="checkbox" class="custom-control-input" id="cliente6">
                            <label class="custom-control-label" for="cliente6">Teste</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-5" id="mapaConfirmarViagem">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm" id="iniciarViagem">Iniciar Viagem</button>
        <button type="button" class="btn btn-outline-warning btn-sm" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ver Viagem -->
<?php /**PATH /var/www/html/TaxiOut/resources/views/taxista/modaisTaxista.blade.php ENDPATH**/ ?>