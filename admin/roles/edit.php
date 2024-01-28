<?php
$id_rol = $_GET['id'];




include('../../app/config.php');
include('../../admin/layout/part1.php');
include('../../app/controllers/roles/datos_del_rol.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Content Header (Page header) -->
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Editar el rol: <?= $nombre_rol; ?> </h1>
            </div>
            <form action="<?= APP_URL ?>/app/controllers/roles/update.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title">Datos Registrados</h3>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" name="id_rol" value="<?= $id_rol ?>">
                                            <label for="">Nombre del rol</label>
                                            <input type="text" class="form-control" name="nombre_rol" value="<?= $nombre_rol ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="subimt" class="btn btn-success">Actualizar</button>
                                        <a href="<?= APP_URL ?>/admin/roles" class="btn btn-secondary">Cancelar</a>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                </div><!-- /.row -->
            </form>
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