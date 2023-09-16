<?php
// Agrega la configuración de tu base de datos aquí
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flowerslogistics";

// Crea una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Variables para almacenar las fechas seleccionadas
$fechaInicio = "";
$fechaFin = "";

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene las fechas seleccionadas
    $fechaInicio = $_POST["fecha_inicio"];
    $fechaFin = $_POST["fecha_fin"];
    
    // Consulta SQL para obtener los datos de gasto de combustible por camiones según las fechas seleccionadas
    $sql = "SELECT FechaInicio, GastoPetroleo FROM mediciongastopetroleosemanal WHERE fechaFin BETWEEN '$fechaInicio' AND '$fechaFin'";
    
    $result = $conn->query($sql);
}

// Cierra la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Gasto de Combustible por Camiones</title>
    <!-- Agrega el enlace a la biblioteca de Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
    <h1>Dashboard Gasto de Combustible por Camiones</h1>
    
    <!-- Formulario para seleccionar fechas -->
    <form action="" method="post">
        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $fechaInicio; ?>">
        <label for="fecha_fin">Fecha de fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $fechaFin; ?>">
        <input type="submit" value="Filtrar">
    </form>

    <!-- Contenedor para el gráfico -->
    <div style="width: 80%; margin: 0 auto;">
        <canvas id="lineChart" width="400" height="200"></canvas>
    </div>

    <script>
        // En esta sección, puedes utilizar Chart.js para crear el gráfico con los datos obtenidos del servidor.
        var ctx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "'" . $row["fecha"] . "', ";
                        }
                    }
                ?>], // Fechas
                datasets: [{
                    label: 'Gasto de Combustible por Camiones',
                    data: [<?php
                        if ($result->num_rows > 0) {
                            $result->data_seek(0); // Reinicia el puntero de resultados
                            while ($row = $result->fetch_assoc()) {
                                echo $row["monto"] . ", ";
                            }
                        }
                    ?>], // Montos de gastos
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
