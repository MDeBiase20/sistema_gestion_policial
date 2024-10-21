<?php 
    include('../../app/config.php');
    include('../../app/controllers/armas/listado_de_armas.php');
    include('../../admin/layout/header.php');   
?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Content Header (Page header) -->
    <div class="content">
      <div class="container">
        <div class="row">
            <h1>Listado de Armas</h1>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        <div class="container">

            <div class="row">
                    <div class="col-md-12">
                    <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Armas registrados</h3>
                        
                        <div class="card-tools">
                            <a href="create.php" class = "btn btn-primary"><i class="bi bi-plus-square"></i> Registrar nueva arma</a>
                        </div><!-- /.card-tools -->
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                            <thead>
                                <tr style="text-align:center">
                                    <td>Nro</td>
                                    <td>Marca</td>
                                    <td>Modelo</td>
                                    <td>Número de serie</td>
                                    <td>Cántidad de cargadores</td>
                                    <td>Cántidad de municiones</td>
                                    <td>Estado</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $contador_armas = 0;
                                    foreach($armas as $arma){
                                        $id_armas = $arma['id_armas'];
                                        $contador_armas++;                             
                                ?>
                                <tr style="text-align:center">
                                    <td><?php echo $contador_armas; ?></td>
                                    <td><?php echo $arma['marca']; ?></td>
                                    <td><?php echo $arma['modelo']; ?></td>
                                    <td><?php echo $arma['num_serie']; ?></td>
                                    <td><?php echo $arma['cant_cargadores']; ?></td>
                                    <td><?php echo $arma['cant_municiones']; ?></td>
                                    <td>
                                        <?php if($arma['estado'] == 1){ ?>
                                            <a style="border-radius:50px" href="#" class="btn btn-success btn-sm">ACTIVO</a>
                                        <?php } else { ?>
                                            <a style="border-radius:50px" href="#" class="btn btn-danger btn-sm">INACTIVO</a>
                                        <?php } ?> 
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="show.php?id=<?php echo $id_armas; ?>" class="btn btn-info"><i class="bi bi-eye-fill"></i></a>
                                            <a href="edit.php?id=<?php echo $id_armas; ?>" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <a href="delete.php?id=<?php echo $id_armas; ?>" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Armas",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Armas",
                                        "infoFiltered": "(Filtrado de _MAX_ total Armas)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Armas",
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