

<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $camionid = $_POST['camionid'];
    $fechainicio = $_POST['fechainicio'];
    $fechafin = $_POST['fechafin'];
    $kilometrajeinicio = $_POST['kilometrajeinicio'];
    $kilometrajefin = $_POST['kilometrajefin'];
    $gastoPetroleo = $_POST['gastoPetroleo'];



    $sql = "INSERT INTO mediciongastopetroleosemanal (CamionID, FechaInicio, FechaFin, KilometrajeInicio, KilometrajeFin, GastoPetroleo) VALUES ('$camionid', '$fechainicio', '$fechafin', '$kilometrajeinicio', '$kilometrajefin', '$gastoPetroleo')";
    if ($conn->query($sql) === true) {
        echo "Medicion creado exitosamente";
        header("Location: http://localhost/Medicion/LeerMedicion.php");
        exit; 
    } else {
        echo "Error al crear la Medicion: " . $conn->error;
    }
}
?>

<!-- </body>
</html> -->


<?php


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
                <br>
                <br>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="col col-sm-12 col-md-12">
                                <h2>Formulario de la Medicion de Gasto</h2>
                            </div>

                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="camionid">CamionID:</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <select class="form-control" name="camionid">
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
                                        <label for="fechainicio">FechaInicio:</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="date" id="fechainicio" name="fechainicio" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="fechafin">FechaFin:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="date" id="fechafin" name="fechafin" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="kilometrajeinicio">KilometrajeInicio:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="number" id="kilometrajeinicio" name="kilometrajeinicio" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="kilometrajefin">KilometrajeFin:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="number" id="kilometrajefin" name="kilometrajefin" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="gastoPetroleo">GastoPetroleo:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="number" id="gastoPetroleo" name="gastoPetroleo" required>
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