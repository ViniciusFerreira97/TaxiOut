$(document).ready(function () {
    var map;
    function initMap() {
        $('#map').css('min-height', $(window).height()/1.5);
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -19.9189954, lng: -43.9386306},
            zoom: 14
        });
    }
    initMap();

    $('#controlCamposInicial').on('click',function () {
        $('#camposPontoFinal').hide('slide');
        $('#camposPontoInicial').toggle('slide');
        $('#iControlInicial').toggleClass('yellow-text').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
        $('#iControlFinal').removeClass('yellow-text').addClass('fa-angle-right').removeClass('fa-angle-down');
    });


    $('#controlCamposFinal').on('click',function () {
        $('#camposPontoInicial').hide('slide');
        $('#camposPontoFinal').toggle('slide');
        $('#iControlFinal').toggleClass('yellow-text').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
        $('#iControlInicial').removeClass('yellow-text').addClass('fa-angle-right').removeClass('fa-angle-down');
    });
});
