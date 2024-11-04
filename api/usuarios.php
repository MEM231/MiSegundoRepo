<?php
header('Content-Type: application/json');
require '../includes/config/conexion.php';
require '../includes/clases/Usuario.php';

$usuario = new Usuario($conexion);
// Aquí, creamos usuarios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'] ?? null;
    $email = $data['email'] ?? null;
    $password = $data['password'] ?? null;

    if ($nombre && $email && $password) {
        if ($usuario->registrar($nombre, $email, $password)) {
            echo json_encode(['message' => 'Usuario creado']);
        } else {
            echo json_encode(['error' => 'Error al crear el usuario']);
        }
    } else {
        echo json_encode(['error' => 'Faltan datos para crear el usuario']);
    }
    
 } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Aquí, llamamos a una función para obtener todos los usuarios
    $usuarios = $usuario->obtenerTodos(); // función definida en la clase Usuario
    echo json_encode($usuarios);

 }

   // Manejo de la actualización de un usuario
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $data);
    
    $id = $data['id'] ?? null;
    $nombre = $data['nombre'] ?? null;
    $email = $data['email'] ?? null;
    $password = $data['password'] ?? null;

    if ($id && ($nombre || $email || $password)) {
        if ($usuario->actualizar($id, $nombre, $email, $password)) {
            echo json_encode(['message' => 'Usuario actualizado']);
        } else {
            echo json_encode(['error' => 'Error al actualizar el usuario']);
        }
    } else {
        echo json_encode(['error' => 'Faltan datos para actualizar el usuario']);
    }
}

// Manejo de la eliminación de un usuario
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'] ?? null;

    if ($id) {
        if ($usuario->eliminar($id)) {
            echo json_encode(['message' => 'Usuario eliminado']);
        } else {
            echo json_encode(['error' => 'Error al eliminar el usuario']);
        }
    } else {
        echo json_encode(['error' => 'Faltan datos para eliminar el usuario']);
    }

}

?>