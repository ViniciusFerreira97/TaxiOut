$(document).ready(function () {
    var map;
    var lineColor = "#ffae00";
    var opacity = .8;
    var lineWeight = 2;
    var fillColor = "#f5ff00";
    var shapesignal = '';
    var lineShape = [];
    var polygonShape = [];
    var polyPoints = [];
    var polyShape = [];
    var pointsArrayKml = [];
    var midmarkers = [];
    var latpath = [];
    var markers = [];
    var firstLats = [];
    var limitCount = 0;
    var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow();
    var tmpPolyLine = new google.maps.Polyline({
        strokeColor: "#00FF00",
        strokeOpacity: 0.8,
        strokeWeight: 2
    });
    var imageNormal = new google.maps.MarkerImage(
        "/img/circleYellowN.png",
        new google.maps.Size(11, 11),
        new google.maps.Point(0, 0),
        new google.maps.Point(6, 6)
    );
    var imageNormalMidpoint = new google.maps.MarkerImage(
        "/img/circleYellowMidMini.png",
        new google.maps.Size(11, 11),
        new google.maps.Point(0, 0),
        new google.maps.Point(6, 6)
    );

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
            /*google.maps.event.addListener(polygonShape[i], 'click', function (point) {
                infowindow.setContent(description[cur]);
                infowindow.setPosition(point.latLng);
                infowindow.open(map);
            });*/
        }
        polyShape = lineShape[0];
        latpath = [];
        editlines();
    }

    function editlines() {
        if (shapesignal == "") {
            polyShape.setMap(null);
            polyShape = lineShape[0];
            polyShape.setMap(map);
            shapesignal = "line";
        }
        polyShape = lineShape[0];
        polyPoints = polyShape.getPath();
        if (polyPoints.length > 0) {
            drawandlog();
        }
        //lineShape[0].setMap(null);
    }

    function drawandlog() {
        for (var i = 0; i < polyPoints.length; i++) {
            var marker = setmarkers(polyPoints.getAt(i));
            markers.push(marker);
            var kmlstringtobesaved = polyPoints.getAt(i).lng().toFixed(6) + ',' + polyPoints.getAt(i).lat().toFixed(6);
            pointsArrayKml.splice(i, 1, kmlstringtobesaved);
        }
        for (var i = 1; i < polyPoints.length; i++) {
            var previous = polyPoints.getAt(i - 1);
            var midmarker = setmidmarkers(polyPoints.getAt(i), previous);
            midmarkers.push(midmarker);
        }
    }

    function setmarkers(point) {
        if(limitCount < 2){
            var marker = new google.maps.Marker({
                position: point,
                map: map,
                icon: imageNormal,
            });
            limitCount++;
            return marker;
        }
        var marker = new google.maps.Marker({
            position: point,
            map: map,
            icon: imageNormal,
            raiseOnDrag: false,
            draggable: true
        });
        google.maps.event.addListener(marker, "drag", function() {
            for (var i = 0; i < markers.length; i++) {
                if (markers[i] == marker) {
                    prevpoint = marker.getPosition();
                    prevnumber = i;
                    polyPoints.setAt(i, marker.getPosition());
                    movemidmarker(i);
                    break;
                }
            }
            polyPoints = polyShape.getPath();
            var kmlstringtobesaved = marker.getPosition().lng().toFixed(6) + ',' + marker.getPosition().lat().toFixed(6);
            pointsArrayKml.splice(i,1,kmlstringtobesaved);
        });
        google.maps.event.addListener(marker, "click", function() {
            for (var i = 0; i < markers.length; i++) {
                if (markers[i] == marker && markers.length != 1) {
                    prevpoint = marker.getPosition();
                    prevnumber = i;
                    marker.setMap(null);
                    markers.splice(i, 1);
                    polyPoints.removeAt(i);
                    removemidmarker(i);
                    break;
                }
            }
            polyPoints = polyShape.getPath();
            if(markers.length > 0) {
                pointsArrayKml.splice(i,1);
            }
            console.log(pointsArrayKml);
        });
        return marker;
    }

    function setmidmarkers(point, prevpoint) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(
                point.lat() - (0.5 * (point.lat() - prevpoint.lat())),
                point.lng() - (0.5 * (point.lng() - prevpoint.lng()))
            ),
            map: map,
            icon: imageNormalMidpoint,
            raiseOnDrag: false,
            draggable: true
        });
        google.maps.event.addListener(marker, "mouseover", function () {
            marker.setIcon(imageNormal);
        });
        google.maps.event.addListener(marker, "mouseout", function () {
            marker.setIcon(imageNormalMidpoint);
        });
        google.maps.event.addListener(marker, "dragstart", function () {
            for (var m = 0; m < midmarkers.length; m++) {
                if (midmarkers[m] == marker) {
                    var tmpPath = tmpPolyLine.getPath();
                    tmpPath.push(markers[m].getPosition());
                    tmpPath.push(midmarkers[m].getPosition());
                    tmpPath.push(markers[m + 1].getPosition());
                    break;
                }
            }
        });
        google.maps.event.addListener(marker, "drag", function () {
            for (var i = 0; i < midmarkers.length; i++) {
                if (midmarkers[i] == marker) {
                    tmpPolyLine.getPath().setAt(1, marker.getPosition());
                    break;
                }
            }
        });
        google.maps.event.addListener(marker, "dragend", function () {
            for (var i = 0; i < midmarkers.length; i++) {
                if (midmarkers[i] == marker) {
                    var newpos = marker.getPosition();
                    var startMarkerPos = markers[i].getPosition();
                    var firstVPos = new google.maps.LatLng(
                        newpos.lat() - (0.5 * (newpos.lat() - startMarkerPos.lat())),
                        newpos.lng() - (0.5 * (newpos.lng() - startMarkerPos.lng()))
                    );
                    var endMarkerPos = markers[i + 1].getPosition();
                    var secondVPos = new google.maps.LatLng(
                        newpos.lat() - (0.5 * (newpos.lat() - endMarkerPos.lat())),
                        newpos.lng() - (0.5 * (newpos.lng() - endMarkerPos.lng()))
                    );
                    var newVMarker = setmidmarkers(secondVPos, startMarkerPos);
                    newVMarker.setPosition(secondVPos);
                    var newMarker = setmarkers(newpos);
                    markers.splice(i + 1, 0, newMarker);
                    polyPoints.insertAt(i + 1, newpos);
                    marker.setPosition(firstVPos);
                    midmarkers.splice(i + 1, 0, newVMarker);
                    tmpPolyLine.getPath().removeAt(2);
                    tmpPolyLine.getPath().removeAt(1);
                    tmpPolyLine.getPath().removeAt(0);
                    break;
                }
            }
            polyPoints = polyShape.getPath();
            var kmlstringtobesaved = newpos.lng().toFixed(6) + ',' + newpos.lat().toFixed(6);
            pointsArrayKml.splice(i+1, 0, kmlstringtobesaved);
        });
        return marker;
    }

    function movemidmarker(index) {
        var newpos = markers[index].getPosition();
        if (index != 0) {
            var prevpos = markers[index - 1].getPosition();
            midmarkers[index - 1].setPosition(new google.maps.LatLng(
                newpos.lat() - (0.5 * (newpos.lat() - prevpos.lat())),
                newpos.lng() - (0.5 * (newpos.lng() - prevpos.lng()))
            ));
        }
        if (index != markers.length - 1) {
            var nextpos = markers[index + 1].getPosition();
            midmarkers[index].setPosition(new google.maps.LatLng(
                newpos.lat() - (0.5 * (newpos.lat() - nextpos.lat())),
                newpos.lng() - (0.5 * (newpos.lng() - nextpos.lng()))
            ));
        }
    }

    function removemidmarker(index) {
        if (markers.length > 0) {
            if (index != markers.length) {
                midmarkers[index].setMap(null);
                midmarkers.splice(index, 1);
            } else {
                midmarkers[index - 1].setMap(null);
                midmarkers.splice(index - 1, 1);
            }
        }
        if (index != 0 && index != markers.length) {
            var prevpos = markers[index - 1].getPosition();
            var newpos = markers[index].getPosition();
            midmarkers[index - 1].setPosition(new google.maps.LatLng(
                newpos.lat() - (0.5 * (newpos.lat() - prevpos.lat())),
                newpos.lng() - (0.5 * (newpos.lng() - prevpos.lng()))
            ));
        }
    }


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
        $('#horarioCriarViagem').focus();
        $('#cepInicial').mask("00000-000");
        $('#cepFinal').mask("00000-000");
        $('#dataCriarViagem').mask("00/00/0000");
        initMap();
    }

    function initMap() {
        $('#map').css('min-height', $(window).height() / 1.5);
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -19.9189954, lng: -43.9386306},
            zoom: 14
        });
        tmpPolyLine.setMap(map);
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

    $('#btnEncontrarEnderecos').on('click', function () {
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
        let enderecoOrigem = logOrigem + ',' + numOrigem + ',' + baiOrigem + ',' + cepOrigem + ',' + cidOrigem + ',' + ufOrigem;
        var geocoder = new google.maps.Geocoder();
        if (enderecoOrigem != '')
            geocoder.geocode({'address': enderecoOrigem}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    latlong = String(results[0].geometry.location).replace('(', '').replace(')', '');
                    latOrigem = latlong.split(',')[0];
                    longOrigem = latlong.split(',')[1];
                    map.setCenter(results[0].geometry.location);
                    var markerOrigem = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        icon: '/img/marcadorOrigemAlternativo.png',
                        title: 'Ponto de saida',
                        animation: google.maps.Animation.DROP,
                    });
                    markers.push(markerOrigem);
                    latpath[0] = [];
                    latpath[0].push(new google.maps.LatLng(latOrigem, longOrigem))
                    firstLats[0] = latOrigem+','+longOrigem;
                    let enderecoDestino = logDestino + ',' + numDestino + ',' + baiDestino + ',' + cepDestino + ',' + cidDestino + ',' + ufDestino;
                    if (enderecoDestino != '')
                        geocoder.geocode({'address': enderecoDestino}, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                latlong = String(results[0].geometry.location).replace('(', '').replace(')', '');
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
                                markers.push(markerDestino);
                                latpath[0].push(new google.maps.LatLng(latDestino, longDestino));
                                firstLats[1] = latDestino+','+longDestino;
                                for (var i = 0; i < markers.length; i++) {
                                    bounds.extend(markers[i].getPosition());
                                }
                                map.fitBounds(bounds);
                                addOverlayFromKML();
                            }
                        });
                }
            });
        $(this).fadeOut();
        $('.viagemMenu').show('slide');
        $('#dataCriarViagem').focus();
        $('#horarioCriarViagem').focus();
    });

    $('#btnAgendarViagem').on('click', function () {
        let latLongs = {};
        latLongs[0] = {};
        latLongs[0]['lat'] = firstLats[0].split(',')[0];
        latLongs[0]['long'] = firstLats[0].split(',')[1];
        for (var i = 0; i < pointsArrayKml.length; i++){
            latLongs[i+1] = {};
            latLongs[i+1]['lat'] = pointsArrayKml[i].split(',')[1];
            latLongs[i+1]['long'] = pointsArrayKml[i].split(',')[0];
        }
        let count = pointsArrayKml.length+1;
        latLongs[count] = {};
        latLongs[count]['lat'] = firstLats[1].split(',')[0];
        latLongs[count]['long'] = firstLats[1].split(',')[1];
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
        $.ajax({
            url: "/motoristas/viagens",
            type: "POST",
            data: {
                origemLogradouro: logOrigem,
                origemBairro: baiOrigem,
                origemNumero: numOrigem,
                origemCep: cepOrigem,
                origemCidade: cidOrigem,
                origemUf: ufOrigem,
                destinoLogradouro: logDestino,
                destinoBairro: baiDestino,
                destinoNumero: numDestino,
                destinoCep: cepDestino,
                destinoCidade: cidDestino,
                destinoUf: ufDestino,
                coords: JSON.stringify(latLongs),
                preco: preco,
                capacidade: capacidade,
                hora: horario,
                data: data,
            },
            success: function (result) {
                if (!result['success']) {
                    $('#modalError .modal-body').empty();
                    $('#modalError .modal-body').html("Gentileza Cadastrar Automóvel");
                    $('#modalError').modal('show');
                } else {
                    for(var i = 0; i < markers.length; i++) {
                        markers[i].setMap(null);
                    }
                    for(var i = 0; i < midmarkers.length; i++) {
                        midmarkers[i].setMap(null);
                    }
                    lineShape[0].setMap(null);
                    markers = [];
                    midmarkers = [];
                    pointsArrayKml = [];
                    $('#modalSuccess .modal-body').html('Viagem cadastrada com sucesso !');
                    $('#modalSuccess').modal('show');
                    $('.viagemMenu').hide('slide');
                    $('#btnEncontrarEnderecos').fadeIn();
                }
            }
        });
    });
});
