<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Menú Principal</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">TuMarketplace</a>
            </div>
            <ul class="menu">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Carrito</a></li>
                <li><a href="#">Mi cuenta</a></li>
                <li><a href="#">Historial de pedidos</a></li>
                <li><a href="#">Ayuda/Soporte</a></li>
                <?php
                // Verificar si el usuario está autenticado
                if (isset($_SESSION['usuario_id'])) {
                    echo '<li><span>Hola, ' . htmlspecialchars($_SESSION['nombre']) . '</span></li>';
                    echo '<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>';
                } else {
                    echo '<li><a href="login.php">Iniciar sesión</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
</body>
</html>