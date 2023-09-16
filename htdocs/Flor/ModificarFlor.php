



<?php
include '../conexion.php';
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $flor_id = $_POST['flor_id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $peso = $_POST['peso'];
    $precio = $_POST['precio'];
// echo $id;
    // Actualizar datos en la tabla flor
    $sql = "UPDATE flor SET Nombre='$nombre', Descripcion='$descripcion', PesoPromedio='$peso', PrecioVenta='$precio' WHERE Id='$flor_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Flor actualizado exitosamente";
        header("Location: http://localhost/Flor/LeerFlor.php");
        exit; 
    } else {
        echo "Error al actualizar el Flor: " . $conn->error;
    }
}

// Obtener ID del Flor a modificar
// $id = $_GET['id'];

// Obtener datos del Flor de la base de datos
$sql = "SELECT * FROM flor WHERE Id='$id'";
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
                <!-- contenido de la pagina -->
                <br><br>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="col col-sm-12 col-md-12">
                                <h2>Formulario de flor</h2>
                            </div>

                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="nombre">Nombre:</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <!-- <input class="form-control" type="text" id="Nombre" name="Nombre" required> -->
                                        <input class="form-control" type="text" id="Nombre" name="nombre" value="<?php echo $row['Nombre']; ?>" required><br>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="descripcion">Descripcion:</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <!-- <input class="form-control" type="text" id="descripcion" name="descripcion" required> -->
                                        <input class="form-control" type="text" id="descripcion" name="descripcion" value="<?php echo $row['Descripcion']; ?>" required><br>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="peso">Peso (gr) :</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <!-- <input class="form-control" type="text" id="peso" name="peso" required> -->
                                        <input class="form-control" type="number" id="peso" name="peso" value="<?php echo $row['PesoPromedio']; ?>" required><br>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="precio">Precio (CLP) :</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <!-- <input class="form-control" type="text" id="precio" name="precio" required> -->
                                        <input class="form-control" type="number" id="precio" name="precio" value="<?php echo $row['PrecioVenta']; ?>" required><br>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="btn btn-primary btn-block" type="submit" value="Guardar">
                                        <input name="flor_id" type="hidden" value="<?php echo $row['Id']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <br><br>
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


