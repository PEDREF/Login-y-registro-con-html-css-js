
<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $camion = $_POST['camion'];
    $gasto = $_POST['gasto'];
    $ruta = $_POST['ruta'];
    // echo json_encode($_POST);

    // Actualizar datos en la tabla Viaje
    $sql = "UPDATE viaje SET Fecha='$fecha', camionId='$camion', rutaId='$ruta', gasto='$gasto' WHERE ID='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Viaje actualizado exitosamente";
        header("Location: http://localhost/Viaje/LeerViaje.php");
        exit; 
    } else {
        echo "Error al actualizar el Viaje: " . $conn->error;
    }
}
// Inicio Selectores
$query1 = "SELECT * FROM ruta";
$rutas = $conn->query($query1);

$query2 = "SELECT * FROM chofer";
$choferes = $conn->query($query2);

$query3 = "SELECT * FROM camion";
$camiones = $conn->query($query3);

// Fin Selectores

// Obtener ID del Viaje a modificar
$id = $_GET['id'];

// Obtener datos del Viaje de la base de datos
$sql = "SELECT * FROM viaje WHERE Id='$id'";
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
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

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
                                <h2>Formulario de Viaje</h2>
                            </div>

                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="fecha">Fecha:</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <!-- <input class="form-control" type="date" id="fecha" name="fecha" required> -->
                                        <input class="form-control" type="date" id="fecha" name="fecha" value="<?php echo $row['Fecha']; ?>" required><br>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="camionid">Camion:</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <select class="form-control" name="camion">
                                            <option value=""> </option>
                                            <?php
                                                if ($camiones) {
                                                    while ($camion = $camiones->fetch_assoc()) {
                                            ?>
                                                <option value="<?php echo $camion['Id']; ?>" <?php if ($camion['Id'] == $row['camionId']) echo "selected"; ?>>
                                                    <?php echo $camion['Modelo']; ?> - 
                                                    <?php echo $camion['patente']; ?> 
                                                </option>
                                            <?php
                                                    }  
                                                }
                                            ?>
                                        </select><br>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="rutaid">Ruta:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <select class="form-control" name="ruta">
                                            <option value=""> </option>
                                            <?php
                                                if ($rutas) {
                                                    while ($ruta = $rutas->fetch_assoc()) {
                                            ?>
                                                <option value="<?php echo $ruta['Id']; ?>" <?php if ($ruta['Id'] == $row['rutaId']) echo "selected"; ?>>
                                                    <?php echo $ruta['Origen']; ?> - 
                                                    <?php echo $ruta['Destino']; ?> 
                                                </option>
                                            <?php
                                                    }  
                                                }
                                            ?>
                                        </select><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="gasto">Gasto Petróleo:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="number" id="gasto" name="gasto" value="<?php echo $row['gasto']; ?>" required><br>

                                    </div>
                                </div>
                            </div>
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

        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php
        include('../footer.php')
    ?>

</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
        // console.log("hola")
    });
</script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>