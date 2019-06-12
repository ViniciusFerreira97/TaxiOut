$(document).ready(function () {
    document.title = 'Home - TaxiOut';
    var veiculoCriado = false;
    $('.toHide').hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#btnAlterarVeiculo').on('click',function(){
       $('#inserirVeiculo').modal('show');
    });

    $('#inserirVeiculo').on('shown.bs.modal', function(){
        $.ajax({
            url: "/motoristas/veiculos",
            type: "GET",
            success: function (result) {
                if (!result['success']) {
                    return;
                } else {
                    if(result['data']['marca'] != '')
                        veiculoCriado = false;
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
        var type = "POST";
        if(!veiculoCriado)
            type = "PUT";
        $.ajax({
            url: "/motoristas/veiculos",
            type: type,
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
                    veiculoCriado = true;
                    $('#modalSuccess .modal-body').html('Dados alterados/salvos com sucesso !');
                    $('#modalSuccess .modal-title').html('Alterar dados do veiculo');
                    $('#modalSuccess').modal('show');
                    $('#inserirVeiculo').modal('hide');
                }
            }
        });
    });

    $('#btnSair').on('click',function(){
        $.ajax({
            url: "/usuarios/sair",
            type: 'GET',
            success: function () {
                location.href = '/';
            }
        });
    });
});
