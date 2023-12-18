-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2023 a las 05:36:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `negocio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(5) NOT NULL COMMENT 'El campo se llena con enteros',
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
(10000, 'Pan Dulce', 'Variedad de opciones dulces.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `rut_cliente` int(5) NOT NULL,
  `nombre_c` varchar(50) NOT NULL,
  `apellido_paterno_c` varchar(50) NOT NULL,
  `apellido_materno_c` varchar(50) NOT NULL,
  `telefono1_c` varchar(20) NOT NULL,
  `telefono2_c` varchar(20) NOT NULL,
  `calle_c` varchar(20) NOT NULL,
  `numero_calle_c` int(5) NOT NULL,
  `ciudad_c` text NOT NULL,
  `colonia_c` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`rut_cliente`, `nombre_c`, `apellido_paterno_c`, `apellido_materno_c`, `telefono1_c`, `telefono2_c`, `calle_c`, `numero_calle_c`, `ciudad_c`, `colonia_c`) VALUES
(1234, 'Esteban', 'De', 'Santiago', '4331054508', '4331054508', 'ffff', 786, 'Sombrerete', 'centrooooo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(5) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `precio_producto` decimal(8,0) NOT NULL,
  `stock_producto` int(8) NOT NULL,
  `id_categoria` int(5) NOT NULL,
  `rut_proveedor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `precio_producto`, `stock_producto`, `id_categoria`, `rut_proveedor`) VALUES
(10000, 'Rol de Chocolate ', 12, 30, 10000, 10000),
(10001, 'Donas Rellenas de Crema', 15, 50, 10000, 10001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_venta`
--

CREATE TABLE `producto_venta` (
  `id_detalle` int(5) NOT NULL,
  `cantidad` int(8) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `id_venta` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `rut_proveedor` int(5) NOT NULL,
  `nombre_p` text NOT NULL,
  `telefono1_p` varchar(20) NOT NULL,
  `telefono2_p` varchar(20) NOT NULL,
  `calle_p` varchar(20) NOT NULL,
  `numero_calle_p` varchar(5) NOT NULL,
  `ciudad_p` text NOT NULL,
  `colonia_p` text NOT NULL,
  `web_p` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`rut_proveedor`, `nombre_p`, `telefono1_p`, `telefono2_p`, `calle_p`, `numero_calle_p`, `ciudad_p`, `colonia_p`, `web_p`) VALUES
(10000, 'DoñaLupe', '4331001212', '4331909090', 'Emiliano Zapata', '21', 'Sombrerete', 'La blanca', 'www.pandulce.com'),
(10001, 'Pan Bueno', '55 1234 5678', '33 9876 5432', 'Avenida de las Flore', '142', 'Sombrerete', 'Colonia de las Flores ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(5) NOT NULL,
  `fecha_venta` date NOT NULL,
  `monto_final_venta` int(8) NOT NULL,
  `descuento_venta` int(8) NOT NULL,
  `rut_cliente` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`rut_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `rut_proveedor` (`rut_proveedor`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_producto` (`id_producto`,`id_venta`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`rut_proveedor`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `rut_cliente` (`rut_cliente`) USING BTREE;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`rut_proveedor`) REFERENCES `proveedor` (`rut_proveedor`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD CONSTRAINT `producto_venta_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `producto_venta_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`rut_cliente`) REFERENCES `cliente` (`rut_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
