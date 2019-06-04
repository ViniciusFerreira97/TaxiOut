$(document).ready(function () {
    initializeProcurarViagem();
    function initializeProcurarViagem(){
        $.ajax({
            url: "/viagens",
            type: "GET",
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
                        toTable += '<tr value="'+result['data'][i]['id']+'"> <td scope="row">'+i+'</td>';
                        toTable += ' <td class="nome">'+result['data'][i]['nome']+'</td>';
                        toTable += '<td>'+result['data'][i]['hora']+' '+result['data'][i]['data']+'</td>';
                        toTable += ' <td>'+montaEndereco(result['data'][i]['OrigemLogradouro'],result['data'][i]['OrigemNumero'],result['data'][i]['OrigemBairro'],result['data'][i]['OrigemCep'],result['data'][i]['OrigemCidade'],result['data'][i]['OrigemUf'])+'</td>';
                        toTable += ' <td>'+montaEndereco(result['data'][i]['FinalLogradouro'],result['data'][i]['FinalNumero'],result['data'][i]['FinalBairro'],result['data'][i]['FinalCep'],result['data'][i]['FinalCidade'],result['data'][i]['FinalUf'])+'</td>';
                        toTable += ' <td>'+result['data'][i]['tarifa']+'</td>';
                        toTable += '</tr>';
                    }
                    $('#tableViagens tbody').html(toTable);
                    $("#tableViagens tbody tr").on('click', function(){
                        let val = $(this).attr('value');
                        $('#confirmarViagem').show();
                        $('#modalVerViagens .modal-title').html('Confirmar Viagem');
                        $('#ruaPartidaViagem').html($(this).find('td:eq(3)').html());
                        $('#ruaDestinoViagem').html($(this).find('td:eq(4)').html());
                        $('#tarifaViagem').html($(this).find('td:eq(5)').html());
                        $('#dataViagem').html($(this).find('td:eq(2)').html());
                        initMap();
                        $('#modalVerViagens').modal('show');
                    });
                }
            }
        });
    }

    function montaEndereco(logradouro,numero,bairro,cep,cidade,estado){
        let enderecoFinal = '';
        if(logradouro != '' && logradouro != ' ')
            enderecoFinal += logradouro;
        if(numero != '' && numero != ' '){
            if(enderecoFinal != '')
                enderecoFinal += ', ';
            enderecoFinal += numero;
        }
        if(bairro != '' && bairro != ' '){
            if(enderecoFinal != '')
                enderecoFinal += ', ';
            enderecoFinal += bairro;
        }
        if(cep != '' && cep != ' '){
            if(enderecoFinal != '')
                enderecoFinal += ', ';
            enderecoFinal += cep;
        }
        if(cidade != '' && cidade != ' '){
            if(enderecoFinal != '')
                enderecoFinal += ', ';
            enderecoFinal += cidade;
        }
        if(estado != '' && estado != ' '){
            if(enderecoFinal != '')
                enderecoFinal += ', ';
            enderecoFinal += estado;
        }
        return enderecoFinal;
    }

    $('#btnFiltrarProcurarViagem').on('click',function () {
       initializeProcurarViagem();
    });

    $("#txtProcurarViagem").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableViagens tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    function initMap() {
        $('#mapaEstatisticas').css('min-height', $(window).height() /2.5);
        map = new google.maps.Map(document.getElementById('mapaEstatisticas'), {
            center: {lat: -19.9189954, lng: -43.9386306},
            zoom: 14
        });
    }
});
