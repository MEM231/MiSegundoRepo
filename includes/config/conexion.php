<?php
// Configuración de conexión a la base de datos usando mysqli
$host = 'localhost';
$dbname = 'mi_marketplace';
$username = 'root';
$password = '';

$conexion = new mysqli($host, $username, $password, $dbname);

// Verificar si hubo un error de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>

