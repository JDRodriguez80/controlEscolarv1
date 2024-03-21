<?php
include('../../app/config.php');
include('../../app/controllers/roles/listado_de_roles.php');
include('../../admin/layout/part1.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Content Header (Page header) -->
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Creacción de nuevo usuario</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= APP_URL; ?>/app/controllers/usuarios/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($roles as $rol) {
                                                        $id_rol = $rol['id_rol'];
                                                        $nombre_rol = $rol['nombre_rol'];
                                                        echo "<option value='$id_rol'>$nombre_rol</option>";
                                                    }
                                                    ?>

                                                </select>
                                                <a href="<?= APP_URL; ?>/admin/roles/create.php" style="margin-left: 5px;" class="btn btn-success"><i class="bi bi-file-plus"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre del usuario</label>
                                            <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres del usuario">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo electronico</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="correo electrónico">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Contraseña</label>
                                            <input type="password" class="form-control" name="password" id="" placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for=""> Confirme Contraseña</label>
                                            <input type="password" class="form-control" name="password_confirm" id="" placeholder="Confirme contraseña">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="subimt" class="btn btn-primary">Registrar</button>
                                        <a href="<?= APP_URL ?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
                                    </div>
                                </div>
                            </form>
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