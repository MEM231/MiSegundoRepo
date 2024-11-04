<?php
class Carrito {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarAlCarrito($usuarioId, $productoId) {
        $query = "INSERT INTO carrito (usuario_id, producto_id) VALUES ('$usuarioId', '$productoId')";
        return mysqli_query($this->conexion, $query);
    }

    public function obtenerCarrito($usuarioId) {
        $query = "SELECT * FROM carrito WHERE usuario_id = '$usuarioId'";
        $result = mysqli_query($this->conexion, $query);
        $carrito = [];
        while ($producto = mysqli_fetch_assoc($result)) {
            $carrito[] = $producto;
        }
        return $carrito;
    }

    public function eliminarDelCarrito($usuarioId, $productoId) {
        $query = "DELETE FROM carrito WHERE usuario_id = '$usuarioId' AND producto_id = '$productoId'";
        return mysqli_query($this->conexion, $query);
    }
}
?>