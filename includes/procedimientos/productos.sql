-- Crear la tabla productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    categoria_id INT,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL
);

-- Insertar productos de ejemplo
INSERT INTO productos (nombre, descripcion, precio, categoria_id) VALUES 
('Producto 1', 'Descripción del Producto 1', 19.99, 1),
('Producto 2', 'Descripción del Producto 2', 29.99, 2);