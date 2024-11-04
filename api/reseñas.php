<?php
header('Content-Type: application/json');
require '../includes/config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener todas las reseñas
    $query = "SELECT * FROM reseñas";
    $result = mysqli_query($conexion, $query);
    $reseñas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($reseñas);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear una nueva reseña
    $data = json_decode(file_get_contents('php://input'), true);
    $producto_id = $data['producto_id'];
    $usuario_id = $data['usuario_id'];
    $contenido = $data['contenido'];

    $query = "INSERT INTO reseñas (producto_id, usuario_id, contenido) VALUES ('$producto_id', '$usuario_id', '$contenido')";
    if (mysqli_query($conexion, $query)) {
        echo json_encode(['message' => 'Reseña creada']);
    } else {
        echo json_encode(['error' => 'Error al crear la reseña']);
    }
}
?>