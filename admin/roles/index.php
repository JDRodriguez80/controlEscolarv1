<?php
include('../../app/config.php');
include('../../admin/layout/part1.php');
include('../../app/controllers/roles/listado_de_roles.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Content Header (Page header) -->
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de roles</h1>
            </div>

            <div class="row">
                <div class="col-md-8" style="text-align: center;">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Roles registrados</h3>

                            <div class="card-tools">
                                <a href="<?= APP_URL ?>/admin/roles/create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo rol</a>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="text-align: center;">Número</th>
                                        <th style="text-align: center;">Nombre del rol</th>
                                        <th style="text-align: center;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_rol = 0;
                                    foreach ($roles as $rol) {
                                        $id_rol = $rol['id_rol'];
                                        $contador_rol++ ?>
                                        <tr>
                                            <td><?= $contador_rol ?></td>
                                            <td><?= $rol['nombre_rol'] ?></td>
                                            <td style="text-align: center;">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="show.php?id=<?= $id_rol ?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                    <a href="edit.php?id=<?= $id_rol ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <form action="<?= APP_URL ?>/app/controllers/roles/delete.php" onclick="preguntar(event)" method="post" id="miFormulario<?= $id_rol; ?>">
                                                        <input type="text" name="id_rol" value="<?= $id_rol ?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                                <!--* script para preguntar en borrado --->
                                                <script>
                                                    function preguntar(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: 'Atención',
                                                            text: "¿Está seguro de eliminar este rol?",
                                                            icon: 'question',
                                                            showDenyButton: true,
                                                            confirmarButtonText: 'Eliminar',
                                                            confirmButtonColor: '#a5161d',
                                                            denyButtonText: 'Cancelar',
                                                            denyButtonColor: '#270a0a',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = $('#miFormulario<?= $id_rol; ?>');
                                                                form.submit();
                                                                Swal.fire(
                                                                    'Eliminado',
                                                                    'El rol ha sido eliminado correctamente',
                                                                    'success'
                                                                );
                                                            }
                                                        });
                                                    }
                                                </script>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include('../../admin/layout/part2.php');
include('../../layout/mensajes.php');
?>

<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ total Roles)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Roles",
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
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy',
                    }, {
                        extend: 'pdf'
                    }, {
                        extend: 'csv'
                    }, {
                        extend: 'excel'
                    }, {
                        text: 'Imprimir',
                        extend: 'print'
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>