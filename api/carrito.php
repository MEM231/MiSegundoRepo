<?php
header('Content-Type: application/json');
require '../includes/config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener el carrito del usuario
    $usuario_id = $_GET['usuario_id'];
    $query = "SELECT * FROM carrito WHERE usuario_id = '$usuario_id'";
    $result = mysqli_query($conexion, $query);
    $carrito = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($carrito);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Agregar un producto al carrito
    $data = json_decode(file_get_contents('php://input'), true);
    $usuario_id = $data['usuario_id'];
    $producto_id = $data['producto_id'];

    $query = "INSERT INTO carrito (usuario_id, producto_id) VALUES ('$usuario_id', '$producto_id')";
    if (mysqli_query($conexion, $query)) {
        echo json_encode(['message' => 'Producto agregado al carrito']);
    } else {
        echo json_encode(['error' => 'Error al agregar el producto al carrito']);
    }
}
?>