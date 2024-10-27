<?php

$query_chaleco = "SELECT * FROM chalecos WHERE estado = 1 AND id_chalecos = $id_chaleco ";
$sentencia = $pdo->prepare($query_chaleco);
$sentencia->execute();

$chalecos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach($chalecos as $chaleco){
    $niv_proteccion = $chaleco['nivel_proteccion'];
    $num_serie = $chaleco['num_serie'];
    $lote = $chaleco['lote'];
    $talle = $chaleco['talle'];
    $fecha_fabricacion = $chaleco['fecha_fabricacion'];
    $estado = $chaleco['estado'];
}

?>