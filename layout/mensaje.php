<?php
#Esto va a hacer que los mensajes sean globales

if( (isset($_SESSION['mensaje'])) && (isset($_SESSION['icono'])) ){
    $mensaje = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
?>

<script>
    Swal.fire({
    position: "top-end",
    icon: "<?php echo $icono; ?>",
    title: "<?php echo $mensaje; ?>",
    showConfirmButton: false,
    timer: 4000
});
</script>

<?php
    #Usamos la palabra reservada de php unset para eliminar la sesión
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);
}
?>