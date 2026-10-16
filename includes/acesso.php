<?php

session_start();

// 1. Cabeceras anti-caché para bloquear el botón "Atrás" después de cerrar sesión
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// 2. Validación de seguridad de la sesión
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] == "") {
    header("Location: login.php");
    exit();
}

?>