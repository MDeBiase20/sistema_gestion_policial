<?php
session_start();
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
                <h1>Arma registrada</h1>
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
                        <form action="<?php echo APP_URL;?>/app/controllers/armas/update.php" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Marca</label>
                                            <input type="text" name="id_armas" value="<?php echo $id_arma; ?>" hidden>
                                            <input type="text" name="marca" value="<?php echo $marca; ?>" class="form form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Modelo</label>
                                            <input type="text" name="modelo" value="<?php echo $modelo; ?>" class="form form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Número de serie</label>
                                            <input type="number" name="num_serie" value="<?php echo $num_serie; ?>" class="form form-control">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">

                                        <div class="col-md-5">
                                            <label for="">Cántidad de cargadores</label>
                                            <input type="number" name="cant_cargadores" value="<?php echo $cant_cargadores; ?>" class="form form-control">
                                        </div>

                                        <div class="col-md-5">
                                            <label for="">Cántidad de municiones</label>
                                            <input type="number" name="cant_municiones" value="<?php echo $cant_municiones; ?>" class="form form-control">
                                        </div>
                                    </div>    

                                </div>
                                <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo APP_URL;?>/admin/armamento" class="btn btn-secondary">Volver</a>
                                            <button type="submit" class="btn btn-success">Actualizar Arma</button>
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