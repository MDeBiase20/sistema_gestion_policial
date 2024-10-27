<?php

include('../../../app/config.php');

$id_chaleco = $_POST['id_chaleco'];

$sentencia = $pdo->prepare('DELETE FROM chalecos WHERE id_chalecos=:id_chalecos');

$sentencia->bindParam(':id_chalecos', $id_chaleco);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'Chaleco registrado correctamente a la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'/admin');
}else{
    session_start();
    $_SESSION['mensaje'] = 'Error al eliminar este registro de la base de datos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'/admin/chalecos/delete.php');
}

?>