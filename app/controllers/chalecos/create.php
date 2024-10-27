<?php

include('../../../app/config.php');

$niv_proteccion = $_POST['niv_proteccion'];
$num_serie = $_POST['num_serie'];
$lote = $_POST['lote'];
$talle = $_POST['talle'];
$fecha_fabricacion = $_POST['fecha_fabricacion'];


$sentencia = $pdo->prepare("INSERT INTO chalecos
(nivel_proteccion, num_serie, lote, talle, fecha_fabricacion, fyh_creacion, estado)
VALUES(:nivel_proteccion, :num_serie, :lote, :talle, :fecha_fabricacion, :fyh_creacion, :estado)");

$sentencia->bindParam(':nivel_proteccion', $niv_proteccion);
$sentencia->bindParam(':num_serie', $num_serie);
$sentencia->bindParam(':lote', $lote);
$sentencia->bindParam(':talle', $talle);
$sentencia->bindParam(':fecha_fabricacion', $fecha_fabricacion);
$sentencia->bindParam(':fyh_creacion', $fecha_hora);
$sentencia->bindParam(':estado', $estado_registro);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'Chaleco registrado correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'/admin');

}else{
    session_start();
    $_SESSION['mensaje'] = 'Error al registrar el chaleco a la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'/admin/chalecos/create.php');
    
}

?>