<?php

include('../../../app/config.php');

$id_arma = $_POST['id_arma'];

$sentencia = $pdo->prepare("DELETE FROM armas WHERE id_armas=:id_armas");

$sentencia->bindParam('id_armas', $id_arma);

if($sentencia->execute()){
    session_start();
        $_SESSION['mensaje'] = 'Se eliminó el usuario de la base de datos de forma correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/armamento");
}else{
    session_start();
        $_SESSION['mensaje'] = 'Error al eliminar este registro de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/armamento.delete.php");
}

?>