<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de Barras</title>
    <!-- Incluye Chart.js desde la CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Contenedor para el gráfico -->
    <div style="width: 50%; margin: 0 auto;">
        <canvas id="graficoBar"></canvas>
    </div>

    <script>
        // Función para obtener los datos de gastos por vehículos
        function obtenerDatosGastosVehiculos() {
            fetch('get_gasto_vehiculos.php')
                .then(response => response.json())
                .then(data => {
                    // Procesa los datos y crea el gráfico de barras
                    var labels = [];
                    var values = [];

                    data.forEach(item => {
                        labels.push(item.vehiculo);
                        values.push(item.total_gasto);
                    });

                    // Datos para el gráfico
                    var data = {
                        labels: labels,
                        datasets: [{
                            label: 'Gastos de Petróleo por Vehículo',
                            data: values,
                            backgroundColor: 'rgba(255, 99, 132, 0.6)', // Cambia el color si lo deseas
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    };

                    // Configuración del gráfico
                    var config = {
                        type: 'bar',
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    };

                    // Crear el gráfico en el lienzo
                    var ctx = document.getElementById('graficoBar').getContext('2d');
                    var myChart = new Chart(ctx, config);
                });
        }

        // Llama a la función para obtener los datos y crear el gráfico
        obtenerDatosGastosVehiculos();
    </script>
</body>
</html>
