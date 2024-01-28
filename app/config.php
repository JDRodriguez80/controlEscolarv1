<?php

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'sistemagestion');
define('CHARSET', 'utf8');

//defining app identity
    define('APP_NAME', 'SISTEMA DE GESTIÓN ESCOLAR');
define('APP_URL', 'http://localhost/controlEscolar');
define('KEY_API_MAP', '');//TODO add key api map to google maps

//connecting to database
$connection = "mysql:host=" . SERVIDOR . ";dbname=" . BD . ";charset=" . CHARSET;
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($connection, USUARIO, PASSWORD, $options);
    //echo 'conectado ok';
} catch (PDOException $e) {
    echo 'error' . $e->getMessage();
}
//defining date and time and timezone

date_default_timezone_set('America/Matamoros');
$fecha_actual = date('Y-m-d');
$fecha_hora = date('Y-m-d H:i:s');
$dia_actual = date('d');
$mes_actual = date('m');
$ano_actual = date('Y');
$estado_de_registro=1;

