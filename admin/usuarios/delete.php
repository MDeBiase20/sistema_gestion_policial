<?php

$id_usuario = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/usuarios/datos_usuarios.php');
?>

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Datos del usuario: <?php echo $correo?></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">¿Estás seguro que desesas eliminar este usuario de la base de datos?</h3>
                    </div>
                <!-- /.card-header -->
                    <form action="<?php echo APP_URL;?>/app/controllers/usuarios/delete.php" method="post">
                        <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Correo</label>
                                                <input type="number" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
                                                <p><?php echo $correo; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Fecha y hora de creación</label>
                                                <p><?php echo $fyh_creacion; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Estado del usuario</label>
                                                <p><?php echo $estado; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo APP_URL;?>/admin/usuarios" class="btn btn-secondary">Volver</a>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                        </div>
                    </form>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>


<?php
include('../../admin/layout/footer.php');
include('../../layout/mensaje.php');
?>