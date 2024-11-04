-- Crear la tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insertar usuarios de ejemplo
INSERT INTO usuarios (nombre, email, password) VALUES 
('Juan Perez', 'juan.perez@example.com', 'hashed_password1'),
('Maria Lopez', 'maria.lopez@example.com', 'hashed_password2');