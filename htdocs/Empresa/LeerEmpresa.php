

<?php

    include '../conexion.php';

// Obtener todas las empresas de la base de datos
$sql = "SELECT * FROM empresa";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>FloweLogistics</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <script>
        function editar(id) {
            // Redirigir a la página de edición con el ID del elemento
            //console.log(id);
            window.location.href = 'ModificarEmpresa.php?id=' + id;
        }
        function eliminar(id) {
            // Redirigir a la página de edición con el ID del elemento
            //console.log(id);
            window.location.href = 'EliminarEmpresa.php?id=' + id;
        }
    </script>
    <div class="container-2">
        <?php
            include '../sidebar.php';
        ?>
        <div class="content">
            <?php
                include '../topbar.php';
            ?>
            <br>
            <br>
            <!-- contenido de la pagina -->
            <div class="container">
                <div class="header">
                    <h1>Mis Empresas</h1>
                </div>
                <div class="row">
                    <!-- <div class="col-md-6">

                    </div> -->
                    <div class="col-md-12 d-flex flex-row justify-content-end" >
                        <a href="../Empresa/CrearEmpresa.php" class="btn btn-primary">
                            <i class="bi bi-plus-lg"> Agregar</i>
                        </a>
                    </div>
                </div><br>
                <table id="table" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
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
                                <td><?php echo $row['Nombre']; ?></td>
                                <td><?php echo $row['Direccion']; ?></td>
                                <td><?php echo $row['Telefono']; ?></td>
                             <td>
                                    <a class="btn btn-primary" onclick="editar('<?php echo $row['Id']; ?>')">
                                        Editar
                                    </a>
                                    <a class="btn btn-danger" onclick="eliminar('<?php echo $row['Id']; ?>')">
                                        Eliminar
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
            <br>
            <?php
                include '../footer.php';
            ?>
        </div>
    </div>
    <script src="../script2.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>
</html>