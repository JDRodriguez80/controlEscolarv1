<?php 
    include "../../../app/config.php";
    $id_rol = $_POST['id_rol'];

    $sentence = $pdo->prepare("DELETE FROM roles WHERE id_rol=:id_rol");
    $sentence->bindParam(':id_rol', $id_rol);
    
        if ($sentence->execute()) {
            session_start();
            $_SESSION['mensaje'] = 'Se elimino el rol correctamente';
            $_SESSION['icono'] = 'success';
            header('Location: ' . APP_URL . '/admin/roles');
        } else {
            session_start();
            $_SESSION['mensaje'] = 'error al eliminar el rol';
            $_SESSION['icono'] = 'error';
            header('Location: ' . APP_URL . '/admin/roles');
        }
    

?>