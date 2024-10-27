<?php
//Este código lo que va a hacer es generar el número de NI automáticamente de cada policía que se vaya a registrar 


#Consulta el último NI insertado. Se usa el DESC LIMIT 1 para obtener el número más alto y a ese incrementarle uno
$sentencia = $pdo->prepare("SELECT ni FROM policias ORDER BY ni DESC LIMIT 1");
$sentencia->execute();
$ultimoNumero = $sentencia->fetchColumn();

#Si no hay registro, inicia el NI en 500.000
if(!$ultimoNumero){
    $numeroSiguiente = 500000;
}else{
    $numeroSiguiente = $ultimoNumero + 1;
}

?>