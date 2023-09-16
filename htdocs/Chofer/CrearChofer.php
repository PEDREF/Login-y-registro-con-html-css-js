
<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $licencia = $_POST['licencia'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $sql = "INSERT INTO chofer (Nombre, LicenciaConducir,  contraseña, username) VALUES ('$nombre', '$licencia', '$password','$username')";
    if ($conn->query($sql) === TRUE) {
        echo "Chofer creado con exito.";
    } else {
        echo "Error al crear chofer: " . $conn->error;
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
                <br><br>
                <!-- contenido de la pagina -->
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="col col-sm-12 col-md-12">
                                <h2>Formulario de Chofer</h2>
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
                                        <label for="licencia">Licencia :</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="text" id="licencia" name="licencia" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="nombre">Nombre usuario:</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="text" id="nombre" name="username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="pass">Contraseña:</label>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input class="form-control" type="password" id="nombre" name="password" required>
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
