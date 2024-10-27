<?php
    include('../../../app/config.php');
    include('../../../app/controllers/policias/generador_de_ni.php');

    $nombres = $_POST['nombres'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $direccion = $_POST['direccion'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $arma_id = $_POST['arma'];
    $chaleco_id = $_POST['chaleco'];

    $ni = $_POST['ni'];
    $jerarquia = $_POST['jerarquia'];

    //Inicio la transacción para insertar registros en 2 tablas diferentes
    $pdo->beginTransaction();

    //INSERTAMOS REGISTROS EN LA TABLA PERSONA
    $sentencia = $pdo->prepare('INSERT INTO personas_sin_usuarios
    (nombres, apellido, dni, direccion, fecha_nacimiento, fyh_creacion, estado)
    VALUES(:nombres, :apellido, :dni, :direccion, :fecha_nacimiento, :fyh_creacion, :estado)');

    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':apellido', $apellido);
    $sentencia->bindParam(':dni', $dni);
    $sentencia->bindParam(':direccion', $direccion);
    $sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $sentencia->bindParam(':fyh_creacion', $fecha_hora);
    $sentencia->bindParam(':estado', $estado_registro);

    $sentencia->execute();

    //Inserto el id de la persona en la tabla policía
    $persona_id = $pdo->lastInsertId();

    //INSERTAMOS REGISTROS EN LA TABLA POLICÍA
    $sentencia = $pdo->prepare('INSERT INTO policias
    (persona_id, armas_id, chalecos_id, ni, jerarquia, fyh_creacion, estado)
    VALUES(:persona_id, :armas_id, :chalecos_id, :ni, :jerarquia, :fyh_creacion, :estado)');

    $sentencia->bindParam(':persona_id', $persona_id);
    $sentencia->bindParam(':armas_id', $arma_id);
    $sentencia->bindParam(':chalecos_id', $chaleco_id);
    $sentencia->bindParam(':ni', $ni);
    $sentencia->bindParam(':jerarquia', $jerarquia);
    $sentencia->bindParam(':fyh_creacion', $fecha_hora);
    $sentencia->bindParam(':estado', $estado_registro);

    try {
        if($sentencia->execute()){
            $pdo->commit();
            session_start();
            $_SESSION['mensaje'] = 'Policía registrado correctamente';
            $_SESSION['icono'] = 'success';
            header('Location:'.APP_URL.'/admin');
        }else{
            $pdo->rollBack();
            session_start();
            $_SESSION['mensaje'] = 'Error al registrar el policía';
            $_SESSION['icono'] = 'error';
            header('Location:'.APP_URL.'/admin/policias/create.php');
        }
    } catch (Exception $exception) {
        session_start();
            $_SESSION['mensaje'] = 'Error al registrar el policía, vuelva a intentarlo más tarde';
            $_SESSION['icono'] = 'error';
            header('Location:'.APP_URL.'/admin');
    }
?>