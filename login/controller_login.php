<?php
include '../app/config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email='$email'";
$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
//print_r($usuarios);
$contador = 0;
$nombre_tabla = "";
foreach ($usuarios as $usuario) {
    $password_tabla = $usuario['password'];
    $contador++;
}
//echo $contador;
if (($contador > 0) && (password_verify($password, $password_tabla))) {
    //echo 'los datos son correctos';
    session_start();
    $_SESSION['mensaje'] = "Bienvenido al sistema";
    $_SESSION['icono'] = "success";
    $_SESSION['session_email'] = $email;
    header('location:' . APP_URL . "/admin");
} else {
    session_start();
    $_SESSION['mensaje'] = "Usuario o contraseña incorrectos, vuelva a intentarlo";
    header('location:' . APP_URL . "/login");
}
