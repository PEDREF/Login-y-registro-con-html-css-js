// CrearEmpresa.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO Empresa (nombre, direccion, telefono) VALUES ('$nombre', '$direccion', '$telefono')";
    if ($conn->query($sql) === TRUE) {
        echo "Empresa creada exitosamente";
    } else {
        echo "Error al crear la empresa: " . $conn->error;
    }
}
?>

// LeerEmpresas.php
<?php
include 'Conexion.php';

$sql = "SELECT * FROM Empresa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "Dirección: " . $row["direccion"] . "<br>";
        echo "Teléfono: " . $row["telefono"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron empresas";
}
?>

// ActualizarEmpresa.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE Empresa SET nombre='$nombre', direccion='$direccion', telefono='$telefono' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Empresa actualizada exitosamente";
    } else {
        echo "Error al actualizar la empresa: " . $conn->error;
    }
}
?>

// EliminarEmpresa.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Empresa WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Empresa eliminada exitosamente";
    } else {
        echo "Error al eliminar la empresa: " . $conn->error;
    }
}
?>



// CrearCamion.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];

    $sql = "INSERT INTO Camion (marca, modelo, anio) VALUES ('$marca', '$modelo', '$anio')";
    if ($conn->query($sql) === TRUE) {
        echo "Camión creado exitosamente";
    } else {
        echo "Error al crear el camión: " . $conn->error;
    }
}
?>

// LeerCamiones.php
<?php
include 'Conexion.php';

$sql = "SELECT * FROM Camion";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Marca: " . $row["marca"] . "<br>";
        echo "Modelo: " . $row["modelo"] . "<br>";
        echo "Año: " . $row["anio"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron camiones";
}
?>

// ActualizarCamion.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];

    $sql = "UPDATE Camion SET marca='$marca', modelo='$modelo', anio='$anio' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Camión actualizado exitosamente";
    } else {
        echo "Error al actualizar el camión: " . $conn->error;
    }
}
?>

// EliminarCamion.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Camion WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Camión eliminado exitosamente";
    } else {
        echo "Error al eliminar el camión: " . $conn->error;
    }
}
?>



// CrearChofer.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO Chofer (nombre, apellido, telefono) VALUES ('$nombre', '$apellido', '$telefono')";
    if ($conn->query($sql) === TRUE) {
        echo "Chofer creado exitosamente";
    } else {
        echo "Error al crear el chofer: " . $conn->error;
    }
}
?>

// LeerChoferes.php
<?php
include 'Conexion.php';

$sql = "SELECT * FROM Chofer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "Apellido: " . $row["apellido"] . "<br>";
        echo "Teléfono: " . $row["telefono"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron choferes";
}
?>

// ActualizarChofer.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE Chofer SET nombre='$nombre', apellido='$apellido', telefono='$telefono' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Chofer actualizado exitosamente";
    } else {
        echo "Error al actualizar el chofer: " . $conn->error;
    }
}
?>

// EliminarChofer.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Chofer WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Chofer eliminado exitosamente";
    } else {
        echo "Error al eliminar el chofer: " . $conn->error;
    }
}
?>



// CrearFlor.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO Flor (nombre) VALUES ('$nombre')";
    if ($conn->query($sql) === TRUE) {
        echo "Flor creada exitosamente";
    } else {
        echo "Error al crear la flor: " . $conn->error;
    }
}
?>

// LeerFlores.php
<?php
include 'Conexion.php';

$sql = "SELECT * FROM Flor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron flores";
}
?>

// ActualizarFlor.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $sql = "UPDATE Flor SET nombre='$nombre' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Flor actualizada exitosamente";
    } else {
        echo "Error al actualizar la flor: " . $conn->error;
    }
}
?>

// EliminarFlor.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Flor WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Flor eliminada exitosamente";
    } else {
        echo "Error al eliminar la flor: " . $conn->error;
    }
}
?>






// CrearClientes.php
<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO clientes (Nombre, Correo, Telefono, Direccion) VALUES ('$nombre', '$correo', '$telefono', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente creado exitosamente.";
    } else {
        echo "Error al crear el cliente: " . $conn->error;
    }
}
?>

// LeerClientes.php
<?php
include 'conexion.php';

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Clientes</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Teléfono</th><th>Dirección</th><th>Acciones</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["Nombre"] . "</td>";
        echo "<td>" . $row["Correo"] . "</td>";
        echo "<td>" . $row["Telefono"] . "</td>";
        echo "<td>" . $row["Direccion"] . "</td>";
        echo "<td><a href='ver_cliente.php?id=" . $row["id"] . "'>Ver</a> | ";
        echo "<a href='editar_cliente.php?id=" . $row["id"] . "'>Editar</a> | ";
        echo "<a href='eliminar_cliente.php?id=" . $row["id"] . "'>Eliminar</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron clientes.";
}

$conn->close();
?>

// ActualizarClientes.php
<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE clientes SET Nombre='$nombre', Correo='$correo', Telefono='$telefono', Direccion='$direccion' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirige de vuelta a la página principal después de actualizar el cliente
        header("location: clientes.php");
        exit();
    } else {
        echo "Error al actualizar el cliente: " . $conn->error;
    }
}
?>

// EliminarClientes.php
<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE clientes SET Nombre='$nombre', Correo='$correo', Telefono='$telefono', Direccion='$direccion' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirige de vuelta a la página principal después de actualizar el cliente
        header("location: clientes.php");
        exit();
    } else {
        echo "Error al actualizar el cliente: " . $conn->error;
    }
}
?>




// CrearRuta.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO Ruta (nombre) VALUES ('$nombre')";
    if ($conn->query($sql) === TRUE) {
        echo "Ruta creada exitosamente";
    } else {
        echo "Error al crear la ruta: " . $conn->error;
    }
}
?>

// LeerRutas.php
<?php
include 'Conexion.php';

$sql = "SELECT * FROM Ruta";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron rutas";
}
?>

// ActualizarRuta.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $sql = "UPDATE Ruta SET nombre='$nombre' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Ruta actualizada exitosamente";
    } else {
        echo "Error al actualizar la ruta: " . $conn->error;
    }
}
?>

// EliminarRuta.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Ruta WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Ruta eliminada exitosamente";
    } else {
        echo "Error al eliminar la ruta: " . $conn->error;
    }
}
?>



// CrearViaje.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_camion = $_POST['id_camion'];
    $id_chofer = $_POST['id_chofer'];
    $id_flor = $_POST['id_flor'];
    $id_ruta = $_POST['id_ruta'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO Viaje (id_camion, id_chofer, id_flor, id_ruta, fecha) VALUES ('$id_camion', '$id_chofer', '$id_flor', '$id_ruta', '$fecha')";
    if ($conn->query($sql) === TRUE) {
        echo "Viaje creado exitosamente";
    } else {
        echo "Error al crear el viaje: " . $conn->error;
    }
}
?>

// LeerViajes.php
<?php
include 'Conexion.php';

$sql = "SELECT Viaje.id, Camion.marca, Camion.modelo, Chofer.nombre, Chofer.apellido, Flor.nombre AS nombre_flor, Ruta.nombre AS nombre_ruta, Viaje.fecha
        FROM Viaje
        INNER JOIN Camion ON Viaje.id_camion = Camion.id
        INNER JOIN Chofer ON Viaje.id_chofer = Chofer.id
        INNER JOIN Flor ON Viaje.id_flor = Flor.id
        INNER JOIN Ruta ON Viaje.id_ruta = Ruta.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Camión: " . $row["marca"] . " " . $row["modelo"] . "<br>";
        echo "Chofer: " . $row["nombre"] . " " . $row["apellido"] . "<br>";
        echo "Flor: " . $row["nombre_flor"] . "<br>";
        echo "Ruta: " . $row["nombre_ruta"] . "<br>";
        echo "Fecha: " . $row["fecha"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron viajes";
}
?>

// ActualizarViaje.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $id_camion = $_POST['id_camion'];
    $id_chofer = $_POST['id_chofer'];
    $id_flor = $_POST['id_flor'];
    $id_ruta = $_POST['id_ruta'];
    $fecha = $_POST['fecha'];

    $sql = "UPDATE Viaje SET id_camion='$id_camion', id_chofer='$id_chofer', id_flor='$id_flor', id_ruta='$id_ruta', fecha='$fecha' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Viaje actualizado exitosamente";
    } else {
        echo "Error al actualizar el viaje: " . $conn->error;
    }
}
?>

// EliminarViaje.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Viaje WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Viaje eliminado exitosamente";
    } else {
        echo "Error al eliminar el viaje: " . $conn->error;
    }
}
?>

// CrearMedicion.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $semana = $_POST['semana'];
    $gasto_petroleo = $_POST['gasto_petroleo'];

    $sql = "INSERT INTO MedicionGastoPetroleoSemanal (semana, gasto_petroleo) VALUES ('$semana', '$gasto_petroleo')";
    if ($conn->query($sql) === TRUE) {
        echo "Medición creada exitosamente";
    } else {
        echo "Error al crear la medición: " . $conn->error;
    }
}
?>

// LeerMediciones.php
<?php
include 'Conexion.php';

$sql = "SELECT * FROM MedicionGastoPetroleoSemanal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Semana: " . $row["semana"] . "<br>";
        echo "Gasto de petróleo: " . $row["gasto_petroleo"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron mediciones";
}
?>

// ActualizarMedicion.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $semana = $_POST['semana'];
    $gasto_petroleo = $_POST['gasto_petroleo'];

    $sql = "UPDATE MedicionGastoPetroleoSemanal SET semana='$semana', gasto_petroleo='$gasto_petroleo' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Medición actualizada exitosamente";
    } else {
        echo "Error al actualizar la medición: " . $conn->error;
    }
}
?>

// EliminarMedicion.php
<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM MedicionGastoPetroleoSemanal WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Medición eliminada exitosamente";
    } else {
        echo "Error al eliminar la medición: " . $conn->error;
    }
}
?>


