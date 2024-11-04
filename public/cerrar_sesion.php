<?php
session_start();
// Destruir todas las variables de sesión
$_SESSION = array();
session_destroy(); // Destruir la sesión
header("Location: login.php"); // Redirigir a la página de inicio de sesión
exit();
?>