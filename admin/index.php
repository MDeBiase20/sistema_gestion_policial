<?php 
    include('../app/config.php');
    include('../admin/layout/header.php');
    include('../app/controllers/usuarios/listado_usuarios.php');
    include('../app/controllers/armas/listado_de_armas.php');
    include('../app/controllers/chalecos/listado_de_chalecos.php');
    include('../app/controllers/policias/listado_policias.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo APP_NAME; ?></h1>
          </div><!-- /.col -->
            
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <br>
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $contador_usuarios;?></h3>

                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas bi bi-people"></i>
              </div>
              <a href="<?php echo APP_URL;?>/admin/usuarios" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $contador_armas;?></h3>

                <p>Armas</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas bi bi-crosshair"></i>
              </div>
              <a href="<?php echo APP_URL;?>/admin/armamento" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $contador_chalecos;?></h3>

                <p>Chalecos</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas bi bi-shield-fill-check"></i>
              </div>
              <a href="<?php echo APP_URL;?>/admin/chalecos" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $contador_policias;?></h3>

                <p>Policias</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas bi bi-person-arms-up"></i>
              </div>
              <a href="<?php echo APP_URL;?>/admin/policias" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
      </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
        
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
    include('../admin/layout/footer.php');
    include('../layout/mensajes.php');
?>
