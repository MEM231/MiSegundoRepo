<?php
header('Content-Type: application/json');
require '../includes/config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener todos los pagos
    $query = "SELECT * FROM pagos";
    $result = mysqli_query($conexion, $query);
    $pagos = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($pagos);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear un nuevo pago
    $data = json_decode(file_get_contents('php://input'), true);
    $orden_id = $data['orden_id'];
    $monto = $data['monto'];

    $query = "INSERT INTO pagos (orden_id, monto) VALUES ('$orden_id', '$monto')";
    if (mysqli_query($conexion, $query)) {
        echo json_encode(['message' => 'Pago creado']);
    } else {
        echo json_encode(['error' => 'Error al crear el pago']);
    }
}
?>