$(document).ready(function () {
    initializeProcurarViagem();
    function initializeProcurarViagem(){
        $.ajax({
            url: "/viagens",
            type: "get",
            success: function (result) {
                if (!result['success']) {
                    $('#modalError .modal-body').empty();
                    let tohtml = '';
                    for (var i in result['data']) {
                        tohtml += result['data'][i] + '<br>';
                    }
                    $('#modalError .modal-body').html(tohtml);
                    $('#modalError .modal-title').html('Impossivel Cadastrar');
                    $('#modalError').modal('show');
                } else {
                    toTable = '';
                    for(var i = 0; i < result['data'].length; i++){
                        toTable += '<tr> <td scope="row">'+i+'</td>';
                        toTable += ' <td>'+result['data'][i]['nome']+'</td>';
                        toTable += '<td>'+result['data'][i]['hora']+' '+result['data'][i]['data']+'</td>';
                        toTable += '</tr>';
                    }
                    $('#tableViagens tbody').html(toTable);
                }
            }
        });
    }
});
