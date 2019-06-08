$(document).ready(function () {
 
    $('#estatisticasTax').on('click',function () {
        $.ajax({
            url: "/viagens?user=true&mes=true&finalizadas=true",
            type: "GET",
            success: function (result) {
                if(result['success']){
                    let meses = [];
                    let qtd = [];
                    let toTable = '';
                    for(var i = 0; i < result['data'].length; i++){
                        toTable += '<tr value="'+result['data'][i]['id']+'"> <td scope="row">'+(i+1)+'</td>';
                        toTable += ' <td class="nome">'+result['data'][i]['nome']+'</td>';
                        toTable += '<td>'+result['data'][i]['hora']+' '+result['data'][i]['data']+'</td>';
                        let date = result['data'][i]['data'];
                        let month = date.split('/')[1];
                        if(meses.indexOf(month) == -1){
                            meses.push(month);
                            qtd.push(1);
                        }else{
                            qtd[meses.indexOf(month)]++;
                        }
                        toTable += ' <td>'+montaEndereco(result['data'][i]['OrigemLogradouro'],result['data'][i]['OrigemNumero'],result['data'][i]['OrigemBairro'],result['data'][i]['OrigemCep'],result['data'][i]['OrigemCidade'],result['data'][i]['OrigemUf'])+'</td>';
                        toTable += ' <td>'+montaEndereco(result['data'][i]['FinalLogradouro'],result['data'][i]['FinalNumero'],result['data'][i]['FinalBairro'],result['data'][i]['FinalCep'],result['data'][i]['FinalCidade'],result['data'][i]['FinalUf'])+'</td>';
                        toTable += ' <td>'+result['data'][i]['tarifa']+'</td>';
                        toTable += '</tr>';
                    }
                    $('#tableRealizadasTax tbody').html(toTable);
                    let mesesTraduzidos = [];
                    for(var i = 0; i < meses.length; i++){
                        mesesTraduzidos[i] = traduzMes(meses[i]);
                    }
                    let ctx = document.getElementById("myChart").getContext('2d');
                    let myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: mesesTraduzidos,
                            datasets: [{
                                label: 'Viagens Mensais',
                                data: qtd,
                                backgroundColor: [
                                    'rgba(244, 67, 54, 0.3)',
                                    'rgba(121, 85, 72, 0.3)',
                                    'rgba(0, 188, 212, 0.3)',
                                    'rgba(255, 152, 0, 0.3)',
                                    'rgba(76, 175, 80, 0.3)'
                                ],
                                borderColor: [
                                    'rgba(244, 67, 54, 0.7)',
                                    'rgba(121, 85, 72, 0.7)',
                                    'rgba(0, 188, 212, 0.7)',
                                    'rgba(255, 152, 0, 0.7)',
                                    'rgba(76, 175, 80, 0.7)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                }
            }
        });
    });

    function montaEndereco(logradouro,numero,bairro,cep,cidade,estado){
        let enderecoFinal = '';
        if(logradouro != '' && logradouro != ' ')
            enderecoFinal += logradouro;
        if(numero != '' && numero != ' '){
            if(enderecoFinal != '')
                enderecoFinal += ', ';
            enderecoFinal += numero;
        }
        if(bairro != '' && bairro != ' '){
            if(enderecoFinal != '')
                enderecoFinal += ', ';
            enderecoFinal += bairro;
        }
        if(cep != '' && cep != ' '){
            if(enderecoFinal != '')
                enderecoFinal += ', ';
            enderecoFinal += cep;
        }
        if(cidade != '' && cidade != ' '){
            if(enderecoFinal != '')
                enderecoFinal += ', ';
            enderecoFinal += cidade;
        }
        if(estado != '' && estado != ' '){
            if(enderecoFinal != '')
                enderecoFinal += ', ';
            enderecoFinal += estado;
        }
        return enderecoFinal;
    }

    function traduzMes(numero){
        let meses = [
            "Janeiro",
            "Fevereiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        ];
        if(numero > 12 || numero < 1)
            numero = 1;
        return meses[--numero];
    }
});
