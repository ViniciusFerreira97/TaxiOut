$(document).ready(function () {
    document.title = 'Login - TaxiLotacao';
    // Sizing
    var divWidth = $('#login > .loginMenu').width();
    var height = $(window).height();
    var width = $(window).width();
    if (width < 840) {
        $('.loginMenu').removeClass('col-5').addClass('col-10');
        $('.loginItens').removeClass('col-5').addClass('col-10');

    } else {
        $('#imgLogin').css('height', height);
        $('#imgLogin').css('width', (divWidth) + 'px');
    }
});