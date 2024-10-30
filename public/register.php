<?php
// Conexión a la base de datos
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash de la contraseña
    $rol = 'cliente'; // Por defecto, todos los nuevos usuarios son clientes

    // Insertar usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$nombre, $email, $password, $rol])) {
        echo "Registro exitoso. Puedes iniciar sesión.";
    } else {
        echo "Error al registrar usuario: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de tener una hoja de estilos -->
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Registrar</button>
    </form>
    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
</body>
</html>