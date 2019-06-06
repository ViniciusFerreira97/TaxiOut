<!-- Modal Ver Viagem -->
<div class="modal " id="modalVerViagens" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                <div class="row top-more-10">
                <div class="col-1"></div>
                <div class="col">
                    <label>Endereço Destino: <span id="ruaDestinoViagem" class="text-muted"></span></label>
                </div>
                </div>
                <div class="row top-more-10">
                <div class="col-1"></div>
                <div class="col">
                    <label>Tarifa: <span id="tarifaViagem" class="text-muted"></span></label>
                </div>
                </div>
                <div class="row top-more-10">
                <div class="col-1"></div>
                <div class="col">
                    <label>Data Viagem: <span id="dataViagem" class="text-muted"></span></label>
                </div>
                </div>
                <span id="idViagemModalConfirmar" class="toHide"></span>
            </div>
            <div class="col-1"></div>
            <div class="col-5" id="mapaEstatisticas">
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" id="cancelarReserva">Cancelar Reserva</button>
        <button type="button" class="btn btn-success btn-sm" id="confirmarViagem">Confirmar</button>
        <button type="button" class="btn btn-outline-warning btn-sm" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ver Viagem  -->
<?php /**PATH /var/www/html/TaxiOut/resources/views/cliente/modaisCliente.blade.php ENDPATH**/ ?>