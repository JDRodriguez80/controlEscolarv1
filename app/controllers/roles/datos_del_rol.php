<?php 
$id_rol = $_GET['id'];

$query_rol= $pdo->prepare("SELECT * FROM roles WHERE id_rol=:id_rol AND estado='1'");
$query_rol->bindParam(':id_rol', $id_rol);
$query_rol->execute();
$roles = $query_rol->fetchAll(PDO::FETCH_ASSOC);
foreach ($roles as $rol) {
    
    $nombre_rol = $rol['nombre_rol'];
    $estado_rol = $rol['estado'];
    $fecha_creacion = $rol['fyh_creacion'];
    $fecha_actualizacion = $rol['fyh_actualizacion'];
}

?>