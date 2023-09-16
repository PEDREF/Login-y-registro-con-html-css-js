<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<!-- <div class="sidebar" style="padding-top:50px;">
    <ul>
        <li>
            <a href="../../Empresa/LeerEmpresa.php">
                <h2>
                    Empresa
                </h2>
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="../../Camion/LeerCamion.php">
                <h2>
                    Camiones
                </h2>
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="../../Chofer/LeerChofer.php">
                <h2>
                    Choferes
                </h2>
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="../../Flor/LeerFlor.php">
                <h2>
                    Flores
                </h2>
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="../../Ruta/LeerRuta.php">
                <h2>
                    Rutas
                </h2>
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="../../Viaje/LeerViaje.php">
                <h2>
                    Viajes
                </h2>
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="../../Medicion/LeerMedicion.php">
                <h2>
                Medición de Gasto de Petróleo Semanal
                </h2>
            </a>
        </li>
    </ul>
</div> -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img
      src="data:image/jpeg;base64,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"
      class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Flowerlogistics</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Sidebar items -->
          <li class="nav-item">
            <a href="../../index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <?php
            if($_SESSION['type'] == 'Administrador'){

          ?>
          <li class="nav-item">
            <a href="../../Camion/LeerCamion.php" class="nav-link">
              <i class="fa fa-truck"></i>
              <p> Camiones</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../Chofer/LeerChofer.php" class="nav-link">
              <i class="fa fa-address-card" ></i>
              <p> Choferes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../Flor/LeerFlor.php" class="nav-link">
              <i class="bi bi-flower2"></i>
              <p> Flores</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../Flor/LeerFlor.php" class="nav-link">
              <i class="bi bi-flower2"></i>
              <p> Pedidos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../Flor/LeerFlor.php" class="nav-link">
              <i class="fa fa-address-card"></i>
              <p> Clientes</p>
            </a>
          </li>
          <?php
            }
          ?>
          <li class="nav-item">
            <a href="../../Ruta/LeerRuta.php" class="nav-link">
              <i class="fa fa-map-pin"></i>
              <p>  Rutas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../Viaje/LeerViaje.php" class="nav-link">
              <i class="fa fa-map-marker"></i>
              <p> Viajes</p>
            </a>
          </li>
          <?php
         //   if($_SESSION['type'] == 'Administrador'){

          ?>
          <li class="nav-item">
            <a href="../../Medicion/LeerMedicion.php" class="nav-link">
              <i class="bi bi-cash-coin"></i>
              <p> Gasto de Petróleo</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../Gastos/Leerdashbordchofer.php" class="nav-link">
              <i class="bi bi-cash-coin"></i>
              <p> Gastos </p>
            </a>
          </li>

          <?php
        //    }
          ?>
          <!-- Add more sidebar items here -->
        </ul>
      </nav>
    </div>
  </aside>
  <!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>