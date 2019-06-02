$(document).ready(function () {
    document.title = 'Home - TaxiOut';
    $('.toHide').hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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
