<?php
header('Content-Type: application/json');
require '../includes/config/conexion.php';
require '../includes/clases/Producto.php';

// Manejo de las solicitudes GET, POST y DELETE
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener todos los productos
    $query = "SELECT * FROM productos";
    $result = mysqli_query($conexion, $query);
    $productos = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($productos);

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear un nuevo producto
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'];
    $descripcion=$data['descripcion'];
    $precio = $data['precio'];
    $categoria_id = $data['categoria_id'];

    $query = "INSERT INTO productos (nombre, descripcion, precio, categoria_id) VALUES ('$nombre', '$descripcion', '$precio', '$categoria_id')";
    if (mysqli_query($conexion, $query)) {
        echo json_encode(['message' => 'Producto creado']);
    } else {
        echo json_encode(['error' => 'Error al crear el producto']);
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Eliminar un producto
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'] ?? null;

    if ($id) {
        $query = "DELETE FROM productos WHERE id = '" . mysqli_real_escape_string($conexion, $id) . "'";
        if (mysqli_query($conexion, $query)) {
            echo json_encode(['message' => 'Producto eliminado']);
        } else {
            echo json_encode(['error' => 'Error al eliminar el producto']);
        }
    } else {
        echo json_encode(['error' => 'Faltan datos para eliminar el producto']);
    }
} else {
    echo json_encode(['error' => 'Método no permitido.']);
}
?>