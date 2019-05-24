$(document).ready(function () {
    $.ajax({
        url: "/usuario/getNome",
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
});
