<?php
require_once '../../config/database.php';

class UsuarioController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function registrarUsuario($nombre, $email, $password, $rol) {
        $query = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        return $stmt->execute([$nombre, $email, $hashed_password, $rol]);
    }
}