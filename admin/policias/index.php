<?php 
    include('../../app/config.php');
    include('../../app/controllers/policias/listado_policias.php');
    include('../../admin/layout/header.php');   
?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Content Header (Page header) -->
    <div class="content">
      <div class="container">
        <div class="row">
            <h1>Listado de policias</h1>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        <div class="container">

            <div class="row">
                    <div class="col-md-12">
                    <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Policias registrados</h3>
                        
                        <div class="card-tools">
                            <a href="create.php" class = "btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo Policía</a>
                        </div><!-- /.card-tools -->
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                            <thead>
                                <tr style="text-align:center">
                                    <td>Nro</td>
                                    <td>Nombre y Apellido</td>
                                    <td>NI</td>
                                    <td>Jerarquía</td>
                                    <td>Estado</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $contador_policias = 0;
                                    foreach($policias as $policia){
                                        $id_policias = $policia['id_policia'];
                                        $contador_policias++;                             
                                ?>
                                <tr style="text-align:center">
                                    <td><?php echo $contador_policias; ?></td>
                                    <td><?php echo $policia['nombres']."".$policia['apellido']; ?></td>
                                    <td><?php echo $policia['ni']; ?></td>
                                    <td><?php echo $policia['jerarquia']; ?></td>
                                    <td>
                                        <?php if($policia['estado'] == 1){ ?>
                                            <a style="border-radius:50px" href="#" class="btn btn-success btn-sm">ACTIVO</a>
                                        <?php } else { ?>
                                            <a style="border-radius:50px" href="#" class="btn btn-danger btn-sm">INACTIVO</a>
                                        <?php } ?> 
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="show.php?id=<?php echo $id_policias; ?>" class="btn btn-info"><i class="bi bi-eye-fill"></i></a>
                                            <a href="edit.php?id=<?php echo $id_policias; ?>" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <a href="delete.php?id=<?php echo $id_policias; ?>" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
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
    include('../../layout/mensaje.php');
?>
<script>
$("#example1").DataTable({
                                    "pageLength": 10,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Policias",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Policias",
                                        "infoFiltered": "(Filtrado de _MAX_ total Policias)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Policias",
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