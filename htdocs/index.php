<?php
session_start();
if (empty($_SESSION['id'])) {
    header("Location: ../../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Logistics</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Topbar -->
        <?php
        include('topbar.php');
        ?>
        <!-- Sidebar -->
        <?php
        include('sidebar.php');
        ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Contenido</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <!-- Título de la página -->
                    <h1 class="m-0">Contenido</h1>

                    <!-- Gráfico de Barras -->
                    <div style="width: 50%; margin: 0 auto;">
                        <canvas id="graficoBar"></canvas>
                        
                    </div>

                    <!-- Resto del contenido de la página -->
                    <!-- ... -->
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php
        include('footer.php')
        ?>

    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

    <!-- Código del Gráfico -->
    <script>
        // Función para obtener los datos de gastos por chofer
        function obtenerDatosGastosChofer() {
            fetch('dashboard/get_gasto_chofer.php')
                .then(response => response.json())
                .then(data => {
                    console.log("que viene aca",data);
                    // Procesa los datos y crea el gráfico de barras
                    var labels = [];
                    var values = [];

                    data.forEach(item => {
                        labels.push(item.chofer);
                        values.push(item.total_gasto);
                    });

                    // Datos para el gráfico
                    var data = {
                        labels: labels,
                        datasets: [{
                            label: 'Gastos de Petróleo por Chofer',
                            data: values,
                            backgroundColor: 'rgba(255, 99, 132, 0.6)',
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
                })
                .catch(error => {
                    //console.error("Error al obtener los datos:", error);
                });
        }

        // Llama a la función para obtener los datos y crear el gráfico
        obtenerDatosGastosChofer();
    </script>
</body>

</html>
