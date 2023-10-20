-- Creación de la base de datos MiTiendaOnline
CREATE DATABASE MiTiendaOnline;
USE MiTiendaOnline;

-- Tabla Usuarios
CREATE TABLE Usuarios (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(100),
    password VARCHAR(255), -- Contraseña en texto plano (mala práctica)
    email VARCHAR(255),
    dirección VARCHAR(500),
    número_tarjeta VARCHAR(20) -- Número de tarjeta en texto plano (mala práctica)
);

-- Tabla Productos
CREATE TABLE Productos (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    precio FLOAT, -- Uso de FLOAT para precios (mala práctica)
    descripción TEXT
);

-- Tabla Compras
CREATE TABLE Compras (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    usuarioID INT,
    productoID INT,
    detalles_transacción TEXT -- Información de tarjeta y otros detalles en texto plano (mala práctica)
);
