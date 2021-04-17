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
            stock.push(lista[index].stock - lista[index].stock_actual);
        }
        generarGrafico();
    })

    function generarGrafico(){
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nombres,
            datasets: [{
                label: '# of Votes',
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
})