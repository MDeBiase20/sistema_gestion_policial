<?php

$id_policias = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/header.php');
include('../../app/controllers/policias/datos_de_policias.php');
include('../../app/controllers/armas/listado_de_armas.php');
include('../../app/controllers/chalecos/listado_de_chalecos.php');
?>

<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Policía: <?php echo $policia['nombres']."  ".$policia['apellido']; ?></h1>
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
                        <form action="<?php echo APP_URL;?>/app/controllers/policias/update.php" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Nombres</label>
                                            <input type="text" name="id_policia" value="<?php echo $id_policias; ?>" hidden>
                                            <input type="text" name="id_persona" value="<?php echo $id_persona; ?>" hidden>
                                            <input type="text" name="id_arma" value="<?php echo $id_arma; ?>" hidden>
                                            <input type="text" name="id_chaleco" value="<?php echo $id_chaleco; ?>" hidden>
                                            <input type="text" value="<?php echo $nombres; ?>" name="nombres" class="form form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Apellido</label>
                                            <input type="text" value="<?php echo $apellido; ?>" name="apellido" class="form form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">DNI</label>
                                            <input type="number" value="<?php echo $dni; ?>" name="dni" class="form form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Dirección</label>
                                            <input type="address" value="<?php echo $direccion; ?>" name="direccion" class="form form-control">
                                        </div>
                                    </div>
                                    <br>
                                <hr>

                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="">NI</label>
                                            <input type="number" name="ni" value="<?php echo $ni; ?>" class="form form-control" readonly>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Fecha de Nacimiento</label>
                                            <input type="date" value="<?php echo $fecha_nacimiento; ?>" name="fecha_nacimiento" class="form form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Jerarquía</label>
                                                <select name="jerarquia" class="form form-control">
                                                        <option value="Suboficial de Policía" <?php echo ($jerarquia === 'Suboficial de Policía') ? 'selected' : '' ?>>Suboficial de Policía</option>
                                                        <option value="Oficial de Policía" <?php echo ($jerarquia === 'Oficial de Policía') ? 'selected' : '' ?>>Oficial de Policía</option>
                                                        <option value="Subinspector" <?php echo ($jerarquia === 'Subinspector') ? 'selected' : '' ?>>Subinspector</option>
                                                        <option value="Inspector" <?php echo ($jerarquia === 'Inspector') ? 'selected' : '' ?>>Inspector</option>
                                                        <option value="Subcomisario" <?php echo ($jerarquia === 'Subcomisario') ? 'selected' : '' ?>>Subcomisario</option>
                                                        <option value="Comisario" <?php echo ($jerarquia === 'Comisario') ? 'selected' : '' ?>>Comisario</option>
                                                        <option value="Comisario Supervisor" <?php echo ($jerarquia === 'Comisario Supervisor') ? 'selected' : '' ?>>Comisario Supervisor</option>
                                                        <option value="Subdirector de Policía" <?php echo ($jerarquia === 'Subdirector de Policía') ? 'selected' : '' ?>>Subdirector de Policía</option>
                                                        <option value="Director de Policía" <?php echo ($jerarquia === 'Director de Policía') ? 'selected' : '' ?>>Director de Policía</option>
                                                        <option value="Director general de Policía" <?php echo ($jerarquia === 'Director general de Policía') ? 'selected' : '' ?>>Director general de Policía</option>
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

                                                <option value="<?php echo $arma['id_armas'] ?>" <?php echo $arma['id_armas'] === $policia['armas_id'] ? 'selected' : '' ?> > <?php echo $arma['marca']." - ".$arma['modelo']." - ".$arma['num_serie']; ?> </option>

                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Chaleco</label>
                                            <select name="chaleco" class="form form-control">
                                            
                                                <?php foreach($chalecos as $chaleco){ ?>

                                                <option value="<?php echo $chaleco['id_chalecos'] ?>" <?php echo $chaleco['id_chalecos'] === $policia['chalecos_id'] ? 'selected' : '' ?> > <?php echo $chaleco['nivel_proteccion']." - ".$chaleco['num_serie']." - ".$chaleco['talle']; ?> </option>

                                                <?php } ?>

                                            </select>
                                        </div>
                                        
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo APP_URL;?>/admin/policias" class="btn btn-secondary">Volver</a>
                                        <button type="submit" class="btn btn-success">Actualizar Policía</button>
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