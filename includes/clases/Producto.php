<?php
class Producto {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarProducto($nombre, $descripcion, $precio, $categoriaId) {
        $query = "INSERT INTO productos (nombre, descripcion, precio, categoria_id) VALUES ('$nombre', '$descripcion', '$precio', '$categoriaId')";
        return mysqli_query($this->conexion, $query);
    }

    public function listarProductos() {
        $query = "SELECT * FROM productos";
        $result = mysqli_query($this->conexion, $query);
        $productos = [];
        while ($producto = mysqli_fetch_assoc($result)) {
            $productos[] = $producto;
        }
        return $productos;
    }

    public function obtenerProducto($id) {
        $query = "SELECT * FROM productos WHERE id = '$id'";
        $result = mysqli_query($this->conexion, $query);
        return mysqli_fetch_assoc($result);
    }

    public function actualizarProducto($id, $nombre, $descripcion, $precio, $categoriaId) {
        $query = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', categoria_id = '$categoriaId' WHERE id = '$id'";
        return mysqli_query($this->conexion, $query);
    }

    public function eliminar($id) {
        $query = "DELETE FROM productos WHERE id = '" . mysqli_real_escape_string($this->conexion, $id) . "'";
        return mysqli_query($this->conexion, $query);
    }
}
?>