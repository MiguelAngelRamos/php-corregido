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

INSERT INTO Productos (nombre, precio, descripción) VALUES
('Producto C', 10.05, 'Descripción C'),
('Producto D', 20.03, 'Descripción D'),
('Producto E', 30.07, 'Descripción E'),
('Producto F', 40.02, 'Descripción F'),
('Producto G', 50.06, 'Descripción G'),
('Producto H', 60.09, 'Descripción H'),
('Producto I', 70.04, 'Descripción I'),
('Producto J', 80.01, 'Descripción J'),
('Producto K', 90.08, 'Descripción K'),
('Producto L', 100.05, 'Descripción L');


INSERT INTO Usuarios (username, contraseña, fecha_registro) VALUES
('alice123', 'password123', '2023-10-20'),
('bob456', '123456789', '2023-09-15'),
('carol789', 'qwertyuiop', '2023-08-10');

INSERT INTO Ventas (nombre_usuario, nombre_producto, fecha_venta) VALUES
('alice123', 'Televisor 4K 55"', '20 Oct 2023'),
('alice123', 'Laptop Gamer Pro', '20 Oct 2023'),
('bob456', 'Refrigerador Inteligente', '15 Sept 2023'),
('carol789', 'Smartphone Premium', '10 Aug 2023');
