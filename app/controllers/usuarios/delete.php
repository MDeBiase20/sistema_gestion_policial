<?php
var_dump($_POST);
include('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];

if(empty($id_usuario)) {
    session_start();
    $_SESSION['mensaje'] = 'ID de usuario no proporcionado.';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/usuarios");
    exit();
}

$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");
$sentencia->bindParam(':id_usuario', $id_usuario);

try {
    if($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = 'Se eliminó el usuario de la base de datos de forma correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/usuarios");
        exit();
    } else {
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el usuario de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/usuarios");
        exit();
    }
} catch (Exception $exception) {
    // Mostrar el error exacto en caso de que algo falle
    session_start();
    $_SESSION['mensaje'] = 'Error: '.$exception->getMessage();  // Añadimos detalles del error
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/usuarios");
    exit();
}

// $sentencia = $pdo->prepare("DELETE  FROM usuarios WHERE id_usuario=:id_usuario");

// $sentencia->bindParam(':id_usuario', $id_usuario);

// try {
//     if($sentencia->execute()){
//         session_start();
//         $_SESSION['mensaje'] = 'Se eliminó el usuario de la base de datos de forma correcta';
//         $_SESSION['icono'] = 'success';
//         header('Location:'.APP_URL."/admin/usuarios");
//     }else{
//         session_start();
//         $_SESSION['mensaje'] = 'Error al eliminar el usuario de la base de datos';
//         $_SESSION['icono'] = 'error';
//         header('Location:'.APP_URL."/admin/usuarios");
//     }
// } catch (Exception $exception) {
//     session_start();
//     $_SESSION['mensaje'] = 'Error al eliminar el usuario de la base de datos';
//     $_SESSION['icono'] = 'error';
//     header('Location:'.APP_URL."/admin/usuarios");
//     exit();
// }
    

?>