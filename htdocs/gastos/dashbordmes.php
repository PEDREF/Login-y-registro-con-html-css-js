<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Gasto de Combustible por Mes</title>
    <!-- Agrega el enlace a la biblioteca de Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
    <h1>Dashboard Gasto de Combustible por Mes</h1>
    
    <!-- Formulario para seleccionar el año -->
    <form action="" method="post">
        <label for="year">Selecciona el año:</label>
        <select id="year" name="year">
            <?php
            // Genera opciones para los últimos 5 años, puedes personalizar esto según tus necesidades.
            $currentYear = date("Y");
            for ($i = $currentYear; $i >= $currentYear - 4; $i--) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        <input type="submit" value="Mostrar">
    </form>

    <!-- Contenedor para el gráfico -->
    <div style="width: 80%; margin: 0 auto;">
        <canvas id="lineChart" width="400" height="200"></canvas>
    </div>

    <?php
    // Aquí debes agregar el código PHP para obtener los datos de gastos de combustible por mes para el año seleccionado.
    // Puedes preparar los datos para el gráfico y almacenarlos en variables, por ejemplo, $labels y $data.

    // Ejemplo de cómo podrías obtener los datos (esto debe ajustarse según tu estructura de base de datos):
    // $year = $_POST['year'];
    // $data = obtenerDatosDeGastosPorMes($year);
    // $labels = $data['meses'];
    // $montos = $data['montos'];
    ?>

    <script>
        // Aquí, utiliza PHP para imprimir las variables $labels y $montos en formato JavaScript para que puedas utilizarlos en Chart.js.

        var ctx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [], // Etiquetas de meses
                datasets: [{
                    label: 'Gasto de Combustible por Mes',
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
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Mes'
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
