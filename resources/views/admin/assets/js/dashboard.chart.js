$(function () {
    var chartBar = $('.chartBar');
    new Chart(chartBar, {
        type: 'bar',
        data: {
            labels: chartBar.data('chart-labels').split('|'),
            datasets: [{
                label: 'Dados',
                backgroundColor: chartBar.data('chart-background-color').split('|'),
                borderColor: chartBar.data('chart-border-color').split('|'),
                borderWidth: 1,
                data: chartBar.data('chart-values').split('|')
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Clientes por região'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});
