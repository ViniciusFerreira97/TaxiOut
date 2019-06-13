$(document).ready(function () {
    document.title = 'Login - TaxiOut';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Sizing
    var divWidth = $('#login > .loginMenu').width();
    var height = $(window).height();
    var width = $(window).width();
    if (width < 840) {
        $("#imgLogin").remove();
        $('.loginMenu').removeClass('col-5').addClass('col-12');
        $('div.inputs').removeClass('col-5').addClass('col-12');
        $('#imgLogin').css('width','100%');
        $('div,inputs').addClass('text-center');
        //$('div.inputs').css('margin-left','40%');
        $('body').css('overflow-y','scroll');
        $('body').css('overflow-x','hidden');
    } else {
        $('#imgLogin').css('height', height);
        $('#imgLogin').css('width', (divWidth) + 'px');
    }

    $('#btnVoltar').on('click', function(){
        $('#containerInscrever').hide();
        $('#ContainerFormInicial').show('slide');
    });

    $('#btnInscrever').on('click', function(){
        $('#ContainerFormInicial').hide();
        $('#containerInscrever').show('slide');
    });

    $('#btnLogin').on('click', function () {
        let email = $('#iptLogin').val();
        let senha = $('#iptSenha').val();
        $.ajax({
            url: "/usuarios/login",
            type: "PUT",
            data: {
                email: email,
                senha: senha,
            },
            success: function (result) {

                if (!result['success']) {
                    $('#modalError .modal-body').empty();
                    let tohtml = '';
                    for (var i in result['data']) {
                        tohtml += result['data'][i] + '<br>';
                    }
                    $('#modalError .modal-body').html(tohtml);
                    $('#modalError .modal-title').html('Login Incorreto');
                    $('#modalError').modal('show');
                } else {
                    location.href = '/home';
                }
            }
        });
    });

    $('#btnCadastrar').on('click', function(){
        let email = $('#emailInscrever').val();
        let nome = $('#nomeInscrever').val();
        let senha = $('#senhaInscrever').val();
        let ConfirSenha = $('#confirmSenha').val();
        let tipoUsu = 'Cliente';
        if($('#rbnTaxista').prop('checked'))
            tipoUsu= 'Taxista';
        if(senha != ConfirSenha)
        {
            $('#modalError .modal-body').html('Senha e repetição de senha não correspondem.');
            $('#modalError .modal-title').html('Login Incorreto');
            $('#modalError').modal('show');
            return;
        }

        $.ajax({
            url: "/usuarios",
            type: "POST",
            data: {
                email: email,
                senha: senha,
                nome: nome,
                tipoUsu: tipoUsu
            },
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
                    location.href = '/home';
                }
            }
        });
    });

    $('#iptSenha').on('keypress',function (e) {
        if(e.which == 13)
            $('#btnLogin').click();
    });
});
