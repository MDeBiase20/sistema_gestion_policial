<?php

$query_personas = "SELECT * FROM personas_sin_usuarios AS psu INNER JOIN policias AS pol ON pol.persona_id = psu.id_persona
INNER JOIN armas AS ar ON ar.id_armas = pol.armas_id
INNER JOIN chalecos AS ch ON ch.id_chalecos = pol.chalecos_id
WHERE pol.estado = 1 AND pol.id_policia = $id_personas";
$sentencia = $pdo->prepare($query_personas);
$sentencia->execute();

$personas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach($policias as $policia){
    $id_arma = $policia['armas_id'];
    $id_chaleco = $policia['chalecos_id'];

    $nombres = $policia['nombres'];
    $apellido = $policia['apellido'];
    $dni = $policia['dni'];
    $direccion = $policia['direccion'];
    $ni = $policia['ni'];
    $fecha_nacimiento = $policia['fecha_nacimiento'];
    $jerarquia = $policia['jerarquia'];
    $arma = $policia['marca'];
    $chaleco = $policia['nivel_proteccion'];

}

?>