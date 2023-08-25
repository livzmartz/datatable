import Chart from "chart.js/auto";
import { Toast } from "../funciones";

const canvas = document.getElementById('chartCompras')
const btnActualizar = document.getElementById('btnActualizar')
const context = canvas.getContext('2d');


const chartCompras = new Chart(context, {
    type : 'pie',
    data : {
        labels : [],
        datasets : [
            {
                label : 'Compras',
                data : [],
                backgroundColor : []
            },
           
        ]
    },
    options : {
        indexAxis : 'y'
    }
})

const getEstadisticas = async () => {
    const url = `/datatable/API/clientes/estadistica`;
    const config = {
        method : 'GET'
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();

        chartCompras.data.labels = [];
        chartCompras.data.datasets[0].data = [];
        chartCompras.data.datasets[0].backgroundColor = []



        if(data){

            data.forEach( registro => {
                chartCompras.data.labels.push(registro.cliente_nombre)
                chartCompras.data.datasets[0].data.push(registro.total_ventas)
                chartCompras.data.datasets[0].backgroundColor.push(getRandomColor())
            });

        }else{
            Toast.fire({
                title : 'No se encontraron registros',
                icon : 'info'
            })
        }
        
        chartCompras.update();
       
    } catch (error) {
        console.log(error);
    }
}

const getRandomColor = () => {
    const r = Math.floor( Math.random() * 256)
    const g = Math.floor( Math.random() * 256)
    const b = Math.floor( Math.random() * 256)

    const rgbColor = `rgba(${r},${g},${b},0.5)`
    return rgbColor
}

getEstadisticas();

btnActualizar.addEventListener('click', getEstadisticas )