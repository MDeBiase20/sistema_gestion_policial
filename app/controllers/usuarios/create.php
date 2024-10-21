<?php
include('../../../app/config.php');

$correo = $_POST['correo'];
$password = $_POST['password'];
$password_repeat = $_POST['password-repeat'];

if($password == $password_repeat){ 

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $sentencia = $pdo->prepare("INSERT INTO usuarios
    (correo, password, fyh_creacion, estado)
    VALUES(:correo, :password, :fyh_creacion, :estado) ");

    $sentencia->bindParam(':correo', $correo);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam(':fyh_creacion', $fecha_hora);
    $sentencia->bindParam(':estado', $estado_registro);

    try {
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = 'El usuario se registró de manera correcta';
            $_SESSION['icono'] = 'success';
            header('Location:'.APP_URL.'/admin/usuarios');
        }else {
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