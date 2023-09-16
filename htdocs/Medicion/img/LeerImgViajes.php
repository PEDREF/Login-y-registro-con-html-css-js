<?php
    include '../../conexion.php';
    session_start();
    $user_id = $_SESSION['id'];
    $medicionId = $_GET['id'];

    $sql = "SELECT * FROM archivos where medicionId=$medicionId";
    // echo $sql;
    
    $result = $conn->query($sql);
    // print_r($result);


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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <style>
    .eye-icon {
      display: inline-block;
      font-size: 18px;
      color: black;
    }
    .button {
        display: inline-block;
        padding: 10px;
        background-color: #f2f2f2;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        color: #000;
    }

    .trash-icon {
       margin-right: 5px;
    }
  </style>

</head>
<body class="hold-transition sidebar-mini">
    <script>
        function editar(id) {
            // Redirigir a la página de edición con el ID del elemento
            //console.log(id);
            window.location.href = 'ModificarViaje.php?id=' + id;
        }
        function agregar(id) {
            // Redirigir a la página de edición con el ID del elemento
            //console.log(id);
            window.location.href = '../../Medicion/img/imagenesViaje.php?id=' + id;
        }
        function ver(paths) {
            // Redirigir a la página de edición con el paths del elemento
            //console.log(id);
            window.location.href = '../../' + paths;
        }
        function changeStatus(value, id) {
            // Redirigir a la página de edición con el ID del elemento
            // console.log(id);
            window.location.href = 'changestatus.php?id=' + id + '&value=' + value;
        }
    </script>
  <div class="wrapper">
    <!-- Topbar -->
    <?php
        include('../../topbar.php');

    ?>
    <!-- Sidebar -->
    <?php
        include('../../sidebar.php');
    ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
                <br>
                    <!-- contenido de la pagina -->
                    <div class="container">
                        <div class="header">
                            <h1>Imagenes de respaldo</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex flex-row justify-content-end" >
                                <a onclick="agregar('<?php echo $medicionId; ?>')" class="btn btn-primary">
                                    <i class="bi bi-plus-lg"> Agregar</i>
                                </a>
                            </div>
                        </div><br>
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // print_r($row);
                                    ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                if($row['tipo_archivo'] == 1){
                                                    echo "Kilometraje antes";
                                                }elseif($row['tipo_archivo'] == 2){
                                                    echo "Kilometraje despues";
                                                }elseif($row['tipo_archivo'] == 3){
                                                    echo "Peaje";
                                                } elseif($row['tipo_archivo'] == 4){
                                                    echo "Entrega";
                                                } 
                                                ?>
                                            </td>
                                            <td>
                                            <img src="../../<?php echo $row['path']; ?>" width="200" height="200">
                                            </td>
                                        <td>

                                            <a class="btn btn-secondary btn-xs"onclick="ver('<?php echo $row['path']; ?>')">
                                                <i class="fa fa-eye eye-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No se encontraron resultados</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
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
    //    include('../footer.php')
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
