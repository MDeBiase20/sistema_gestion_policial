<?php

$query_chaleco = "SELECT * FROM chalecos WHERE estado = 1";
$sentencia = $pdo->prepare($query_chaleco);
$sentencia->execute();

$chalecos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$contador_chalecos = 0;
foreach($chalecos as $chaleco){
    $contador_chalecos++;
}

?>