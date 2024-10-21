<?php

$query_policias = "SELECT * FROM personas_sin_usuarios AS per
INNER JOIN policias AS pol ON pol.persona_id = per.id_persona
WHERE pol.estado = 1 ";
$sentencia = $pdo->prepare($query_policias);
$sentencia->execute();

$policias = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>