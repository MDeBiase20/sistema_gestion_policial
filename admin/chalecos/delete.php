<?php

$id_chaleco = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/chalecos/datos_de_chaleco.php');
?>

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Chaleco registrado</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card  card-danger">
                    <div class="card-header">
                        <h3 class="card-title">¿Estás seguro que deseas eliminar este registro de la base de datos?</h3>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                            <form action="<?php echo APP_URL;?>/app/controllers/chalecos/delete.php" method="post">
                                <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Nivel de Protección</label>
                                                <input type="text" name="id_chaleco" value="<?php echo $id_chaleco; ?>" hidden>
                                                <p><?php echo $niv_proteccion;?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Número de serie</label>
                                                <p><?php echo $num_serie;?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Lote</label>
                                                <p><?php echo $lote; ?></p>
                                            </div>
                                            
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Talle</label>
                                                <p><?php echo $talle; ?></p>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Fecha de fabricación</label>
                                                <p><?php echo $fecha_fabricacion; ?></p>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Estado</label>
                                                <p><?php echo $estado; ?></p>
                                            </div>

                                        </div>

                                    </div>
                                    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="<?php echo APP_URL;?>/admin/chalecos" class="btn btn-secondary">Volver</a>
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
include('../layout/mensajes.php');
?>