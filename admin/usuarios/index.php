<?php 
    include('../../app/config.php');
    include('../../app/controllers/usuarios/listado_usuarios.php');
    include('../../admin/layout/header.php');   
?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Content Header (Page header) -->
    <div class="content">
      <div class="container">
        <div class="row">
            <h1>Listado de usuarios</h1>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        <div class="container">

            <div class="row">
                    <div class="col-md-12">
                    <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios registrados</h3>
                        
                        <div class="card-tools">
                            <a href="create.php" class = "btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo Usuario</a>
                        </div><!-- /.card-tools -->
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                            <thead>
                                <tr style="text-align:center">
                                    <td>Nro</td>
                                    <td>Correo</td>
                                    <td>Fecha y hora de creación</td>
                                    <td>Estado</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $contador_usuario = 0;
                                    foreach($usuarios as $usuario){
                                        $id_usuarios = $usuario['id_usuario'];
                                        $contador_usuario++;                             
                                ?>
                                <tr style="text-align:center">
                                    <td><?php echo $contador_usuario; ?></td>
                                    <td><?php echo $usuario['correo']; ?></td>
                                    <td><?php echo $usuario['fyh_creacion']; ?></td>
                                    <td>
                                        <?php if($usuario['estado'] == 1){ ?>
                                            <a style="border-radius:50px" href="#" class="btn btn-success btn-sm">ACTIVO</a>
                                        <?php } else { ?>
                                            <a style="border-radius:50px" href="#" class="btn btn-danger btn-sm">INACTIVO</a>
                                        <?php } ?> 
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="show.php?id=<?php echo $id_usuarios; ?>" class="btn btn-info"><i class="bi bi-eye-fill"></i></a>
                                            <a href="edit.php?id=<?php echo $id_usuarios; ?>" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <a href="delete.php?id=<?php echo $id_usuarios; ?>" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                
                                <?php } ?>

                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
        </div>
    <!-- Main content -->
        
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

<?php
    include('../../admin/layout/footer.php');
    include('../layout/mensajes.php');
?>
<script>
$("#example1").DataTable({
                                    "pageLength": 10,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                                        "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Usuarios",
                                        "loadingRecords": "Cargando...",
                                        "processing": "Procesando...",
                                        "search": "Buscador:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Ultimo",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    },
                                    "responsive": true, "lengthChange": true, "autoWidth": false,
                                    buttons: [{
                                        extend: 'collection',
                                        text: 'Reportes',
                                        orientation: 'landscape',
                                        buttons: [{
                                            text: 'Copiar',
                                            extend: 'copy',
                                        }, {
                                            extend: 'pdf'
                                        },{
                                            extend: 'csv'
                                        },{
                                            extend: 'excel'
                                        },{
                                            text: 'Imprimir',
                                            extend: 'print'
                                        }
                                        ]
                                    },
                                        {
                                            extend: 'colvis',
                                            text: 'Visor de columnas',
                                            collectionLayout: 'fixed three-column'
                                        }
                                    ],
                                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                            
</script>