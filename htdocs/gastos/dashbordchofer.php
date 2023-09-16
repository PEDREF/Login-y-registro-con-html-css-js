<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Gasto de Combustible por Chofer</title>
    <!-- Agrega el enlace a la biblioteca de Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
    <h1>Dashboard Gasto de Combustible por Chofer</h1>
    
    <!-- Formulario para seleccionar fechas -->
    <form action="" method="post">
        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio">
        <label for="fecha_fin">Fecha de fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin">
        <input type="submit" value="Filtrar">
    </form>

    <!-- Contenedor para el gráfico -->
    <div style="width: 80%; margin: 0 auto;">
        <canvas id="lineChart" width="400" height="200"></canvas>
    </div>

    <?php
    // Aquí debes agregar el código PHP para obtener los datos de gastos de combustible por chofer según las fechas seleccionadas
    // y preparar los datos para el gráfico.
    // Puedes usar Chart.js para crear el gráfico con los datos.
    // El código PHP debería ir aquí.
    ?>

    <script>
        // En esta sección, puedes utilizar Chart.js para crear el gráfico con los datos obtenidos del servidor.
        // Debes reemplazar esta parte con el código que procesa los datos y crea el gráfico.
        // Aquí se proporciona un ejemplo básico de cómo configurar un gráfico lineal.

        var ctx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [], // Etiquetas de fechas
                datasets: [{
                    label: 'Gasto de Combustible por Chofer',
                    data: [], // Montos de gastos
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'time', // Utiliza escalas de tiempo para el eje X
                        time: {
                            unit: 'day' // Configura la unidad de tiempo (puede ser 'day', 'month', etc.)
                        },
                        title: {
                            display: true,
                            text: 'Fecha'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Monto'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>


