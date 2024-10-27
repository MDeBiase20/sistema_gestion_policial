<?php

$query_armas = "SELECT * FROM armas WHERE estado = 1";
$sentencia = $pdo->prepare($query_armas);
$sentencia->execute();

$armas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$contador_armas = 0;
foreach($armas as $arma){
    $contador_armas++;
}

?>