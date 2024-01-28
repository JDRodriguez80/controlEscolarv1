<?php

include('../app/config.php');

session_start();

if (isset($_SESSION['session_email'])) {
    session_destroy();
    header('Location: ' . APP_URL . '/login');
}
