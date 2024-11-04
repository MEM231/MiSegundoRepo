-- Crear la tabla reseñas
CREATE TABLE IF NOT EXISTS reseñas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT,
    usuario_id INT,
    texto TEXT,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Insertar reseñas de ejemplo
INSERT INTO reseñas (producto_id, usuario_id, texto) VALUES 
(1, 1, 'Excelente producto. Muy satisfecho.'),
(2, 2, 'No cumplió mis expectativas.');