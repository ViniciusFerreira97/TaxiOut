$(document).ready(function () {
    document.title = 'Login - TaxiLotacao';
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
        $('.loginMenu').removeClass('col-5').addClass('col-10');
        $('.loginItens').removeClass('col-5').addClass('col-10');

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
            url: "/usuario/login",
            type: "POST",
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
            url: "/usuario/cadastrar",
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
});
