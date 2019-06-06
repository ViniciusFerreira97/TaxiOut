$(document).ready(function () {
    $.ajax({
        url: "/usuarios",
        type: "GET",
        success: function (result) {

            if (!result['success']) {
                return;
            } else {
                $('#spanNomeUsuario').html(result['data'])
            }
        }
    });

    $('#modalSuccess').on('shown.bs.modal', function(){
        setTimeout(function(){
            $('#modalSuccess').modal('hide');
        }, 1000);
    });
    $('#modalError').on('shown.bs.modal', function(){
        setTimeout(function(){
            $('#modalError').modal('hide');
        }, 1000);
    });

    $(".iconClick").on('click', function (e) {
        e.preventDefault();
        let id = $(this).attr('id') + 'View';
        $('section.view').not('#' + id).hide('slide');
        $(".iconClick i").removeClass('active');
        $('#'+ $(this).attr('id') +' i').addClass('active');
        $('#' + id).show('slide');
    });
});
