<?php

include('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$password_repeat = $_POST['password-repeat'];

if($password == ""){
    $sentencia = $pdo->prepare('UPDATE usuarios
    SET correo=:correo,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_usuario=:id_usuario');

    $sentencia->bindParam(':correo', $correo);
    $sentencia->bindParam(':fyh_actualizacion', $fecha_hora);
    $sentencia->bindParam(':id_usuario', $id_usuario);

    try {
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = 'El usuario se actualizó de manera correcta';
            $_SESSION['icono'] = 'success';
            header('Location:'.APP_URL.'/admin');
        }else{
            session_start();
            $_SESSION['mensaje'] = 'No se pudo actualizar el usuario';
            $_SESSION['icono'] = 'error';
            header('Location:'.APP_URL.'/admin/usuarios/edit.php');
        }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = 'El correo ya existe en la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
    }

}else{
    if($password == $password_repeat){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare('UPDATE usuarios
        SET correo=:correo,
            password=:password,
            fyh_actualizacion=:fyh_actualizacion
        WHERE id_usuario=:id_usuario');

        $sentencia->bindParam(':correo', $correo);
        $sentencia->bindParam(':password', $password);
        $sentencia->bindParam(':fyh_actualizacion', $fecha_hora);
        $sentencia->bindParam(':id_usuario', $id_usuario);

        try {
            if($sentencia->execute()){
                session_start();
                $_SESSION['mensaje'] = 'El usuario se actualizó de manera correcta';
                $_SESSION['icono'] = 'success';
                header('Location:'.APP_URL.'/admin');
            }else{
                session_start();
                $_SESSION['mensaje'] = 'No se pudo actualizar el usuario';
                $_SESSION['icono'] = 'error';
                header('Location:'.APP_URL.'/admin/usuarios/edit.php');
            }
        } catch (Exception $exception) {
            session_start();
            $_SESSION['mensaje'] = 'El correo ya existe en la base de datos';
            $_SESSION['icono'] = 'error';
            ?> <script>window.history.back()</script>  <?php
        }
    }else{
            session_start();
            $_SESSION['mensaje'] = 'Las contraseñas no son iguales, vuelva a internarlo';
            $_SESSION['icono'] = 'error';
            header('Location:'.APP_URL.'/admin');
    }
} 


?>