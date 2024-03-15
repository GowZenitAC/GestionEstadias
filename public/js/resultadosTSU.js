const url = 'http://127.0.0.1:8000/apiResultadosTSU';
const datos = async () => {
    const response = await fetch(url);
    const data = await response.json();
    console.log(data);
    return data
}
const select = document.getElementById('selectorBanco');
select.addEventListener('change', async () => {
    if(select.value === 'B1-FUNCIONES MATEMÁTICAS'){
        const results = await datos();
        const resultadoFiltrado =   results.filter((result)=>{
            return result.equipotsu.carreras.carrera2 === 'Tecnologías de la información' || result.equipotsu.carreras.carrera2 === 'Mantenimiento industrial';
        });
        const filtrarCuatroPrimeros = resultadoFiltrado.sort((a, b) => b.puntostsu - a.puntostsu).slice(0, 4);
       console.log(resultadoFiltrado);
       console.log(filtrarCuatroPrimeros); 
        myChart.data.labels = filtrarCuatroPrimeros.map(result => result.equipotsu.nombretsu);
        myChart.data.datasets[0].data = filtrarCuatroPrimeros.map(result => result.puntostsu);
        myChart.update();
    }else if (select.value === 'B2-ESTADÍSTICA'){
        const results = await datos();
        const resultadoFiltrado =   results.filter((result)=>{
            return result.equipotsu.carreras.carrera2 === 'Turismo' || result.equipotsu.carreras.carrera2 === 'Gastronomía' || result.equipotsu.carreras.carrera2 === 'Administración';
        });
        const filtrarCuatroPrimeros = resultadoFiltrado.sort((a, b) => b.puntostsu - a.puntostsu).slice(0, 4);
       console.log(resultadoFiltrado);
       console.log(filtrarCuatroPrimeros); 
        myChart.data.labels = filtrarCuatroPrimeros.map(result => result.equipotsu.nombretsu);
        myChart.data.datasets[0].data = filtrarCuatroPrimeros.map(result => result.puntostsu);
        myChart.update();
        
    }
})
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