<?php
class Categoria {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarCategoria($nombre) {
        $query = "INSERT INTO categorias (nombre) VALUES ('$nombre')";
        return mysqli_query($this->conexion, $query);
    }

    public function listarCategorias() {
        $query = "SELECT * FROM categorias";
        $result = mysqli_query($this->conexion, $query);
        $categorias = [];
        while ($categoria = mysqli_fetch_assoc($result)) {
            $categorias[] = $categoria;
        }
        return $categorias;
    }
}
?>