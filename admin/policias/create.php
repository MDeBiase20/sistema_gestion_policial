<?php

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/policias/generador_de_ni.php');
include('../../app/controllers/armas/listado_de_armas.php');
include('../../app/controllers/chalecos/listado_de_chalecos.php');
?>

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Creación de un nuevo Policía</h1>
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
                        <form action="<?php echo APP_URL;?>/app/controllers/policias/create.php" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Apellido</label>
                                            <input type="text" name="apellido" class="form form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">DNI</label>
                                            <input type="number" name="dni" class="form form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Dirección</label>
                                            <input type="address" name="direccion" class="form form-control">
                                        </div>
                                    </div>
                                    <br>
                                <hr>

                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="">NI</label>
                                            <input type="number" name="ni" value="<?php echo $numeroSiguiente; ?>" class="form form-control" readonly>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Fecha de Nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Jerarquía</label>
                                            <select name="jerarquia" class="form form-control">
                                                    <option value="Suboficial de Policía">Suboficial de Policía</option>
                                                    <option value="Oficial de Policía">Oficial de Policía</option>
                                                    <option value="Subinspector">Subinspector</option>
                                                    <option value="Inspector">Inspector</option>
                                                    <option value="Subcomisario">Subcomisario</option>
                                                    <option value="Comisario">Comisario</option>
                                                    <option value="Comisario Supervisor">Comisario Supervisor</option>
                                                    <option value="Subdirector de Policía">Subdirector de Policía</option>
                                                    <option value="Director de Policía">Director de Policía</option>
                                                    <option value="Director general de Policía">Director general de Policía</option>
                                            </select>
                                        </div>
                                        
                                    </div>

                                    <br>
                                    <hr>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="">Arma</label>
                                            <select name="arma" class="form form-control">

                                                <?php foreach($armas as $arma){ ?>

                                                <option value="<?php echo $arma['id_armas'] ?>"> <?php echo $arma['marca']." - ".$arma['modelo']." - ".$arma['num_serie']; ?> </option>

                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Chaleco</label>
                                            <select name="chaleco" class="form form-control">
                                            
                                                <?php foreach($chalecos as $chaleco){ ?>

                                                <option value="<?php echo $chaleco['id_chalecos'] ?>"> <?php echo $chaleco['nivel_proteccion']." - ".$chaleco['num_serie']." - ".$chaleco['talle']; ?> </option>

                                                <?php } ?>

                                            </select>
                                        </div>
                                        
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo APP_URL;?>/admin/policias" class="btn btn-secondary">Volver</a>
                                        <button type="submit" class="btn btn-primary">Registrar Policía</button>
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