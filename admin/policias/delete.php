<?php

$id_policias = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/armas/listado_de_armas.php');
include('../../app/controllers/chalecos/listado_de_chalecos.php');
include('../../app/controllers/policias/datos_de_policias.php');
?>

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Policía: <?php echo $policia['nombres']." ".$policia['apellido']; ?></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">¿Estás seguro que deseas eliminar este registro de la base de datos?</h3>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/app/controllers/policias/delete.php" method="post">
                            <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Nombres</label>
                                                <input type="text" name="id_policia" value="<?php echo $id_policias; ?>" hidden>
                                                <input type="text" name="id_persona" value="<?php echo $id_persona; ?>" hidden>
                                                <input type="text" name="id_arma" value="<?php echo $id_arma; ?>" hidden>
                                                <input type="text" name="id_chaleco" value="<?php echo $id_chaleco; ?>" hidden>
                                                <p><?php echo $policia['nombres']; ?></p>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Apellido</label>
                                                <p><?php echo $policia['apellido']; ?></p>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">DNI</label>
                                                <p><?php echo $dni; ?></p>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Dirección</label>
                                                <p><?php echo $policia['direccion']; ?></p>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label for="">NI</label>
                                                <p><?php echo $policia['ni']; ?></p>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Fecha de Nacimiento</label>
                                                <p><?php echo $policia['fecha_nacimiento']; ?></p>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Jerarquía</label>
                                                <p><?php echo $policia['jerarquia'];?></p>
                                            </div>
                                            
                                        </div>

                                        <br>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="">Arma</label>
                                                <p><?php echo $policia['marca']." - ".$policia['modelo']." - ".$policia['num_serie']; ?></p>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Chaleco</label>
                                                <p><?php echo $policia['nivel_proteccion']." - ".$policia['num_serie']." - ".$policia['talle']; ?></p>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo APP_URL;?>/admin/policias" class="btn btn-secondary">Volver</a>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
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
include('../../layout/mensajes.php');
?>