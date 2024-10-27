<?php
include('../../../app/config.php');

$correo = $_POST['correo'];
$password = $_POST['password'];
$password_repeat = $_POST['password-repeat'];
$nombres = $_POST['nombres'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$pdo->beginTransaction();

##Tabla usuario

if($password == $password_repeat){ 

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $sentencia = $pdo->prepare("INSERT INTO usuarios
    (correo, password, fyh_creacion, estado)
    VALUES(:correo, :password, :fyh_creacion, :estado) ");

    $sentencia->bindParam(':correo', $correo);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam(':fyh_creacion', $fecha_hora);
    $sentencia->bindParam(':estado', $estado_registro);

    $sentencia->execute();

    $usuario_id = $pdo->lastInsertId();

    ##Tabla persona
    $sentencia = $pdo->prepare("INSERT INTO personas
    (usuario_id, nombres, apellido, dni, direccion, fecha_nacimiento, fyh_creacion, estado)
    VALUES(:usuario_id, :nombres, :apellido, :dni, :direccion, :fecha_nacimiento, :fyh_creacion, :estado)");

    $sentencia->bindParam(':usuario_id', $usuario_id);
    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':apellido', $apellido);
    $sentencia->bindParam(':dni', $dni);
    $sentencia->bindParam(':direccion', $direccion);
    $sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $sentencia->bindParam(':fyh_creacion', $fecha_hora);
    $sentencia->bindParam(':estado', $estado_registro);

    try {
        if($sentencia->execute()){
            $pdo->commit();
            session_start();
            $_SESSION['mensaje'] = 'El usuario se registró de manera correcta';
            $_SESSION['icono'] = 'success';
            header('Location:'.APP_URL.'/admin');
        }else {
            $pdo->rollBack();
            session_start();
            $_SESSION['mensaje'] = 'Error al registrar el usuario';
            $_SESSION['icono'] = 'error';
            header('Location:'.APP_URL.'/admin/usuarios/create.php');
        }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = 'El correo de este usuario ya se encuentra registrado en la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
    }

}else{
    session_start();
    $_SESSION['mensaje'] = 'Las contraseñas no son iguales';
    $_SESSION['icono'] = 'error';
    ?> <script>window.history.back()</script>  <?php
}

?>