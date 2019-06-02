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
