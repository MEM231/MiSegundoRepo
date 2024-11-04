-- Crear la tabla pagos
CREATE TABLE IF NOT EXISTS pagos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    orden_id INT,
    monto DECIMAL(10, 2) NOT NULL,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (orden_id) REFERENCES ordenes(id) ON DELETE CASCADE
);

-- Insertar pagos de ejemplo
INSERT INTO pagos (orden_id, monto) VALUES 
(1, 49.98),
(2, 29.99);