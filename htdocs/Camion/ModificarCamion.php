


<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $modelo = $_POST['modelo'];
    $capacidad = $_POST['capacidad'];
    $consumo = $_POST['consumo'];
    $marca = $_POST['marca'];
    $patente = $_POST['patente'];
    // echo json_encode($_POST);

    // Actualizar datos en la tabla Camion
    $sql = "UPDATE camion SET Modelo='$modelo', Capacidad='$capacidad', Consumo='$consumo', patente='$patente', marca='$marca' WHERE ID='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Camión actualizado exitosamente";
        header("Location: http://localhost/Camion/LeerCamion.php");
        exit; 
    } else {
        echo "Error al actualizar el camión: " . $conn->error;
    }
}

// Obtener ID del camión a modificar
$id = $_GET['id'];

// Obtener datos del camión de la base de datos
$sql = "SELECT * FROM camion WHERE Id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
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
                <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                <div class="container-fluid">
                    <div class="container">
                        <div class="col col-sm-12 col-md-12">
                            <h2>Formulario de Camion</h2>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="marca">Marca:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="text" id="modelo" name="modelo" required> -->
                                    <input class="form-control" type="text" id="marca" name="marca" value="<?php echo $row['marca']; ?>" required><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="modelo">Patente:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="text" id="modelo" name="modelo" required> -->
                                    <input class="form-control" type="text" id="patente" name="patente" value="<?php echo $row['patente']; ?>" required><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="modelo">Modelo:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="text" id="modelo" name="modelo" required> -->
                                    <input class="form-control" type="text" id="modelo" name="modelo" value="<?php echo $row['Modelo']; ?>" required><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="capacidad">Capacidad Carga:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="text" id="capacidad" name="capacidad" required> -->
                                    <input class="form-control" type="text" id="capacidad" name="capacidad" value="<?php echo $row['Capacidad']; ?>" required><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="consumo">Consumo Petroleo:</label><br>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="text" id="consumo" name="consumo" required> -->
                                    <input class="form-control" type="text" id="consumo" name="consumo" value="<?php echo $row['Consumo']; ?>" required><br>

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
                                        <option value="1" <?php// if ($row['EmpresaID'] == 1) echo "selected"; ?>>Value 1</option>
                                        <option value="2" <?php// if ($row['EmpresaID'] == 2) echo "selected"; ?>>Value 2</option>
                                        <option value="3" <?php// if ($row['EmpresaID'] == 3) echo "selected"; ?>>Value 3</option>
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
