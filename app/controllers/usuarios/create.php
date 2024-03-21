<?php
include "../../../app/config.php";
$nombres = $_POST['nombres'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
if ($password == $password_confirm) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sentencia = $pdo->prepare('INSERT INTO usuarios
(nombres,rol_id,email,password, fyh_creacion, estado)
VALUES ( :nombres,:rol_id,:email,:password,:fyh_creacion,:estado)');

    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam('fyh_creacion', $fecha_hora);
    $sentencia->bindParam('estado', $estado_de_registro);

    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = 'Usuario creado correctamente ';
            $_SESSION['icono'] = 'success';
            header('Location: ' . APP_URL . '/admin/usuarios');
        } else {
            session_start();
            $_SESSION['mensaje'] = 'error al crear el usuario';
            $_SESSION['icono'] = 'error';
            header('Location: ' . APP_URL . '/admin/usuarios/create.php');
        }
    } catch (PDOException $ex) {
        session_start();
        $_SESSION['mensaje'] = 'Este ya ha sido registrado ';
        $_SESSION['icono'] = 'error';
        header('Location: ' . APP_URL . '/admin/usuarios/create.php');
    }
} else {
    session_start();
    $_SESSION['mensaje'] = 'Las contraseñas no coinciden';
    $_SESSION['icono'] = 'warning';
?> <script>
        window.history.back();
    </script> <?php
                die();
            }
?>