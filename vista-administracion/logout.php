<?php
session_start();

// Destruimos todas las variables de sesión
session_destroy();

// Redirigimos al usuario al login
header("Location: login.php"); // Ajusta la ruta según donde tengas tu login
exit();