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
                <h1>Rol: <?=$nombre_rol;?> </h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos Registrados</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <p><?=$nombre_rol?></p>
                                            <label for="">Fecha de creación</label>
                                            <p><?=$fecha_creacion?></p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <a href="<?= APP_URL ?>/admin/roles" class="btn btn-primary">Regresar</a>
                                    </div>
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