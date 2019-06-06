$(document).ready(function () {
    var map;
    var latpath = [];
    var lineColor = "#ffae00";
    var opacity = .8;
    var lineWeight = 2;
    var fillColor = "#f5ff00";
    var lineShape = [];
    var polygonShape = [];
    var bounds = new google.maps.LatLngBounds();

    initializeConfirmarViagem();
    var valClick;
    function initializeConfirmarViagem() {
        $.ajax({
            url: "/viagens",
            type: "GET",
            success: function (result) {
                toTable = '';
                for (var i = 0; i < result['data'].length; i++) {
                    toTable += '<tr value="' + result['data'][i]['id'] + '"> <td scope="row">' + (i + 1) + '</td>';
                    toTable += ' <td class="nome">' + result['data'][i]['nome'] + '</td>';
                    toTable += '<td>' + result['data'][i]['hora'] + ' ' + result['data'][i]['data'] + '</td>';
                    toTable += ' <td>' + montaEndereco(result['data'][i]['OrigemLogradouro'], result['data'][i]['OrigemNumero'], result['data'][i]['OrigemBairro'], result['data'][i]['OrigemCep'], result['data'][i]['OrigemCidade'], result['data'][i]['OrigemUf']) + '</td>';
                    toTable += ' <td>' + montaEndereco(result['data'][i]['FinalLogradouro'], result['data'][i]['FinalNumero'], result['data'][i]['FinalBairro'], result['data'][i]['FinalCep'], result['data'][i]['FinalCidade'], result['data'][i]['FinalUf']) + '</td>';
                    toTable += ' <td>' + result['data'][i]['tarifa'] + '</td>';
                    toTable += '</tr>';
                }
                $('#tableViagensTaxista tbody').html(toTable);
                $("#tableViagensTaxista tbody tr").on('click', function () {
                    valClick = $(this).attr('value');
                    $('#confirmarViagem').show(valClick);
                    $('#modalConfirmarViagem .modal-title').html('Confirmar Viagem');
                    $('#ruaPartidaViagem').html($(this).find('td:eq(3)').html());
                    $('#ruaDestinoViagem').html($(this).find('td:eq(4)').html());
                    $('#tarifaViagem').html($(this).find('td:eq(5)').html());
                    $('#dataViagem').html($(this).find('td:eq(2)').html());
                    inicializarcheckBok(valClick);
                    initMap();
                    getRotaDaViagem(valClick);
                    $('#modalConfirmarViagem').modal('show');
                });
            }
        });
    }

    function inicializarcheckBok(idViagem)
    {
        $.ajax({
            url: "/passageiros?idViagem="+idViagem,
            type: "GET",
            success: function (result) {
                $('.divCheck input').prop('checked',false);
                for(i = 1; i < 7; i++){
                    $('#'+('rbtCliente'+(i))).hide();
                }
                for(var count=0; count < result['data'].length; count++)
                {
                    let aux = result['data'][count]['id'] + ' - ' + result['data'][count]['nome'];
                    $('#'+('rbtCliente'+(count+1)+' label')).html(aux);
                    $('#'+('rbtCliente'+(count+1))).show();
                }
            }
        });
    }

    $('#iniciarViagem').on('click', function () {
        let passageiros = [];
        for(var i=0; i < 7; i++)
        {
            if($("#"+('cliente'+(i+1))).is(':checked'))
            {
                let resultado = ($('#'+('rbtCliente'+(i+1)+' label')).text());
                let id = resultado.split(" ");
                passageiros.push(id[0]);
            }
        }
        $.ajax({
            url: "/passageiros",
            type: "POST",
            data: {
                passageiros: passageiros,
                id_viagem: valClick,
            },
            success: function (result) {
                if(result['resposta'])
                {
                    $('#modalConfirmarViagem').modal('hide');
                    $('#modalSuccess .modal-body').html('Viagem iniciada com sucesso !');
                    $('#modalSuccess').modal('show');
                    initializeConfirmarViagem();
                }
                else{
                    $('#modalError .modal-body').html('Selecionar os passageiros da viagem');
                    $('#modalError').modal('show');
                }
            }
        });
    });

    function getRotaDaViagem(idViagem){
        $.ajax({
            url: "/rotas?idViagem="+idViagem,
            type: "GET",
            success: function (result) {
                let tamanho = result['data'].length-1;
                latpath[0] = [];
                for(var i = 0; i < result['data'].length; i++){
                    latpath[0].push(new google.maps.LatLng(result['data'][i]['lat'], result['data'][i]['long']))
                    if(i == 0){
                        map.setCenter(latpath[0][0]);
                        var markerOrigem = new google.maps.Marker({
                            map: map,
                            position: latpath[0][0],
                            icon: '/img/marcadorOrigemAlternativo.png',
                            title: 'Ponto de saida',
                            animation: google.maps.Animation.DROP,
                        });
                    }
                    else if(i== tamanho){
                        map.setCenter(latpath[0][i]);
                        var markerDestino = new google.maps.Marker({
                            map: map,
                            position: latpath[0][i],
                            icon: '/img/marcadorDestino.png',
                            title: 'Ponto de chegada',
                            animation: google.maps.Animation.DROP,
                        });
                    }
                }
                var markers = [];
                markers.push(markerDestino);
                markers.push(markerOrigem);
                for (var i = 0; i < markers.length; i++) {
                    bounds.extend(markers[i].getPosition());
                }
                map.fitBounds(bounds);
                addOverlayFromKML();
            }
        });
    }

    function addOverlayFromKML() {
        for (var i = 0; i < 1; i++) {
            lineShape[i] = new google.maps.Polyline({
                path: latpath[i],
                strokeColor: lineColor,
                strokeOpacity: opacity,
                strokeWeight: lineWeight
            });
            lineShape[i].setMap(map);
            polygonShape[i] = new google.maps.Polygon({
                path: latpath[i],
                strokeColor: lineColor,
                strokeOpacity: opacity,
                strokeWeight: lineWeight,
                fillColor: fillColor
            });
            google.maps.event.addListener(polygonShape[i], 'click', function (point) {
                infowindow.setContent(description[cur]);
                infowindow.setPosition(point.latLng);
                infowindow.open(map);
            });
        }
        polyShape = lineShape[0];
        latpath = [];
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

    $("#txtProcurarViagemTaxista").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tableViagens tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    function initMap() {
        $('#mapaConfirmarViagem').css('min-height', $(window).height() / 2);
        map = new google.maps.Map(document.getElementById('mapaConfirmarViagem'), {
            center: { lat: -19.9189954, lng: -43.9386306 },
            zoom: 5
        });
    }
});
