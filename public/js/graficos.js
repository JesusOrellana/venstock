$(document).ready(function(){
    nombres = [];
    stock = [];
    $.ajax({
        url: '/producto/data',
        method: 'POST',
        data:{
            id:1,
            _token:$('input[name="_token"]').val()
        }
    }).done(function(res){
        
        var lista = JSON.parse(res);
        for (var index = 0; index < lista.length; index++) {
            nombres.push(lista[index].nombre);
            stock.push(lista[index].rebaje);

        }
        alert(nombres);
        alert(stock)
        generarGrafico();
        generarGraficoCir();
        generarGraficoLine();
    })

    function generarGrafico(){
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nombres,
            datasets: [{
                label: 'Rebaje Producto',
                data: stock,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    }

    function generarGraficoCir()
    {
        var ctx = document.getElementById('myChartRadar').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: nombres,
            datasets: [{
              label: 'My First Dataset',
              data: stock,
              backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
                'rgb(54, 162, 235)',
                'rgb(255, 162, 235)',
              ]
            }]
          }
    });
    }

    function generarGraficoLine()
    {
         ctx = document.getElementById('myChartLine').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['lun','ma','mi','ju','vi','sa','do'],
          datasets: [{
            label: ['My First Dataset','otra'],
            data: [[65, 59, 80, 81, 56, 55, 40],
                [12,65,70,10,40,77]],
            fill: false,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
                'rgb(54, 162, 235)'
              ],
            tension: 0.1
          }]
        }
        });
    }
})
