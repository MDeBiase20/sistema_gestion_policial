<?php
include('../../../app/config.php');

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $num_serie = $_POST['num_serie'];
    $cant_cargadores = $_POST['cant_cargadores'];
    $cant_municiones = $_POST['cant_municiones'];

    $sentencia = $pdo->prepare('INSERT INTO armas
    (marca, modelo, num_serie, cant_cargadores, cant_municiones, fyh_creacion, estado)
    VALUES(:marca, :modelo, :num_serie, :cant_cargadores, :cant_municiones, :fyh_creacion, :estado)');

    $sentencia->bindParam(':marca', $marca);
    $sentencia->bindParam(':modelo', $modelo);
    $sentencia->bindParam(':num_serie', $num_serie);
    $sentencia->bindParam(':cant_cargadores', $cant_cargadores);
    $sentencia->bindParam(':cant_municiones', $cant_municiones);
    $sentencia->bindParam(':fyh_creacion', $fecha_hora);
    $sentencia->bindParam(':estado', $estado_registro);

    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'Se registro el arma de manera correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL.'/admin');
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al registrar el arma a la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
    }
?>