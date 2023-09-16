
<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST['modelo'];
    $capacidad = $_POST['capacidad'];
    $consumo = $_POST['consumo'];
    $patente = $_POST['patente'];
    $marca = $_POST['marca'];

    $sql = "INSERT INTO camion (Modelo, Capacidad, Consumo, marca, patente) VALUES ('$modelo', '$capacidad', '$consumo', '$marca', '$patente')";
    if ($conn->query($sql) === true) {
        echo "Camión creado exitosamente";
        header("Location: http://localhost/Camion/LeerCamion.php");
        exit; 
    } else {
        echo "Error al crear el camión: " . $conn->error;
    }
}
?>
<?php

    // session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FlowerLogistics</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Topbar -->
    <?php
        include('../topbar.php');

    ?>
    <!-- Sidebar -->
    <?php
        include('../sidebar.php');
    ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
            <br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="container-fluid">
                    <div class="container">
                        <div class="col col-sm-12 col-md-12">
                            <h2>Formulario de Camion</h2>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="marca">Marca:</label><br>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <input class="form-control" type="text" id="marca" name="marca" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="marca">Patente:</label><br>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <input class="form-control" type="text" id="patente" name="patente" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="nombre">Modelo:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <input class="form-control" type="text" id="modelo" name="modelo" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="consumo">Consumo Petroleo:</label><br>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <input class="form-control" type="number" id="consumo" name="consumo" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="capacidad">Capacidad Carga:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <input class="form-control" type="number" id="capacidad" name="capacidad" required>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="mensaje">Empresa:</label><br>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <select class="form-control" name="empresa">
                                        <option value="1">Value 1</option>
                                        <option value="2" selected>Value 2</option>
                                        <option value="3">Value 3</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <input class="btn btn-primary btn-block" type="submit" value="Guardar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <!-- Page content goes here -->
          <!-- <p>Content goes here</p> -->
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php
        include('../footer.php')
    ?>
  </div>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>
</html>
