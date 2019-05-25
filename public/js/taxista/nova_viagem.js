$(document).ready(function () {
    var map;
    initializeNovaViagem();

    function initializeNovaViagem() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        $('#dataCriarViagem').focus();
        $('#dataCriarViagem').val(dd + '/' + mm + '/' + yyyy);
        $('#horarioCriarViagem').mdtimepicker({
            readOnly: true,
            theme: 'green',
            format: 'hh:mm tt',
        });
        $('#cepInicial').mask("00000-000");
        $('#cepFinal').mask("00000-000");
        initMap();
    }

    function initMap() {
        $('#map').css('min-height', $(window).height() / 1.5);
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -19.9189954, lng: -43.9386306},
            zoom: 14
        });
    }

    $('#controlCamposInicial').on('click', function () {
        $('#camposPontoFinal').hide('slide');
        $('#camposPontoInicial').toggle('slide');
        $('#iControlInicial').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
        $('#iControlFinal').addClass('fa-angle-right').removeClass('fa-angle-down');
        $('#controlCamposInicial').toggleClass('text-success');
        $('#controlCamposFinal').removeClass('text-success');
    });


    $('#controlCamposFinal').on('click', function () {
        $('#camposPontoInicial').hide('slide');
        $('#camposPontoFinal').toggle('slide');
        $('#iControlFinal').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
        $('#iControlInicial').addClass('fa-angle-right').removeClass('fa-angle-down');
        $('#controlCamposInicial').removeClass('text-success');
        $('#controlCamposFinal').toggleClass('text-success');
    });

    $('#btnAgendarViagem').on('click', function () {
        let logOrigem = $('#logradouroInicial').val();
        let baiOrigem = $('#bairroInicial').val();
        let numOrigem = $('#numeroInicial').val();
        let cepOrigem = $('#cepInicial').val();
        let cidOrigem = $('#cidadeInicial').val();
        let ufOrigem = $('#ufInicial').val();
        let logDestino = $('#logradouroFinal').val();
        let baiDestino = $('#bairroFinal').val();
        let numDestino = $('#numeroFinal').val();
        let cepDestino = $('#cepFinal').val();
        let cidDestino = $('#cidadeFinal').val();
        let ufDestino = $('#ufFinal').val();
        let preco = $('#precoCriarViagem').val();
        let capacidade = $('#capacidadeCriarViagem').val();
        let horario = $('#horarioCriarViagem').val();
        let data = $('#dataCriarViagem').val();
        var latOrigem = '';
        var longOrigem = '';
        var latDestino = '';
        var longDestino = '';
        var latlong;

        let enderecoOrigem = logOrigem + ',' + numOrigem + ',' + baiOrigem + ',' + cepOrigem + ',' + cidOrigem + ',' + ufOrigem;
        var geocoder = new google.maps.Geocoder();
        if (enderecoOrigem != '')
            geocoder.geocode({'address': enderecoOrigem}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    latlong = String(results[0].geometry.location).replace('(','').replace(')','');
                    latOrigem = latlong.split(',')[0];
                    alert(latOrigem);
                    longOrigem = latlong.split(',')[1];
                    map.setCenter(results[0].geometry.location);
                    var markerOrigem = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        icon: '/img/marcadorOrigemAlternativo.png',
                        title: 'Ponto de saida',
                        animation: google.maps.Animation.DROP,
                    });
                }
            });
        let enderecoDestino = logDestino + ',' + numDestino + ',' + baiDestino + ',' + cepDestino + ',' + cidDestino + ',' + ufDestino;
        if (enderecoDestino != '')
            geocoder.geocode({'address': enderecoDestino}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    latlong = String(results[0].geometry.location).replace('(','').replace(')','');
                    latDestino = latlong.split(',')[0];
                    longDestino = latlong.split(',')[1];
                    map.setCenter(results[0].geometry.location);
                    var markerDestino = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        icon: '/img/marcadorDestino.png',
                        title: 'Ponto de chegada',
                        animation: google.maps.Animation.DROP,
                    });
                }
            });

        $.ajax({
            url: "/motorista/cadastrarViagem",
            type: "POST",
            data: {
                preco: preco,
                capacidade: capacidade,
                hora: horario,
                data: data,
                latlongs: latlongs
            },
            success: function (result) {
                console.log(result);return;
                if (!result['success']) {
                    $('#modalError .modal-body').empty();
                    let tohtml = '';
                    for (var i in result['data']) {
                        tohtml += result['data'][i] + '<br>';
                    }
                    $('#modalError .modal-body').html(tohtml);
                    $('#modalError .modal-title').html('Cadastrar Viagem');
                    $('#modalError').modal('show');
                } else {
                    $('#modalSuccess .modal-body').html('Viagem cadastrada com sucesso !');
                    $('#modalSuccess .modal-title').html('Cadastrar Viagem');
                    $('#modalSuccess').modal('show');
                }
            }
        });
    });
});
