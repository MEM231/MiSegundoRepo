<?php
class Pago {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function procesarPago($ordenId, $monto) {
        $query = "INSERT INTO pagos (orden_id, monto) VALUES ('$ordenId', '$monto')";
        return mysqli_query($this->conexion, $query);
    }

    public function obtenerPagosPorOrden($ordenId) {
        $query = "SELECT * FROM pagos WHERE orden_id = '$ordenId'";
        $result = mysqli_query($this->conexion, $query);
        $pagos = [];
        while ($pago = mysqli_fetch_assoc($result)) {
            $pagos[] = $pago;
        }
        return $pagos;
    }
}
?>