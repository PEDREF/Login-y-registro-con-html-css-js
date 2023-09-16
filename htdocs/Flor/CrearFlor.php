

<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $peso = $_POST['peso'];
    $precio = $_POST['precio'];
    // print_r($_POST);

    $sql = "INSERT INTO flor (Nombre, Descripcion, PesoPromedio, PrecioVenta) VALUES ('$nombre', '$descripcion', '$peso', '$precio')";
    // echo $sql;
    if ($conn->query($sql) === true) {
        echo "Flor creado exitosamente";
        header("Location: http://localhost/Flor/LeerFlor.php");
        exit; 
    } else {
        echo "Error al crear la flor : " . $conn->error;
    }
}
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
            window.location.href = 'ModificarFlor.php?id=' + id;
        }
        function eliminar(id) {
            // Redirigir a la página de edición con el ID del elemento
            //console.log(id);
            window.location.href = 'EliminarFlor.php?id=' + id;
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
                <!-- contenido de la pagina -->
                <br><br>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="container-fluid">
                            <div class="container">
                                <div class="col col-sm-12 col-md-12">
                                    <h2>Formulario de Flor</h2>
                                </div>

                                <div class="row">
                                    <div class="col col-sm-12 col-md-12">
                                        <div class="col col-sm-6 col-md-6">
                                            <label for="nombre">Nombre:</label>
                                        </div>
                                        <div class="col col-sm-6 col-md-6">
                                            <input class="form-control" type="text" id="nombre" name="nombre" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-12 col-md-12">
                                        <div class="col col-sm-6 col-md-6">
                                            <label for="descripcion">Descripcion :</label>
                                        </div>
                                        <div class="col col-sm-6 col-md-6">
                                            <input class="form-control" type="text" id="descripcion" name="descripcion" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-12 col-md-12">
                                        <div class="col col-sm-6 col-md-6">
                                            <label for="peso">Peso (gr) :</label>
                                        </div>
                                        <div class="col col-sm-6 col-md-6">
                                            <input class="form-control" type="number" id="peso" name="peso" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-12 col-md-12">
                                        <div class="col col-sm-6 col-md-6">
                                            <label for="precio">Precio (CLP) :</label>
                                        </div>
                                        <div class="col col-sm-6 col-md-6">
                                            <input class="form-control" type="number" id="precio" name="precio" required>
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


