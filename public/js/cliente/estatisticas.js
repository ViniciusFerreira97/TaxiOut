$(document).ready(function () {
    
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio",],
      datasets: [{
        label: 'Viagens Mensais',
        data: [12, 19, 7, 5, 8],
        backgroundColor: [
          '#212121',
          '#1b5e20',
          '#f57f17',
          '#0d47a1',
          '#e53935'
        ],
        borderColor: [
          '#000000',
          '#000000',
          '#000000',
          '#000000',
          '#000000'
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

  function initMap() {
    $('#mapaEstatisticas').css('min-height', $(window).height() /2.5);
    map = new google.maps.Map(document.getElementById('mapaEstatisticas'), {
        center: {lat: -19.9189954, lng: -43.9386306},
        zoom: 14
    });
}

  $('#tableRealizadas tr').on('click', function(){
    $('#modalVerViagens').modal('show');
    initMap();
  });
});
