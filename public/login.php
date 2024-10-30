<?php
// Iniciar sesión
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultar usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        // Guardar información del usuario en la sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];
        
        // Redirigir según el rol
        if ($usuario['rol'] === 'vendedor') {
            header("Location: vendedor_dashboard.php"); // Cambia esta ruta según tu estructura
        } else {
            header("Location: index.php"); // Cambia esta ruta según tu estructura
        }
        exit();
    } else {
        echo "Credenciales incorrectas. Por favor intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="styles.css"> <!-- Falta tener una hoja de estilos -->
</head>
<body>
    <h2>Inicio de Sesión</h2>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Iniciar Sesión</button>
    </form>
    <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a>.</p>
</body>
</html>