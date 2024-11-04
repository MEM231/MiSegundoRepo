<?php
header('Content-Type: application/json');
require '../includes/config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener todas las órdenes
    $query = "SELECT * FROM ordenes";
    $result = mysqli_query($conexion, $query);
    $ordenes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($ordenes);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear una nueva orden
    $data = json_decode(file_get_contents('php://input'), true);
    $usuario_id = $data['usuario_id'];
    $producto_id = $data['producto_id'];
    $cantidad = $data['cantidad'];

    $query = "INSERT INTO ordenes (usuario_id, producto_id, cantidad) VALUES ('$usuario_id', '$producto_id', '$cantidad')";
    if (mysqli_query($conexion, $query)) {
        echo json_encode(['message' => 'Orden creada']);
    } else {
        echo json_encode(['error' => 'Error al crear la orden']);
    }
}
?>