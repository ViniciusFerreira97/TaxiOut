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
});
