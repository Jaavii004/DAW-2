-- Tabla de Equipos (Club + Equipos rivales)
CREATE TABLE Equipos (
    ID_Equipo INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    Barrio VARCHAR(100) NOT NULL,
    Ciudad VARCHAR(100) NOT NULL,
    Año_Fundación INT NOT NULL,
    Estadio VARCHAR(100) NOT NULL,
    Capacidad_Estadio INT NOT NULL,
    Colores VARCHAR(100) NOT NULL,
    Categoria ENUM('Juveniles', 'Alevines', 'Infantiles', 'Cadetes', 'Benjamines') NOT NULL,
    Nivel CHAR(1)  -- Nivel para indicar A, B, C...
);

-- Tabla de Temporadas
CREATE TABLE Temporadas (
    ID_Temporada INT PRIMARY KEY AUTO_INCREMENT,
    Año_Inicio YEAR NOT NULL,
    Año_Fin YEAR NOT NULL
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
    Tipo_Pago ENUM('Mensual', 'Bonus', 'Otros') NOT NULL DEFAULT 'Mensual',
    FOREIGN KEY (ID_Jugador) REFERENCES Jugadores(ID_Jugador)
);

-- Tabla de Historial de Pagos
CREATE TABLE Historial_Pagos (
    ID_Pago INT PRIMARY KEY AUTO_INCREMENT,
    ID_Jugador INT,
    Monto DECIMAL(10, 2) NOT NULL,
    Fecha_Pago DATE,
    Tipo_Pago ENUM('Salario', 'Cuota', 'Otros') NOT NULL,
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

-- Tabla de Partidos (con Temporada y equipos rivales)
CREATE TABLE Partidos (
    ID_Partido INT PRIMARY KEY AUTO_INCREMENT,
    Fecha DATE NOT NULL,
    Lugar VARCHAR(100) NOT NULL,
    Equipo_Local INT,
    Equipo_Visitante INT,
    Goles_Local INT NOT NULL,
    Goles_Visitante INT NOT NULL,
    Estatus ENUM('Programado', 'Finalizado', 'Cancelado') NOT NULL DEFAULT 'Programado',
    Tipo ENUM('Amistoso', 'Competitivo') NOT NULL DEFAULT 'Competitivo',
    ID_Competicion INT,
    ID_Temporada INT,
    FOREIGN KEY (Equipo_Local) REFERENCES Equipos(ID_Equipo),
    FOREIGN KEY (Equipo_Visitante) REFERENCES Equipos(ID_Equipo),
    FOREIGN KEY (ID_Competicion) REFERENCES Competiciones(ID_Competicion),
    FOREIGN KEY (ID_Temporada) REFERENCES Temporadas(ID_Temporada)
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
    ID_Temporada INT,
    Partidos_Jugados INT NOT NULL,
    Goles INT NOT NULL,
    Asistencias INT NOT NULL,
    Tarjetas_Rojas INT NOT NULL,
    Tarjetas_Amarillas INT NOT NULL,
    Minutos_Jugados INT NOT NULL DEFAULT 0,
    Goles_Penales INT NOT NULL DEFAULT 0,
    FOREIGN KEY (ID_Jugador) REFERENCES Jugadores(ID_Jugador),
    FOREIGN KEY (ID_Competicion) REFERENCES Competiciones(ID_Competicion),
    FOREIGN KEY (ID_Temporada) REFERENCES Temporadas(ID_Temporada)
);

-- Tabla de Estadísticas de Partidos
CREATE TABLE Estadisticas_Partidos (
    ID_Estadistica INT PRIMARY KEY AUTO_INCREMENT,
    ID_Partido INT,
    Posesion_Local DECIMAL(5, 2),
    Posesion_Visitante DECIMAL(5, 2),
    Tiros_Local INT,
    Tiros_Visitante INT,
    Corners_Local INT,
    Corners_Visitante INT,
    FOREIGN KEY (ID_Partido) REFERENCES Partidos(ID_Partido)
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

-- Tabla de Actividades
CREATE TABLE Actividades (
    ID_Actividad INT PRIMARY KEY AUTO_INCREMENT,
    ID_Usuario INT,
    Descripcion TEXT NOT NULL,
    Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID_Usuario)
);

-- Tabla de Entrenamientos (con ubicación)
CREATE TABLE Entrenamientos (
    ID_Entrenamiento INT PRIMARY KEY AUTO_INCREMENT,
    Fecha DATE NOT NULL,
    ID_Equipo INT,
    Ubicacion VARCHAR(100) NOT NULL,
    FOREIGN KEY (ID_Equipo) REFERENCES Equipos(ID_Equipo)
);

-- Tabla de Asistencia a Entrenamientos
CREATE TABLE Asistencia_Entrenamiento (
    ID_Asistencia INT PRIMARY KEY AUTO_INCREMENT,
    ID_Entrenamiento INT,
    ID_Jugador INT,
    Asistio BOOLEAN NOT NULL,
    FOREIGN KEY (ID_Entrenamiento) REFERENCES Entrenamientos(ID_Entrenamiento),
    FOREIGN KEY (ID_Jugador) REFERENCES Jugadores(ID_Jugador)
);

-- Tabla de Comentarios en Partidos
CREATE TABLE Comentarios (
    ID_Comentario INT PRIMARY KEY AUTO_INCREMENT,
    ID_Usuario INT,
    ID_Partido INT,
    Comentario TEXT NOT NULL,
    Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID_Usuario),
    FOREIGN KEY (ID_Partido) REFERENCES Partidos(ID_Partido)
);

-- Tabla de Comentarios en Entrenamientos
CREATE TABLE Comentarios_Entrenamiento (
    ID_Comentario INT PRIMARY KEY AUTO_INCREMENT,
    ID_Usuario INT,
    ID_Entrenamiento INT,
    Comentario TEXT NOT NULL,
    Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID_Usuario),
    FOREIGN KEY (ID_Entrenamiento) REFERENCES Entrenamientos(ID_Entrenamiento)
);
