const url = 'http://127.0.0.1:8000/apiResultadosTSU';
const datos = async () => {
    const response = await fetch(url);
    const data = await response.json();
    console.log(data);
    return data
}

let chart = document.getElementById('myChart').getContext('2d');
chart.width = 400;
let myChart = new Chart(chart, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            label:'Puntos',
            data: [],
        }]
    }
})
const results = await datos();
myChart.data.labels = results.map(result => result.equipotsu.nombretsu);
myChart.data.datasets[0].data = results.map(result => result.puntostsu);
myChart.update();