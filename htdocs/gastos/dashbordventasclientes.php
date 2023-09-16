<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Gasto de Combustible y Ventas por Clientes</title>
    <!-- Agrega el enlace a la biblioteca de Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
    <h1>Dashboard Gasto de Combustible y Ventas por Clientes</h1>
    
    <!-- Formulario para seleccionar opciones -->
    <form action="" method="post">
        <label for="opcion">Selecciona una opción:</label>
        <select id="opcion" name="opcion">
            <option value="mediciongastopetroleosemanal">Gastos de Petróleo por Clientes</option>
            <option value="ventas_clientes">Ventas por Clientes</option>
        </select>
        <input type="submit" value="Mostrar">
    </form>

    <!-- Botón para alternar entre vista de fecha y clientes -->
    <button id="toggleButton" onclick="toggleView()">Ver Fecha</button>

    <!-- Contenedor para el rango de fechas (inicialmente oculto) -->
    <div id="dateRange" style="display: none;">
        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio">
        <label for="fecha_fin">Fecha de fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin">
    </div>

    <!-- Contenedor para el gráfico -->
    <div style="width: 80%; margin: 0 auto;">
        <canvas id="lineChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Función para alternar entre vista de fecha y clientes
        function toggleView() {
            var dateRange = document.getElementById('dateRange');
            var toggleButton = document.getElementById('toggleButton');

            if (dateRange.style.display === 'none') {
                dateRange.style.display = 'block';
                toggleButton.textContent = 'Ver Clientes';
            } else {
                dateRange.style.display = 'none';
                toggleButton.textContent = 'Ver Fecha';
            }
        }

        // Resto de tu código JavaScript para configurar el gráfico (sin cambios)
        var ctx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [], // Etiquetas de fechas o clientes, según la opción seleccionada
                datasets: [{
                    label: 'Gasto de Combustible', // Nombre del conjunto de datos
                    data: [], // Montos de gastos o ventas, según la opción seleccionada
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
                        type: 'time', // Utiliza escalas de tiempo para el eje X (si corresponde)
                        time: {
                            unit: 'month' // Configura la unidad de tiempo (puede ser 'day', 'month', etc.)
                        },
                        title: {
                            display: true,
                            text: 'Fecha' // Título del eje X
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Monto' // Título del eje Y
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
