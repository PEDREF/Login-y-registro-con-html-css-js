<?php
session_start();
include('conexion.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM chofer WHERE username = '$username' AND contraseña = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $datos = $result->fetch_object();
            // echo "<div class='alert alert-success' >Inicio de sesión exitoso</div>";
            $_SESSION["id"] = $datos->Id;
            $_SESSION["Nombre"] = $datos->Nombre;
            $_SESSION["username"] = $datos->username;
            $_SESSION["type"] = "Chofer";
            header("Location: index.php");
        }else {
            $sql = "SELECT * FROM administradores WHERE username = '$username' AND contraseña = '$password'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $datos = $result->fetch_object();
                // echo "<div class='alert alert-success' >Inicio de sesión exitoso</div>";
                $_SESSION["id"] = $datos->id;
                $_SESSION["Nombre"] = $datos->nombre;
                $_SESSION["username"] = $datos->username;
                $_SESSION["type"] = "Administrador";
                header("Location: index.php");
            }else{
                echo "<div class='alert alert-danger' >Acceso denegado, Credenciales incorrectas</div>";
            }
        }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inicio Sesion | FlowerLogistics</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>FlowerLogistics</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar Sesion</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Nombre de usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          <!-- Contenido -->
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
