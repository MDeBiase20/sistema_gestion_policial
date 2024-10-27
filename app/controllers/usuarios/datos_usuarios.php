<?php

$query_usuarios = "SELECT * FROM usuarios WHERE estado = 1 AND id_usuario = '$id_usuario' ";
$sentencia = $pdo->prepare($query_usuarios);
$sentencia->execute();

$usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach($usuarios as $usuario){
    $correo = $usuario['correo'];
    $fyh_creacion = $usuario['fyh_creacion'];
    $estado = $usuario['estado'];
}

?>