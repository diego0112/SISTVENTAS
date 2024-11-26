-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2024 a las 22:48:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_venta`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`importec`@`localhost` PROCEDURE `actualizar_categoria` (IN `p_id` INT(11), IN `p_nombre` VARCHAR(20), IN `p_detalle` VARCHAR(100))   BEGIN
    UPDATE categoria 
    SET nombre = p_nombre, 
        detalle = p_detalle
    WHERE id = p_id;
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `actualizar_compra` (IN `p_id` INT(11), IN `p_id_producto` INT(11), IN `p_cantidad` INT(5), IN `p_precio` DECIMAL(6,2), IN `p_fecha_compra` DATETIME, IN `p_id_trabajador` INT(11))   BEGIN
    UPDATE compras 
    SET id_producto = p_id_producto,
        cantidad = p_cantidad, 
        precio = p_precio, 
        fecha_compra = p_fecha_compra,
        id_trabajador = p_id_trabajador
    WHERE id = p_id;
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `actualizar_detalle_venta` (IN `p_id` INT(11), IN `p_id_venta` INT(11), IN `p_id_producto` INT(11), IN `p_cantidad` INT(5))   BEGIN
    UPDATE det_venta 
    SET id_venta = p_id_venta, 
        id_producto = p_id_producto, 
        cantidad = p_cantidad
    WHERE id = p_id;
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `actualizar_pago` (IN `p_id` INT(11), IN `p_id_venta` INT(11), IN `p_fecha` DATETIME, IN `p_monto` DECIMAL(6,2), IN `p_metodo_pago` VARCHAR(20), IN `p_estado` INT(1))   BEGIN
    UPDATE pagos 
    SET id_venta = p_id_venta, 
        fecha = p_fecha, 
        monto = p_monto, 
        metodo_pago = p_metodo_pago, 
        estado = p_estado
    WHERE id = p_id;
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `actualizar_persona` (IN `p_id` INT(11), IN `p_nro_identidad` VARCHAR(11), IN `p_razon_social` VARCHAR(123), IN `p_telefono` VARCHAR(13), IN `p_correo` VARCHAR(100), IN `p_departamento` VARCHAR(20), IN `p_provincia` VARCHAR(30), IN `p_distrito` VARCHAR(50), IN `p_codigo_postal` INT(5), IN `p_direccion` VARCHAR(100), IN `p_rol` VARCHAR(15), IN `p_password` VARCHAR(500), IN `p_estado` INT(1))   BEGIN
    UPDATE persona 
    SET nro_identidad = p_nro_identidad, 
        razon_social = p_razon_social, 
        telefono = p_telefono, 
        correo = p_correo, 
        departamento = p_departamento, 
        provincia = p_provincia, 
        distrito = p_distrito, 
        codigo_postal = p_codigo_postal, 
        direccion = p_direccion, 
        rol = p_rol, 
        password = p_password, 
        estado = p_estado
    WHERE id = p_id;
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `actualizar_producto` (IN `p_id` INT(11), IN `p_codigo` VARCHAR(20), IN `p_nombre` VARCHAR(30), IN `p_detalle` VARCHAR(100), IN `p_precio` DECIMAL(6,2), IN `p_id_categoria` INT(11), IN `p_img` VARCHAR(16), IN `p_id_proveedor` INT(11))   BEGIN
        UPDATE producto 
        SET codigo = p_codigo,
            nombre = p_nombre,
            detalle = p_detalle,
            precio = p_precio,
            id_categoria = p_id_categoria,
            img = p_img,
            id_proveedor = p_id_proveedor
        WHERE id = p_id;
   SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `actualizar_sesion` (IN `p_id` INT(11), IN `p_id_persona` INT(11), IN `p_fecha_hora_inicio` DATETIME, IN `p_fecha_hora_fin` DATETIME, IN `p_token` VARCHAR(30), IN `p_ip` VARCHAR(20))   BEGIN
    UPDATE sesiones 
    SET id_persona = p_id_persona, 
        fecha_hora_inicio = p_fecha_hora_inicio, 
        fecha_hora_fin = p_fecha_hora_fin, 
        token = p_token, 
        ip = p_ip
    WHERE id = p_id;
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `actualizar_venta` (IN `p_id` INT(11), IN `p_codigo_venta` VARCHAR(20), IN `p_fecha_hora` DATETIME, IN `p_id_cliente` INT(11), IN `p_id_vendedor` INT(11), IN `p_estado` INT(1))   BEGIN
    UPDATE venta 
    SET codigo_venta = p_codigo_venta, 
        fecha_hora = p_fecha_hora, 
        id_cliente = p_id_cliente, 
        id_vendedor = p_id_vendedor, 
        estado = p_estado
    WHERE id = p_id;
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_categoria_por_id` (IN `p_id` INT(11))   BEGIN
    SELECT * FROM categoria
    WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_compra_por_id` (IN `p_id` INT(11))   BEGIN
    SELECT * FROM compras
    WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_detalle_venta_por_id` (IN `p_id` INT(11))   BEGIN
    SELECT * FROM det_venta
    WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_pago_por_id` (IN `p_id` INT(11))   BEGIN
    SELECT * FROM pagos
    WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_persona_por_id` (IN `p_id` INT(11))   BEGIN
    SELECT * FROM persona
    WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_producto_por_id` (IN `p_id` INT(11))   BEGIN
    SELECT * FROM producto
    WHERE id= p_id;
    
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_sesion_por_id` (IN `p_id` INT(11))   BEGIN
    SELECT * FROM sesiones
    WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_todas_compras` ()   BEGIN
    SELECT * FROM compras;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_todas_personas` ()   BEGIN
    SELECT * FROM persona;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_todas_sesiones` ()   BEGIN
    SELECT * FROM sesiones;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_todas_ventas` ()   BEGIN
    SELECT * FROM venta;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_todos_categorias` ()   BEGIN
    SELECT * FROM categoria;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_todos_detalles_venta` ()   BEGIN
    SELECT * FROM det_venta;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_todos_pagos` ()   BEGIN
    SELECT * FROM pagos;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_todos_productos` ()   BEGIN
    SELECT * FROM producto;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `buscar_venta_por_id` (IN `p_id` INT(11))   BEGIN
    SELECT * FROM venta
    WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `eliminarproducto` (IN `p_id` INT(11))   BEGIN
  DELETE FROM producto WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `eliminar_categoria` (IN `p_id` INT(11))   BEGIN
    DELETE FROM categoria WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `eliminar_compra` (IN `p_id` INT(11))   BEGIN
    DELETE FROM compras WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `eliminar_detalle_venta` (IN `p_id` INT(11))   BEGIN
    DELETE FROM det_venta WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `eliminar_pago` (IN `p_id` INT(11))   BEGIN
    DELETE FROM pagos WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `eliminar_persona` (IN `p_id` INT(11))   BEGIN
    DELETE FROM persona WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `eliminar_sesion` (IN `p_id` INT(11))   BEGIN
    DELETE FROM sesiones WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `eliminar_venta` (IN `p_id` INT(11))   BEGIN
    DELETE FROM venta WHERE id = p_id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `insertar_categoria` (IN `p_nombre` VARCHAR(20), IN `p_detalle` VARCHAR(100))   BEGIN
    DECLARE existe_categoria INT;
    DECLARE id INT;
    SET existe_categoria = (SELECT COUNT(*) FROM categoria WHERE nombre = p_nombre);
    
    IF existe_categoria = 0 THEN
        INSERT INTO categoria (nombre, detalle) 
        VALUES (p_nombre, p_detalle);
        SET id = LAST_INSERT_ID();
    ELSE
        SET id = 0;
    END IF;
    
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `insertar_compra` (IN `p_id_producto` INT(11), IN `p_cantidad` INT(5), IN `p_precio` DECIMAL(6,2), IN `p_fecha_compra` DATETIME, IN `p_id_trabajador` INT(11))   BEGIN
    DECLARE id INT;
    INSERT INTO compras (id_producto, cantidad, precio, fecha_compra, id_trabajador) 
    VALUES (p_id_producto, p_cantidad, p_precio, p_fecha_compra, p_id_trabajador);
    
    SET id = LAST_INSERT_ID();
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `insertar_detalle_venta` (IN `p_id_venta` INT(11), IN `p_id_producto` INT(11), IN `p_cantidad` INT(5))   BEGIN
    DECLARE id INT;
    INSERT INTO det_venta (id_venta, id_producto, cantidad) 
    VALUES (p_id_venta, p_id_producto, p_cantidad);
    
    SET id = LAST_INSERT_ID();
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `insertar_pago` (IN `p_id_venta` INT(11), IN `p_fecha` DATETIME, IN `p_monto` DECIMAL(6,2), IN `p_metodo_pago` VARCHAR(20), IN `p_estado` INT(1))   BEGIN
    DECLARE id INT;
    INSERT INTO pagos (id_venta, fecha, monto, metodo_pago, estado) 
    VALUES (p_id_venta, p_fecha, p_monto, p_metodo_pago, p_estado);
    
    SET id = LAST_INSERT_ID();
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `insertar_persona` (IN `p_nro_identidad` VARCHAR(11), IN `p_razon_social` VARCHAR(123), IN `p_telefono` VARCHAR(13), IN `p_correo` VARCHAR(100), IN `p_departamento` VARCHAR(20), IN `p_provincia` VARCHAR(30), IN `p_distrito` VARCHAR(50), IN `p_codigo_postal` INT(5), IN `p_direccion` VARCHAR(100), IN `p_rol` VARCHAR(15), IN `p_password` VARCHAR(500))   BEGIN
    DECLARE id INT;
    INSERT INTO persona (nro_identidad, razon_social, telefono, correo, departamento, provincia, distrito, codigo_postal, direccion, rol, password) 
    VALUES (p_nro_identidad, p_razon_social, p_telefono, p_correo, p_departamento, p_provincia, p_distrito, p_codigo_postal, p_direccion, p_rol, p_password);
    
    SET id = LAST_INSERT_ID();
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `insertar_sesion` (IN `p_id_persona` INT(11), IN `p_fecha_hora_inicio` DATETIME, IN `p_fecha_hora_fin` DATETIME, IN `p_token` VARCHAR(30), IN `p_ip` VARCHAR(20))   BEGIN
    DECLARE id INT;
    INSERT INTO sesiones (id_persona, fecha_hora_inicio, fecha_hora_fin, token, ip) 
    VALUES (p_id_persona, p_fecha_hora_inicio, p_fecha_hora_fin, p_token, p_ip);
    
    SET id = LAST_INSERT_ID();
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `insertar_venta` (IN `p_codigo_venta` VARCHAR(20), IN `p_fecha_hora` DATETIME, IN `p_id_cliente` INT(11), IN `p_id_vendedor` INT(11), IN `p_estado` INT(1))   BEGIN
    DECLARE id INT;
    INSERT INTO venta (codigo_venta, fecha_hora, id_cliente, id_vendedor, estado) 
    VALUES (p_codigo_venta, p_fecha_hora, p_id_cliente, p_id_vendedor, p_estado);
    
    SET id = LAST_INSERT_ID();
    SELECT id;
END$$

CREATE DEFINER=`importec`@`localhost` PROCEDURE `insertProducto` (IN `p_codigo` VARCHAR(20), IN `p_nombre` VARCHAR(30), IN `p_detalle` VARCHAR(100), IN `p_precio` DECIMAL(6,2), IN `p_stock` INT(5), IN `p_id_categoria` INT(11), IN `p_img` VARCHAR(16), IN `p_id_proveedor` INT(11))   BEGIN 
DECLARE existe_producto INT;
DECLARE id INT;
set existe_producto = (SELECT COUNT(*) FROM producto WHERE codigo = p_codigo);
IF existe_producto = 0 THEN
	 INSERT INTO producto (codigo, nombre, detalle, precio, stock, id_categoria, img, id_proveedor) 
        VALUES (p_codigo, p_nombre, p_detalle, p_precio, p_stock, p_id_categoria, p_img, p_id_proveedor);
        SET id = LAST_INSERT_ID();
    ELSE
    SET id= 0;
END IF;
SELECT id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `detalle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `detalle`) VALUES
(1, 'polos', 'fdfxasxhabsc'),
(2, 'saS', 'SAS'),
(3, 'as', 'sas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `fecha_compra` datetime NOT NULL DEFAULT current_timestamp(),
  `id_trabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_producto`, `cantidad`, `precio`, `fecha_compra`, `id_trabajador`) VALUES
(4, 3, 2, 60.99, '0000-00-00 00:00:00', 3),
(5, 3, 12, 2024.00, '0000-00-00 00:00:00', 3),
(6, 3, 40, 2024.00, '0000-00-00 00:00:00', 3),
(7, 3, 12, 21.00, '2024-11-11 16:35:00', 3),
(8, 3, 12, 21.00, '2024-11-11 16:35:57', 3),
(9, 3, 232, 2024.00, '0000-00-00 00:00:00', 3),
(10, 3, 232, 323.00, '2024-11-19 00:00:00', 3),
(11, 3, 21, 212.00, '2024-11-22 00:00:00', 3),
(12, 3, 1, 1.00, '2024-11-15 00:00:00', 3),
(13, 3, 1, 1.00, '2024-11-15 00:00:00', 3),
(14, 3, 21, 32.00, '2024-11-13 00:00:00', 6),
(15, 3, 2, 312.00, '2024-11-21 00:00:00', 6),
(16, 3, 2, 312.00, '2024-11-21 00:00:00', 6),
(17, 3, 3, 3213.00, '2024-11-20 00:00:00', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_venta`
--

CREATE TABLE `det_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `monto` decimal(6,2) NOT NULL,
  `metodo_pago` varchar(20) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_venta`, `fecha`, `monto`, `metodo_pago`, `estado`) VALUES
(4, 1, '0000-00-00 00:00:00', 45.00, 'zsxcfgh', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nro_identidad` varchar(11) NOT NULL,
  `razon_social` varchar(123) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `departamento` varchar(20) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `password` varchar(500) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `fecha_reg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nro_identidad`, `razon_social`, `telefono`, `correo`, `departamento`, `provincia`, `distrito`, `codigo_postal`, `direccion`, `rol`, `password`, `estado`, `fecha_reg`) VALUES
(1, '71422955', 'hascansjic', '982120236', 'julianore79@gmail.com', 'ayacucho', 'huanta', 'luricocha', 6165661, 'pichiurara', 'proveedor', '123456', 1, '2024-09-19 12:18:28'),
(3, '71422955', 'julian', '982120236', 'julianore79@gmail.com', 'Ayacucho', 'huanta', 'luricocha', 986598, 'e4sdrtyu', 'trabajador', '12', 0, '2024-09-25 15:43:03'),
(4, '71422954', 'SSDFGHJ', '982120236', 'julianore79@gmail.com', 'Ayacucho', 'huanta', 'luricocha', 986598, 'e4sdrtyu', 'ADMIN', '12', 1, '2024-09-26 08:36:52'),
(5, '212', '212', '2121', '21', '12', '21', '12', 12, '21', 'Proveedor', '1212212', 1, '2024-11-11 18:09:31'),
(6, '121212', '2122', '112', '121', '21', '2212', '2122', 2121, '212', 'Trabajador', '212', 1, '2024-11-11 18:11:05'),
(7, '12', 'xxx', '112', '121', '21', '2212', '2122', 2121, '212', 'Administrador', 'ASD', 1, '2024-11-11 18:11:50'),
(8, '12', 'dadas', '234', 'dad', '213', '1231', '3131', 23123, '13123', 'Administrador', '312', 1, '2024-11-11 18:15:00'),
(9, '12', '212', '1', '221', '1212', '2', '21212', 21, '21212', 'Administrador', '12', 1, '2024-11-11 18:17:44'),
(10, '12', '212', '1', '221', '1212', '2', '21212', 21, '21212', 'Administrador', '12', 1, '2024-11-11 18:22:02'),
(11, '12', '212', '1', '221', '1212', '2', '21212', 21, '21212', 'Administrador', '12', 1, '2024-11-11 18:47:36'),
(12, '12', '212', '1', '221', '1212', '2', '21212', 21, '21212', 'Administrador', '12', 1, '2024-11-11 18:47:39'),
(13, '74', '4747', '471', '774', '7474', '7', '74', 74, '74', 'Trabajador', '7447', 1, '2024-11-11 19:04:23'),
(14, '1111', '11', '1', '1', '1', '1', '1', 1, '1', 'Administrador', '$2y$10$yG14ovTxSblFP78.lVByaOPpub7TR2wrXCDWwuCapBUccOrBcIJny', 1, '2024-11-18 09:07:56'),
(15, 'diego', 'diego', '12345678', 'diego', 'diego', 'diego', 'diego', 0, 'diego', 'Administrador', '$2y$10$rUbJ4FwvbjHZQxwP4By93usi31SbT2w1ZWkur2UUHeqvT/5Gmq9te', 1, '2024-11-18 09:34:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `stock` int(5) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `img` varchar(16) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `codigo`, `nombre`, `detalle`, `precio`, `stock`, `id_categoria`, `img`, `id_proveedor`) VALUES
(3, '123454', 'polo', 'polo rojo', 60.99, 100, 1, '2024/12/12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `fecha_hora_inicio` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_hora_fin` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(30) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id`, `id_persona`, `fecha_hora_inicio`, `fecha_hora_fin`, `token`, `ip`) VALUES
(1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ASDFGHJKLÑ', '12355');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `codigo_venta` varchar(20) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `codigo_venta`, `fecha_hora`, `id_cliente`, `id_vendedor`, `estado`) VALUES
(1, '4562', '0000-00-00 00:00:00', 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_trabajador` (`id_trabajador`);

--
-- Indices de la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `det_venta`
--
ALTER TABLE `det_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `persona` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD CONSTRAINT `det_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `det_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `persona` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `persona` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_vendedor`) REFERENCES `persona` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
