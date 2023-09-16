
<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $distancia = $_POST['distancia'];
    $peaje = $_POST['peaje'];

    // echo json_encode($_POST);

    // Actualizar datos en la tabla Ruta
    $sql = "UPDATE ruta SET Origen='$origen', Destino='$destino', Distancia='$distancia', Peaje='$peaje' WHERE ID='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Ruta actualizado exitosamente";
        header("Location: http://localhost/Ruta/LeerRuta.php");
        exit; 
    } else {
        echo "Error al actualizar el Ruta: " . $conn->error;
    }
}

// Obtener ID del Ruta a modificar
$id = $_GET['id'];

// Obtener datos del Ruta de la base de datos
$sql = "SELECT * FROM ruta WHERE Id='$id'";
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
    <script>
        function editar(id) {
            // Redirigir a la página de edición con el ID del elemento
            //console.log(id);
            window.location.href = 'ModificarCamion.php?id=' + id;
        }
        function eliminar(id) {
            // Redirigir a la página de edición con el ID del elemento
            //console.log(id);
            window.location.href = 'EliminarCamion.php?id=' + id;
        }
    </script>
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
                                <h2>Formulario de Ruta</h2>
                            </div>

                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="origen">Origen:</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="text" id="origen" name="origen" value="<?php echo $row['Origen']; ?>" required><br>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="destino">Destino:</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="text" id="destino" name="destino" value="<?php echo $row['Destino']; ?>" required><br>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="distancia">Distancia:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="number" id="distancia" name="distancia" value="<?php echo $row['Distancia']; ?>" required><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="peaje">Peaje:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="number" id="peaje" name="peaje" value="<?php echo $row['Peaje']; ?>" required><br>
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
                                            <option value="1" <?php //if ($row['EmpresaID'] == 1) echo "selected"; ?>>Value 1</option>
                                            <option value="2" <?php //if ($row['EmpresaID'] == 2) echo "selected"; ?>>Value 2</option>
                                            <option value="3" <?php //if ($row['EmpresaID'] == 3) echo "selected"; ?>>Value 3</option>
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
