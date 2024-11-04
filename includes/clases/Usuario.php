<?php
class Usuario {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function registrar($nombre, $email, $password) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$passwordHash')";
        return mysqli_query($this->conexion, $query);
    }

    public function autenticar($email, $password) {
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($this->conexion, $query);
        $usuario = mysqli_fetch_assoc($result);

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario; // Retorna los detalles del usuario
        }
        return false; // Credenciales inválidas
    }

    public function obtenerDetalles($id) {
        $query = "SELECT * FROM usuarios WHERE id = '$id'";
        $result = mysqli_query($this->conexion, $query);
        return mysqli_fetch_assoc($result);
    }

    public function obtenerTodos() {
        $query = "SELECT id, nombre, email FROM usuarios";
        $result = mysqli_query($this->conexion, $query);
        $usuarios = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            $usuarios[] = $row;
        }
        return $usuarios;
    }

    public function actualizar($id, $nombre = null, $email = null, $password = null) {
        $set = [];
        
        if ($nombre) {
            $set[] = "nombre = '" . mysqli_real_escape_string($this->conexion, $nombre) . "'";
        }
        if ($email) {
            $set[] = "email = '" . mysqli_real_escape_string($this->conexion, $email) . "'";
        }
        if ($password) {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $set[] = "password = '" . mysqli_real_escape_string($this->conexion, $passwordHash) . "'";
        }
        
        if (count($set) > 0) {
            $query = "UPDATE usuarios SET " . implode(", ", $set) . " WHERE id = '$id'";
            return mysqli_query($this->conexion, $query);
        }
        return false; // Si no hay nada que actualizar
    }

    public function eliminar($id) {
        $query = "DELETE FROM usuarios WHERE id = '$id'";
        return mysqli_query($this->conexion, $query);
    }

}
?>