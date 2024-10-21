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
                <h1>Actualización del usuario: <?php echo $correo; ?></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Ingrese los datos</h3>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/app/controllers/usuarios/update.php" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Correo</label>
                                            <input type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
                                            <input type="email" value="<?php echo $correo; ?>" name="correo" class="form form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Contraseña</label>
                                            <input type="password" name="password" class="form form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Repetir Contraseña</label>
                                            <input type="password" name="password-repeat" class="form form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo APP_URL;?>/admin/usuarios" class="btn btn-secondary">Volver</a>
                                        <button type="submit" class="btn btn-success">Actualizar usuario</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>


<?php
include('../../layout/mensaje.php');
include('../../admin/layout/footer.php');
?>