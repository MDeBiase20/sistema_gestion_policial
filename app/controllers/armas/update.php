<?php

include('../../../app/config.php');

$id_arma = $_POST['id_armas'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$num_serie = $_POST['num_serie'];
$cant_cargadores = $_POST['cant_cargadores'];
$cant_municiones = $_POST['cant_municiones'];

$sentencia = $pdo->prepare("UPDATE armas
SET marca=:marca, modelo=:modelo,
    num_serie=:num_serie, cant_cargadores=:cant_cargadores,
    cant_municiones=:cant_municiones, fyh_actualizacion=:fyh_actualizacion
WHERE id_armas=:id_armas");

$sentencia->bindParam('marca', $marca);
$sentencia->bindParam('modelo', $modelo);
$sentencia->bindParam('num_serie', $num_serie);
$sentencia->bindParam('cant_cargadores', $cant_cargadores);
$sentencia->bindParam('cant_municiones', $cant_municiones);
$sentencia->bindParam('fyh_actualizacion', $fecha_hora);
$sentencia->bindParam('id_armas', $id_arma);

try {
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje'] = 'El arma se actualizó de manera correcta';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'/admin');

} catch (PDOException $e) {
    session_start();
    $_SESSION['mensaje'] = 'Error al actualizar el arma'. $e->getMessage();
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'/admin/armamento/edit.php');
}

exit();

?>