
<?php
$file_path = 'controladores/ProductoController.php'; // Ajusta la ruta si es necesario

if (!file_exists($file_path)) {
    die("Error: El archivo '$file_path' no se encuentra.");
}

require_once $file_path;

$productoController = new ProductoController();
$productos = $productoController->listarProductos();
header('Content-Type: application/json'); // Establecer el encabezado para la respuesta JSON
echo json_encode($productos);