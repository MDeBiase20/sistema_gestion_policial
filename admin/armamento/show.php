<?php

$id_arma = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/armas/datos_de_armas.php');
?>

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Arma registrada: <?php echo $arma['marca']." ".$arma['modelo']; ?> </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos del arma registrada</h3>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Marca</label>
                                            <p><?php echo $arma['marca']; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Modelo</label>
                                            <p><?php echo $arma['modelo']; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Número de serie</label>
                                            <p><?php echo $arma['num_serie']; ?></p>
                                        </div>
                                        
                                    </div>

                                    <div class="row">

                                        <div class="col-md-5">
                                            <label for="">Cántidad de cargadores</label>
                                            <p><?php echo $arma['cant_cargadores'] ?></p>
                                        </div>

                                        <div class="col-md-5">
                                            <label for="">Cántidad de municiones</label>
                                            <p><?php echo $arma['cant_municiones']; ?></p>
                                        </div>
                                    </div>    

                                </div>
                                <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo APP_URL;?>/admin/armamento" class="btn btn-secondary">Volver</a>
                                        </div>
                                    </div>
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