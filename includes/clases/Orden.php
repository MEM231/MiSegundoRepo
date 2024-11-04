<?php
class Orden {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function crearOrden($usuarioId, $productos) {
        $query = "INSERT INTO ordenes (usuario_id) VALUES ('$usuarioId')";
        if (mysqli_query($this->conexion, $query)) {
            $ordenId = mysqli_insert_id($this->conexion);
            foreach ($productos as $productoId) {
                $this->agregarProductoAOrden($ordenId, $productoId);
            }
            return $ordenId;
        }
        return false;
    }

    private function agregarProductoAOrden($ordenId, $productoId) {
        $query = "INSERT INTO orden_producto (orden_id, producto_id) VALUES ('$ordenId', '$productoId')";
        return mysqli_query($this->conexion, $query);
    }

    public function obtenerOrdenesPorUsuario($usuarioId) {
        $query = "SELECT * FROM ordenes WHERE usuario_id = '$usuarioId'";
        $result = mysqli_query($this->conexion, $query);
        $ordenes = [];
        while ($orden = mysqli_fetch_assoc($result)) {
            $ordenes[] = $orden;
        }
        return $ordenes;
    }
}
?>