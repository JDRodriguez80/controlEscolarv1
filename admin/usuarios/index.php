<?php
include('../../app/config.php');
include('../../admin/layout/part1.php');
include('../../app/controllers/usuarios/listado_de_usuarios.php');
//print_r($usuarios);
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

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Usuarios registrados</h3>

                            <div class="card-tools">
                                <a href="<?= APP_URL ?>/admin/usuarios/create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo usuario</a>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="text-align: center;">Número</th>
                                        <th style="text-align: center;">Nombre del usuario</th>
                                        <th style="text-align: center;">Rol</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_usuarios = 0;
                                    foreach ($usuarios as $usuario) {
                                        $id_usuario = $usuario['id_usuario'];
                                        $contador_usuarios++ ?>
                                        <tr>
                                            <td><?= $contador_usuarios ?></td>
                                            <td><?= $usuario['nombres'] ?></td>
                                            <td><?= $usuario['nombre_rol'] ?></td>
                                            <td><?= $usuario['email'] ?></td>
                                            <td style="text-align: center;">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="show.php?id=<?= $id_usuario ?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                    <a href="edit.php?id=<?= $id_usuario ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <form action="<?= APP_URL ?>/app/controllers/roles/delete.php" onclick="preguntar(event)" method="post" id="miFormulario<?= $id_usuario; ?>">
                                                        <input type="text" name="id_usuario" value="<?= $id_usuario ?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                                <!--* script para preguntar en borrado --->
                                                <script>
                                                    function preguntar(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: 'Atención',
                                                            text: "¿Está seguro de eliminar a este usuario?",
                                                            icon: 'question',
                                                            showDenyButton: true,
                                                            confirmarButtonText: 'Eliminar',
                                                            confirmButtonColor: '#a5161d',
                                                            denyButtonText: 'Cancelar',
                                                            denyButtonColor: '#270a0a',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = $('#miFormulario<?= $id_usuario; ?>');
                                                                form.submit();
                                                                /*Swal.fire(
                                                                    'Eliminado',
                                                                    'El usuario ha sido eliminado correctamente',
                                                                    'success'
                                                                );*/
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