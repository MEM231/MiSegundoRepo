<?php
header('Content-Type: application/json');
require '../includes/config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener todas las categorías
    $query = "SELECT * FROM categorias";
    $result = mysqli_query($conexion, $query);
    $categorias = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($categorias);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear una nueva categoría
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'];

    $query = "INSERT INTO categorias (nombre) VALUES ('$nombre')";
    if (mysqli_query($conexion, $query)) {
        echo json_encode(['message' => 'Categoría creada']);
    } else {
        echo json_encode(['error' => 'Error al crear la categoría']);
    }
}
?>