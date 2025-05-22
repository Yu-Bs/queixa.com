console.log('Carregando o gráfico do menu...');

// Pega o parâmetro nomeEmpresa da URL
function getNomeEmpresaFromUrl() {
    const params = new URLSearchParams(window.location.search);
    return params.get('nomeEmpresa');
}

// Carrega o Google Charts
google.charts.load('current', { packages: ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    const nomeEmpresa = getNomeEmpresaFromUrl();
    let url = 'dadosGraficoInfPerfilEmpresa.php';
    if (nomeEmpresa) {
        url += '?nomeEmpresa=' + encodeURIComponent(nomeEmpresa);
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const chartData = google.visualization.arrayToDataTable(data);

            const chartContainer = document.getElementById('graficoInf');
            const width = chartContainer.offsetWidth;

            const options = {
                title: 'Top 5 produtos com mais queixas',
                legend: { position: 'none' },
                width: width,
                height: 400,
                hAxis: {
                    title: 'Produto',       // aqui troquei o título do eixo horizontal
                    textStyle: {
                        fontSize: 12
                    }
                },
                vAxis: {
                    title: 'Quantidade de Queixas',  // e aqui o título do eixo vertical
                    minValue: 0
                },
                bar: { groupWidth: '60%' },
                colors: ['#3366cc', '#dc3912', '#ff9900', '#109618', '#990099']
            };

            const chart = new google.visualization.ColumnChart(chartContainer);
            chart.draw(chartData, options);
        })
        .catch(error => {
            console.error('Erro ao carregar dados do gráfico:', error);
        });
}
