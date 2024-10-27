<?php
include('../../../app/config.php');

$id_policia = $_POST['id_policia'];
$id_arma = $_POST['id_arma'];
$id_chaleco = $_POST['id_chaleco'];
$id_persona = $_POST['id_persona'];

$nombres = $_POST['nombres'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$jerarquia = $_POST['jerarquia'];

$pdo->beginTransaction();

#Actualizo los datos personales
$sentencia = $pdo->prepare('UPDATE personas_sin_usuarios
SET nombres=:nombres,
    apellido=:apellido,
    dni=:dni, direccion=:direccion,
    fecha_nacimiento=:fecha_nacimiento,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_persona=:id_persona');

$sentencia->bindParam(':nombres', $nombres);
$sentencia->bindParam(':apellido', $apellido);
$sentencia->bindParam(':dni', $dni);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$sentencia->bindParam(':fyh_actualizacion', $fecha_hora);
$sentencia->bindParam(':id_persona', $id_persona);

$sentencia->execute();

#Actualizo los datos policiales
$sentencia = $pdo->prepare('UPDATE policias
SET persona_id=:persona_id,
    armas_id=:armas_id,
    chalecos_id=:chalecos_id,
    jerarquia=:jerarquia,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_policia=:id_policia');

$sentencia->bindParam(':persona_id', $id_persona);
$sentencia->bindParam(':armas_id', $id_arma);
$sentencia->bindParam(':chalecos_id', $id_chaleco);
$sentencia->bindParam(':jerarquia', $jerarquia);
$sentencia->bindParam(':fyh_actualizacion', $fecha_hora);
$sentencia->bindParam(':id_policia', $id_policia);

if($sentencia->execute()){
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = 'Se actualizó al personal policial de forma correcta';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin");
}else{
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = 'No se pudo actualizar al personal policial';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin");
}

?>