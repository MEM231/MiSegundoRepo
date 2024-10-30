<?php
class Producto {
    private $conn;
    private $table_name = "productos"; // Nombre de la tabla

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para leer productos
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>