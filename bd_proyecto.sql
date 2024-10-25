-- Tabla de Equipos
CREATE TABLE Equipos (
    ID_Equipo INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    Barrio VARCHAR(100) NOT NULL,
    Ciudad VARCHAR(100) NOT NULL,
    Año_Fundación INT NOT NULL,
    Estadio VARCHAR(100) NOT NULL,
    Capacidad_Estadio INT NOT NULL,
    Colores VARCHAR(100) NOT NULL
);

-- Tabla de Jugadores
CREATE TABLE Jugadores (
    ID_Jugador INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    Apellido VARCHAR(100) NOT NULL,
    Fecha_Nacimiento DATE NOT NULL,
    Nacionalidad VARCHAR(100) NOT NULL,
    Posición VARCHAR(50) NOT NULL,
    ID_Equipo INT,
    FOREIGN KEY (ID_Equipo) REFERENCES Equipos(ID_Equipo)
);

-- Tabla de Historial de Estados de Jugadores
CREATE TABLE Historial_Estados (
    ID_Historial INT PRIMARY KEY AUTO_INCREMENT,
    ID_Jugador INT,
    Estado ENUM('Activo', 'Lesionado', 'Retirado') NOT NULL,
    Fecha_Cambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_Jugador) REFERENCES Jugadores(ID_Jugador)
);

-- Tabla de Salarios
CREATE TABLE Salarios (
    ID_Salario INT PRIMARY KEY AUTO_INCREMENT,
    ID_Jugador INT,
    Sueldo DECIMAL(10, 2) NOT NULL,
    Fecha_Pago DATE,
    FOREIGN KEY (ID_Jugador) REFERENCES Jugadores(ID_Jugador)
);

-- Tabla de Cuotas de Pago
CREATE TABLE Cuotas (
    ID_Cuota INT PRIMARY KEY AUTO_INCREMENT,
    ID_Jugador INT,
    Monto DECIMAL(10, 2) NOT NULL,
    Fecha_Pago DATE,
    Pagado BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (ID_Jugador) REFERENCES Jugadores(ID_Jugador)
);

-- Tabla de Entrenadores
CREATE TABLE Entrenadores (
    ID_Entrenador INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    Apellido VARCHAR(100) NOT NULL,
    Fecha_Nacimiento DATE NOT NULL,
    Nacionalidad VARCHAR(100) NOT NULL,
    ID_Equipo INT,
    FOREIGN KEY (ID_Equipo) REFERENCES Equipos(ID_Equipo)
);

-- Tabla de Salarios de Entrenadores
CREATE TABLE Salarios_Entrenadores (
    ID_Salario INT PRIMARY KEY AUTO_INCREMENT,
    ID_Entrenador INT,
    Sueldo DECIMAL(10, 2) NOT NULL,
    Fecha_Pago DATE,
    FOREIGN KEY (ID_Entrenador) REFERENCES Entrenadores(ID_Entrenador)
);

-- Tabla de Partidos
CREATE TABLE Partidos (
    ID_Partido INT PRIMARY KEY AUTO_INCREMENT,
    Fecha DATE NOT NULL,
    Equipo_Local INT,
    Equipo_Visitante INT,
    Goles_Local INT NOT NULL,
    Goles_Visitante INT NOT NULL,
    Estatus ENUM('Programado', 'Finalizado', 'Cancelado') NOT NULL DEFAULT 'Programado',
    Tipo ENUM('Amistoso', 'Competitivo') NOT NULL DEFAULT 'Competitivo',
    FOREIGN KEY (Equipo_Local) REFERENCES Equipos(ID_Equipo),
    FOREIGN KEY (Equipo_Visitante) REFERENCES Equipos(ID_Equipo)
);

-- Tabla de Competiciones
CREATE TABLE Competiciones (
    ID_Competicion INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    Tipo VARCHAR(50) NOT NULL,
    Año INT NOT NULL
);

-- Tabla de Estadísticas de Jugadores
CREATE TABLE Estadisticas_Jugadores (
    ID_Estadistica INT PRIMARY KEY AUTO_INCREMENT,
    ID_Jugador INT,
    ID_Competicion INT,
    Partidos_Jugados INT NOT NULL,
    Goles INT NOT NULL,
    Asistencias INT NOT NULL,
    Tarjetas_Rojas INT NOT NULL,
    Tarjetas_Amarillas INT NOT NULL,
    Minutos_Jugados INT NOT NULL DEFAULT 0,
    Goles_Penales INT NOT NULL DEFAULT 0,
    FOREIGN KEY (ID_Jugador) REFERENCES Jugadores(ID_Jugador),
    FOREIGN KEY (ID_Competicion) REFERENCES Competiciones(ID_Competicion)
);

-- Tabla de Usuarios (comunitarios)
CREATE TABLE Usuarios (
    ID_Usuario INT PRIMARY KEY AUTO_INCREMENT,
    Nombre_Usuario VARCHAR(100) NOT NULL UNIQUE,
    Contraseña VARCHAR(255) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Fecha_Creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Roles
CREATE TABLE Roles (
    ID_Rol INT PRIMARY KEY AUTO_INCREMENT,
    Nombre_Rol ENUM('Jugador', 'Entrenador', 'Administrador', 'Comunidad', 'Fan') NOT NULL
);

-- Tabla de Asignación de Roles a Usuarios
CREATE TABLE Usuario_Roles (
    ID_Usuario INT,
    ID_Rol INT,
    PRIMARY KEY (ID_Usuario, ID_Rol),
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID_Usuario),
    FOREIGN KEY (ID_Rol) REFERENCES Roles(ID_Rol)
);

-- Tabla de Notificaciones
CREATE TABLE Notificaciones (
    ID_Notificacion INT PRIMARY KEY AUTO_INCREMENT,
    ID_Usuario INT,
    Mensaje TEXT NOT NULL,
    Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Leida BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID_Usuario)
);
