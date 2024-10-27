<?php
include('../../app/config.php');
include('../../admin/layout/header.php');
?>

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Creación de un nuevo usuario</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ingrese los datos</h3>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/app/controllers/usuarios/create.php" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Correo</label>
                                            <input type="email" name="correo" class="form form-control">
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
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form form-control">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Apellido</label>
                                            <input type="text" name="apellido" class="form form-control">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">DNI</label>
                                            <input type="number" name="dni" class="form form-control">
                                        </div>

                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Dirección</label>
                                            <input type="text" name="direccion" class="form form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form form-control">
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo APP_URL;?>/admin/usuarios" class="btn btn-secondary">Volver</a>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
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
include('../../admin/layout/footer.php');
include('../layout/mensajes.php');
?>