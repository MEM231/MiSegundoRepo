<?php
require_once '../config/database.php'; // Asegúrate de que la ruta sea correcta

class ProductoController {
    private $db;

    public function __construct() {
        global $conn; // Usa la variable de conexión global
        $this->db = $conn; // Asigna la conexión a la propiedad de la clase
    }

    public function listarProductos() {
        $query = "SELECT * FROM productos"; // Cambia 'productos' por el nombre de tu tabla

        
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    }
}
