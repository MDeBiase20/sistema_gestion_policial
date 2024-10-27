<?php
include('../app/config.php');

$correo = $_POST['correo'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND estado = '1'";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();

$usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach($usuarios as $usuario){
    $pass_encriptada = $usuario['password'];
}

if( password_verify($pass, $pass_encriptada) ){
    session_start();
    $_SESSION['mensaje'] = 'Bienvenido al sistema';
    $_SESSION['icono'] = 'success';

    $_SESSION['sesion_email'] = $correo;
    header('Location:'.APP_URL.'/admin');
}else{
    session_start();
    $_SESSION['mensaje'] = 'Error, las credenciales son incorrectas';
    header('Location:'.APP_URL.'/login');
}

?>