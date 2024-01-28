<?php
include "../../../app/config.php";
$nombre_rol = $_POST['nombre_rol'];
$nombre_rol=mb_strtoupper($nombre_rol,'UTF-8');
/**======================
 *!    validando por vacío
 *========================**/
if (empty($nombre_rol)) {
    session_start();
    $_SESSION['mensaje'] = 'El nombre del rol no puede estar vacío';
    $_SESSION['icono'] = 'warning';
    header('Location: ' . APP_URL . '/admin/roles/create.php');
    die();
}

$sentence = $pdo->prepare("INSERT INTO roles (nombre_rol,fyh_creacion,estado ) VALUES (:nombre_rol,:fyh_creacion,:estado)");
$sentence->bindParam(':nombre_rol', $nombre_rol);
$sentence->bindParam(':fyh_creacion', $fecha_hora);
$sentence->bindParam(':estado', $estado_de_registro);

try {
    if ($sentence->execute()) {
        session_start();
        $_SESSION['mensaje'] = 'Se ha creado el rol correctamente';
        $_SESSION['icono'] = 'success';
        header('Location: ' . APP_URL . '/admin/roles');
    } else {
        session_start();
        $_SESSION['mensaje'] = 'error al crear el rol';
        $_SESSION['icono'] = 'error';
        header('Location: ' . APP_URL . '/admin/roles/create.php');
    }
} catch (PDOException $ex) {
    session_start();
        $_SESSION['mensaje'] = 'Este rol ya existe';
        $_SESSION['icono'] = 'error';
        header('Location: ' . APP_URL . '/admin/roles/create.php');
}
