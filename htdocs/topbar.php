<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<script>
    function logout() {
        // console.log("hola");
        window.location.href = '../../logout.php';
    }
</script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">

<!-- AdminLTE CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<header>
    <nav class="main-header navbar navbar-expand navbar-black navbar-black">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            <span class="hidden-xs">
                <?php
                    echo $_SESSION['Nombre'];
                    
                ?>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- <a href="#" class="dropdown-item">Profile</a>
            <div class="dropdown-divider"></div> -->
            <label class="dropdown-item">
                Cargo:
                <?php echo $_SESSION['type'];?>
            </label>
            <a type="button" onclick="logout()" class="dropdown-item">Logout</a>
        </div>
        </li>
    </ul>
    </nav>
</header>


  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>