<?php

include('../../app/config.php');
include('../../admin/layout/header.php');
?>

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Registro de un nuevo chalecos</h1>
            </div>
        </div>
    </div>

    <div class="container">


    <?php
        if(isset($_SESSION['alert'])){
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ingrese los datos</h3>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo APP_URL;?>/app/controllers/chalecos/create.php" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Nivel de Protección</label>
                                            <input type="text" name="niv_proteccion" class="form form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Número de serie</label>
                                            <input type="number" name="num_serie" class="form form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Lote</label>
                                            <input type="number" name="lote" class="form form-control">
                                        </div>
                                        
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Talle</label>
                                            <select name="talle" class="form form-control">
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Fecha de fabricación</label>
                                            <input type="date" name="fecha_fabricacion" class="form form-control">
                                        </div>

                                    </div>

                                </div>
                                <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?php echo APP_URL;?>/admin/chalecos" class="btn btn-secondary">Volver</a>
                                            <button type="submit" class="btn btn-primary">Registrar Chaleco</button>
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
//include('../../layout/mensaje2.php');
include('../../admin/layout/footer.php');
include('../layout/mensajes.php');
?>