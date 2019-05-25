$(document).ready(function () {
    $('.toHide').hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#btnModalVeiculo').on('click',function(){
       $('#inserirVeiculo').modal('show');
    });

    $('#inserirVeiculo').on('shown.bs.modal', function(){
        $.ajax({
            url: "/motorista/getVeiculoDados",
            type: "GET",
            success: function (result) {
                if (!result['success']) {
                    return;
                } else {
                    $('#marcaVeiculo').focus();
                    $('#marcaVeiculo').val(result['data']['marca']);
                    $('#modeloVeiculo').focus();
                    $('#modeloVeiculo').val(result['data']['modelo']);
                    $('#placaVeiculo').focus();
                    $('#placaVeiculo').val(result['data']['placa']);
                    $('#corVeiculo').focus();
                    $('#corVeiculo').val(result['data']['cor']);
                    $('#btnSalvarVeiculo').focus();
                }
            }
        });
    });

    $('#btnSalvarVeiculo').on('click',function(){
        let marca = $('#marcaVeiculo').val();
        let modelo = $('#modeloVeiculo').val();
        let placa = $('#placaVeiculo').val();
        let cor = $('#corVeiculo').val();
        $.ajax({
            url: "/motorista/alterarVeiculo",
            type: "POST",
            data: {
                marca: marca,
                modelo: modelo,
                placa: placa,
                cor: cor,
            },
            success: function (result) {
                if (!result['success']) {
                    $('#modalError .modal-body').empty();
                    let tohtml = '';
                    for (var i in result['data']) {
                        tohtml += result['data'][i] + '<br>';
                    }
                    $('#modalError .modal-body').html(tohtml);
                    $('#modalError .modal-title').html('Alterar dados do veiculo');
                    $('#modalError').modal('show');
                } else {
                    $('#modalSuccess .modal-body').html('Dados alterados/salvos com sucesso !');
                    $('#modalSuccess .modal-title').html('Alterar dados do veiculo');
                    $('#modalSuccess').modal('show');
                }
            }
        });
    });
});
