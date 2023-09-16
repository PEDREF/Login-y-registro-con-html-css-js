<?php
    session_start();
    include '../conexion.php';
    $id = $_SESSION['id'];
    // Realizar la consulta
    // if($_SESSION["type"] == "Chofer"){
    //     $sql = "SELECT * FROM ruta where choferId='$id' OR choferId IS NULL";

    // }else{
        $sql = "SELECT * FROM ruta";
    // }
    $result = $conn->query($sql);
    // Ruta::where('choferId', $_SESSION['id']->orWhereNull('choferId'))->get();
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
            window.location.href = 'ModificarRuta.php?id=' + id;
        }
        function eliminar(id) {
            // Redirigir a la página de edición con el ID del elemento
            //console.log(id);
            window.location.href = 'EliminarRuta.php?id=' + id;
        }
        // function changeStatus(value, id) {
        //     // Redirigir a la página de edición con el ID del elemento
        //     // console.log(value);
        //     window.location.href = 'changestatus.php?id=' + id + '&value=' + value;
        // }
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
                <!-- contenido de la pagina -->
                <div class="container">
                    <div class="header">
                        <h1>Mis Rutas</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex flex-row justify-content-end" >
                            <a href="../Ruta/CrearRuta.php" class="btn btn-primary">
                                <i class="bi bi-plus-lg"> Agregar</i>
                            </a>
                        </div>
                    </div><br>

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Distancia</th>
                                <th>Peaje</th>
                                <!-- <?php
                                    if($_SESSION["type"] == "Chofer"){
                                ?>
                                    <th>Estado</th>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($_SESSION["type"] == "Administrador"){
                                ?>
                                    <th>Estado</th>
                                    <th>ChoferId</th>
                                <?php
                                    }
                                ?> -->
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                //print_r($row);
                                ?>
                                <tr>
                                    <td><?php echo $row['Id']; ?></td>
                                    <td><?php echo $row['Origen']; ?></td>
                                    <td><?php echo $row['Destino']; ?></td>
                                    <td><?php echo $row['Distancia']; ?> Km </td>
                                    <td> $ <?php echo $row['Peaje']; ?></td>
                                    <!-- <?php
                                        if($_SESSION["type"] == "Chofer"){
                                    ?>
                                        <td>
                                            <div class="dropdown">
                                                <?php
                                                    if($row['status'] == 1){
                                                ?>
                                                <button class="btn btn-primary dropdown-toggle" style="background-color:#cccccc;color:#000;" type="button" data-toggle="dropdown">
                                                    Pendiente
                                                </button>
                                                <?php
                                                    }elseif($row['status'] == 2){
                                                ?>
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                                    En Proceso
                                                </button>
                                                <?php
                                                    }elseif($row['status'] == 3){
                                                ?>
                                                <button class="btn btn-primary dropdown-toggle" style="background-color:#008f39;" type="button" data-toggle="dropdown">
                                                    Terminada
                                                </button>
                                                <?php
                                                    }
                                                ?>

                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" name="status" onclick="changeStatus(1, <?php echo $row['Id']; ?>)" value="0">Pendiente</button>
                                                    <button class="dropdown-item" name="status" onclick="changeStatus(2, <?php echo $row['Id']; ?>)" value="1">En Proceso</button>
                                                    <button class="dropdown-item" name="status" onclick="changeStatus(3, <?php echo $row['Id']; ?>)" value="2">Terminado</button>
                                                </div>
                                            </div>
                                        </td>
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        if($_SESSION["type"] == "Administrador"){
                                    ?>
                                    <td>
                                        <?php
                                            if($row['status'] == 1){
                                        ?>
                                        <label class="form-control" style="background-color:#cccccc;color:#000;" type="label">
                                            Pendiente
                                        </label>
                                        <?php
                                            }elseif($row['status'] == 2){
                                        ?>
                                        <label class="form-control btn-primary"  type="label">
                                            En Proceso
                                        </label>
                                        <?php
                                            }elseif($row['status'] == 3){
                                        ?>
                                        <label class="form-control" style="background-color:#008f39;" type="label">
                                            Pendiente
                                        </label>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if($row['choferId'] > 0){echo $row['choferId'];}else{ echo '';} ?>
                                    </td>
                                    <?php
                                        }
                                    ?> -->
                                    <td>
                                    <?php
                                    if($_SESSION["type"] == "Administrador"){
                                    ?>
                                        <a class="btn btn-primary" onclick="editar('<?php echo $row['Id']; ?>')">
                                            Editar
                                        </a>
                                        <a class="btn btn-danger" onclick="eliminar('<?php echo $row['Id']; ?>')">
                                            Eliminar
                                        </a>
                                    <?php   
                                    } else {
                                        echo "";
                                    }
                                    ?>
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
