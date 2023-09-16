


<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $camionid = $_POST['camionid'];
    $fechainicio = $_POST['fechainicio'];
    $fechafin = $_POST['fechafin'];
    $kilometrajeinicio = $_POST['kilometrajeinicio'];
    $kilometrajefin = $_POST['kilometrajefin'];
    $gastoPetroleo = $_POST['gastoPetroleo'];
    // echo json_encode($_POST);

    // Actualizar datos en la tabla Medicion
    $sql = "UPDATE mediciongastopetroleosemanal SET CamionID='$camionid', FechaInicio='$fechainicio', FechaFin='$fechafin', KilometrajeInicio='$kilometrajeinicio', KilometrajeFin='$kilometrajefin', GastoPetroleo='$gastoPetroleo' WHERE ID='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Medicion actualizado exitosamente";
        header("Location: http://localhost/Medicion/LeerMedicion.php");
        exit; 
    } else {
        echo "Error al actualizar el Medicion: " . $conn->error;
    }
}

// Obtener ID del Medicion a modificar
$id = $_GET['id'];

// Obtener datos del Medicion de la base de datos
$sql = "SELECT * FROM mediciongastopetroleosemanal WHERE Id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<?php
include '../conexion.php';

// Inicio Selectores

$query3 = "SELECT * FROM camion";
$camiones = $conn->query($query3);

// Fin Selectores

// Obtener ID del Viaje a modificar
$id = $_GET['id'];



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
                <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                <div class="container-fluid">
                    <div class="container">
                        <div class="col col-sm-12 col-md-12">
                            <h2>Formulario de Medicion</h2>
                        </div>

                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="camionid">CamionID:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <select class="form-control" name="camionid">
                                        <option value=""> </option>
                                        <?php
                                            if ($camiones) {
                                                while ($camion = $camiones->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $camion['Id']; ?>" <?php if ($camion['Id'] == $row['CamionID']) echo "selected"; ?>>
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
                                    <label for="fechainicio">Fechainicio:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="date" id="fechainicio" name="fechainicio" required> -->
                                    <input class="form-control" type="date" id="fechainicio" name="fechainicio" value="<?php echo $row['FechaInicio']; ?>" ><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="fechafin">Fechafin:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="date" id="fechafin" name="fechafin" required> -->
                                    <input class="form-control" type="date" id="fechafin" name="fechafin" value="<?php echo $row['FechaFin']; ?>" ><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="kilometrajeinicio">Kilometrajeinicio:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="number" id="kilometrajeinicio" name="kilometrajeinicio" required> -->
                                    <input class="form-control" type="number" id="kilometrajeinicio" name="kilometrajeinicio" value="<?php echo $row['KilometrajeInicio']; ?>" ><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="kilometrajefin">KilometrajeFin:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="number" id="kilometrajefin" name="kilometrajefin" required> -->
                                    <input class="form-control" type="number" id="kilometrajefin" name="kilometrajefin" value="<?php echo $row['KilometrajeFin']; ?>" ><br>

                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="gastoPetroleo">GastoPetroleo:</label><br>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="number" id="gastoPetroleo" name="gastoPetroleo" required> -->
                                    <input class="form-control" type="number" id="gastoPetroleo" name="gastoPetroleo" value="<?php echo $row['GastoPetroleo']; ?>" required><br>

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