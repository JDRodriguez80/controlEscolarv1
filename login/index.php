<?php
include '../app/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= APP_URL ?>/public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= APP_URL ?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= APP_URL ?>/public/dist/css/adminlte.min.css">
    <!-- sweet alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div style="text-align: center;">
            <img src="../public/images/loginPic.png" height="250" width="250">
        </div>
        <br>
        <div class="login-logo">
            <h3><b><?= APP_NAME; ?></b></h3>

        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar Sessión</p>
                <hr>
                <form action="controller_login.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sessión</button>
                    </div>

                </form>
                <?php
                session_start();
                if (isset($_SESSION['mensaje'])) {
                    $mensaje = $_SESSION['mensaje'];
                ?>
                    <script>
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "<?=$mensaje?>",
                            showConfirmButton: false,
                            timer: 4000
                        });
                    </script>
                <?php
                session_destroy();
                }
                ?>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->;
    <script src="<?php APP_URL ?>/public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php APP_URL ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php APP_URL ?>/public/dist/js/adminlte.min.js"></script>
</body>

</html>