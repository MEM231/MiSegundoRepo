-- Crear la tabla categorias
CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE
);

-- Insertar categorías de ejemplo
INSERT INTO categorias (nombre) VALUES 
('Electrónica'),
('Ropa');