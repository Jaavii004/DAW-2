CREATE DATABASE fichajes;
USE fichajes;

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE registros (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    clock_in DATETIME NOT NULL,
    clock_out DATETIME DEFAULT NULL,
    notas TEXT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
-- Tabla de empresas
CREATE TABLE empresas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    direccion TEXT,
    telefono VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    invitation_code VARCHAR(20) UNIQUE
);

-- Tabla de usuarios (modificada)
ALTER TABLE usuarios ADD (
    empresa_id INT,
    rol ENUM('empleado', 'manager', 'admin') DEFAULT 'empleado',
    horario_id INT,
    FOREIGN KEY (empresa_id) REFERENCES empresas(id)
);

-- Tabla de horarios
CREATE TABLE horarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    empresa_id INT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    hora_entrada TIME NOT NULL,
    hora_salida TIME NOT NULL,
    dias_semana SET('Lun','Mar','Mie','Jue','Vie','Sab','Dom'),
    FOREIGN KEY (empresa_id) REFERENCES empresas(id)
);

-- Tabla de días libres
CREATE TABLE dias_libres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    motivo TEXT,
    estado ENUM('pendiente', 'aprobado', 'rechazado') DEFAULT 'pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);