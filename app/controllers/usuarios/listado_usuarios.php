<?php

$query_usuarios = "SELECT * FROM usuarios WHERE estado = 1";
$sentencia = $pdo->prepare($query_usuarios);
$sentencia->execute();

$usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$contador_usuarios = 0;
foreach($usuarios as $usuario){
    $contador_usuarios++;
}

?>