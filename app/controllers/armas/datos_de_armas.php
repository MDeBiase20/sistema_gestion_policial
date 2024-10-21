<?php

$query_arma = "SELECT * FROM armas WHERE estado = 1 AND id_armas = $id_arma";
$sentencia = $pdo->prepare($query_arma);
$sentencia->execute();

$armas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach($armas as $arma){
    $marca = $arma['marca'];
    $modelo = $arma['modelo'];
    $num_serie = $arma['num_serie'];
    $cant_cargadores = $arma['cant_cargadores'];
    $cant_municiones = $arma['cant_municiones'];
}

?>