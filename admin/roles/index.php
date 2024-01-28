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
                <div class="col-md-6" style="text-align: center;">
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
                            <table class="table table-striped table-bordered table-hover table-sm">
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
                                                    <button type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </div>
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