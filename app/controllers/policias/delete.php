<?php
include('../../../app/config.php');

$id_persona = $_POST['id_persona'];
$id_policia = $_POST['id_policia'];
$id_arma = $_POST['id_arma'];
$id_chaleco = $_POST['id_chaleco'];

$pdo->beginTransaction();

#DELETE TABLA POLICIA
$sentencia = $pdo->prepare("DELETE FROM policias WHERE id_policia=:id_policia");
$sentencia->bindParam(':id_policia',$id_policia );
$sentencia->execute();

#DELETE TABLA PERSONAS SIN USUARIO
$sentencia = $pdo->prepare("DELETE FROM personas_sin_usuarios WHERE id_persona=:id_persona");
$sentencia->bindParam(':id_persona',$id_persona );
$sentencia->execute();

#DELETE TABLA ARMAS
$sentencia = $pdo->prepare("DELETE FROM armas WHERE id_armas=:id_armas");
$sentencia->bindParam(':id_armas',$id_arma );
$sentencia->execute();

#DELETE TABLA CHALECOS
$sentencia = $pdo->prepare("DELETE FROM chalecos WHERE id_chalecos=:id_chalecos");
$sentencia->bindParam(':id_chalecos',$id_chaleco );

try {
    if($sentencia->execute()){
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = 'Policía eliminado correctamente de la base de datos';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL.'/admin');
}else{
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = 'Error al eliminar el policía de la base de datos, vuelva a internarlo más tarde';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'/admin');
}
} catch (PDOExecption $th) {
    session_start();
    $_SESSION['mensaje'] = 'Error, vuelva a internarlo más tarde';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL.'/admin');
}


?>