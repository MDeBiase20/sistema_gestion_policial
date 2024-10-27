<?php
session_start();

if (isset($_SESSION['sesion_email'])) {
  
  $email_sesion = $_SESSION['sesion_email'];
  $query = $pdo->prepare("SELECT * FROM usuarios AS usu
                            INNER JOIN personas AS per
                            ON per.usuario_id = usu.id_usuario
                            WHERE usu.estado = '1' AND usu.correo = '$email_sesion'");
  $query->execute();
  $datos_usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($datos_usuarios as $dato_usuario){
    $nombre_sesion_usuario = $dato_usuario['correo'];

  }
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_NAME; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/dist/css/adminlte.min.css">
  <!-- SweetAlert2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- jQuery -->
  <script src="<?php echo APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
  <!-- Css DataTable -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo APP_URL;?>/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo APP_URL;?>/admin" class="nav-link"><b><?php echo APP_NAME;?></b></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo APP_URL;?>/public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nombre_sesion_usuario; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas bi bi-people"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:red"></i>
                  <p>Listado de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/usuarios/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:blue"></i>
                  <p>Crear Usuario</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="bi bi-crosshair"></i>
              <p>
                Armas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/armamento" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:red"></i>
                  <p>Listado de armas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/armamento/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:blue"></i>
                  <p>Registrar armamento</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="bi bi-shield-fill-check"></i>
              <p>
                Chalecos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/chalecos" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:red"></i>
                  <p>Listado de chalecos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/chalecos/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:blue"></i>
                  <p>Registrar chaleco</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="bi bi-person-arms-up"></i>
              <p>
                Policias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/policias" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:red"></i>
                  <p>Listado de policias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo APP_URL;?>/admin/policias/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:blue"></i>
                  <p>Crear Policia</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo APP_URL;?>/login/logout.php" class="nav-link active" style="background-color:red; color:black;">
              <i class="bi bi-box-arrow-right"></i>
              <p>
                Cerrar Sesión
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>