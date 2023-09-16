
<?php
include '../conexion.php';
// require_once('../selectores.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $camionid = $_POST['camion'];
    $rutaid = $_POST['ruta'];
    $choferid = $_POST['choferid'];
    $gasto = $_POST['gasto'];

    $sql = "INSERT INTO viaje (Fecha, camionId, rutaId, gasto) VALUES ('$fecha', '$camionid', '$rutaid', '$gasto')";
    if ($conn->query($sql) === true) {
        echo "Viaje creado exitosamente";
        header("Location: http://localhost/Viaje/LeerViaje.php");
        exit; 
    } else {
        echo "Error al crear el viaje: " . $conn->error;
    }
}

    $query1 = "SELECT * FROM ruta";
    $rutas = $conn->query($query1);

    $query2 = "SELECT * FROM chofer";
    $choferes = $conn->query($query2);

    $query3 = "SELECT * FROM camion";
    $camiones = $conn->query($query3);

    // $conn->close();

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
                <?php
                    // print_r($rutas);  
                ?>
                <br>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                                        <input class="form-control" type="date" id="fecha" name="fecha" required>
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
                                            <option value=""></option>
                                            <?php
                                                if ($camiones) {
                                                    while ($camion = $camiones->fetch_assoc()) {
                                            ?>
                                                        <option value="<?php echo $camion['Id']; ?>">
                                                            <?php echo $camion['Modelo']; ?> - 
                                                            <?php echo $camion['patente']; ?> 
                                                        </option>
                                            <?php
                                                    }  
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="mensaje">Ruta:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <select class="form-control" name="ruta">
                                            <option value=""></option>
                                            <?php
                                                if ($rutas) {
                                                    while ($row = $rutas->fetch_assoc()) {
                                            ?>
                                                        <option value="<?php echo $row['Id']; ?>">
                                                            <?php echo $row['Origen']; ?> -<br>
                                                            <?php echo $row['Destino']; ?>
                                                        </option>
                                            <?php
                                                    }  
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="choferid">Chofer:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <select class="form-control" name="chofer">
                                            <option value=""></option>
                                            <?php
                                                // if ($choferes) {
                                                //     while ($chofer = $choferes->fetch_assoc()) {
                                            ?>
                                                        <option value="<?php// echo $chofer['id']; ?>">
                                                            <?php //echo $chofer['Nombre']; ?> 
                                                        </option>
                                            <?php
                                                //     }  
                                                // }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="gasto">GastoPetróleo:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="number" id="gasto" name="gasto" required>
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