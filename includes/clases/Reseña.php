<?php
class Reseña {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarReseña($productoId, $usuarioId, $texto) {
        $query = "INSERT INTO reseñas (producto_id, usuario_id, texto) VALUES ('$productoId', '$usuarioId', '$texto')";
        return mysqli_query($this->conexion, $query);
    }

    public function obtenerReseñasPorProducto($productoId) {
        $query = "SELECT * FROM reseñas WHERE producto_id = '$productoId'";
        $result = mysqli_query($this->conexion, $query);
        $reseñas = [];
        while ($reseña = mysqli_fetch_assoc($result)) {
            $reseñas[] = $reseña;
        }
        return $reseñas;
    }
}
?>