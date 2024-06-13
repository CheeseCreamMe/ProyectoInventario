Create database registro_personas;

use database registro_personas;

CREATE TABLE personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    second_name VARCHAR(100),
    lastname VARCHAR(100) NOT NULL,
    second_lastname VARCHAR(100),
    edad INT NOT NULL,
    estado VARCHAR(50) NOT NULL,
    fecha_ingreso DATE NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    cargo VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
