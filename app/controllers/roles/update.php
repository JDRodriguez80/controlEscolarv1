<?php

include "../../../app/config.php";
$id_rol = $_POST['id_rol'];
$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');

/**======================
 *!    validando por vacío
 *========================**/
if (empty($nombre_rol)) {
    session_start();
    $_SESSION['mensaje'] = 'El nombre del rol no puede estar vacío';
    $_SESSION['icono'] = 'warning';
    header('Location: ' . APP_URL . '/admin/roles/edit.php?id=' . $id_rol);
    die();
}

$sentence = $pdo->prepare("UPDATE roles SET nombre_rol=:nombre_rol WHERE id_rol=:id_rol");
$sentence->bindParam(':nombre_rol', $nombre_rol);
$sentence->bindParam(':id_rol', $id_rol);

try {
    if ($sentence->execute()) {
        session_start();
        $_SESSION['mensaje'] = 'Se actualizó el rol correctamente';
        $_SESSION['icono'] = 'success';
        header('Location: ' . APP_URL . '/admin/roles');
    } else {
        session_start();
        $_SESSION['mensaje'] = 'error al actualizar el rol';
        $_SESSION['icono'] = 'error';
        header('Location: ' . APP_URL . '/admin/roles/edit.php?id=' . $id_rol);
    }
} catch (PDOException $ex) {
    session_start();
    $_SESSION['mensaje'] = 'Este rol ya existe';
    $_SESSION['icono'] = 'error';
    header('Location: ' . APP_URL . '/admin/roles/edit.php?id=' . $id_rol);
}
