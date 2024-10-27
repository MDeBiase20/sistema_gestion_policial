<?php
include('../../../app/config.php');

$id_chaleco = $_POST['id_chaleco'];
$niv_proteccion = $_POST['niv_proteccion'];
$num_serie = $_POST['num_serie'];
$lote = $_POST['lote'];
$talle = $_POST['talle'];
$fecha_fabricacion = $_POST['fecha_fabricacion'];

$sentencia = $pdo->prepare('UPDATE chalecos
SET nivel_proteccion=:nivel_proteccion,
    num_serie=:num_serie, lote=:lote,
    talle=:talle, fecha_fabricacion=:fecha_fabricacion,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_chalecos=:id_chalecos');

$sentencia->bindParam('nivel_proteccion', $niv_proteccion);
$sentencia->bindParam('num_serie', $num_serie);
$sentencia->bindParam('lote', $lote);
$sentencia->bindParam('talle', $talle);
$sentencia->bindParam('fecha_fabricacion', $fecha_fabricacion);
$sentencia->bindParam('fyh_actualizacion', $fecha_hora);
$sentencia->bindParam('id_chalecos', $id_chaleco);

if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se actualizó el chaleco correctamente a la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin");
}else{
    session_start();
        $_SESSION['mensaje'] = 'Error al actualizar el chaleco a la base de datos';
        $_SESSION['icono'] = 'error';
        //header('Location:'.APP_URL."/admin/pagos/create.php");
        ?> <script>window.history.back();</script>  <?php
}

?>