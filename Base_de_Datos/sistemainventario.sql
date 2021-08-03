-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2021 a las 07:04:17
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemainventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `CATP_ID` int(11) NOT NULL,
  `CATP_NOMBRE` varchar(100) DEFAULT NULL,
  `CATP_DESCRIPCION` varchar(100) DEFAULT NULL,
  `CATP_ESTADO` char(1) DEFAULT NULL,
  `CATP_LOG` varchar(100) DEFAULT NULL,
  `CATP_CREGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`CATP_ID`, `CATP_NOMBRE`, `CATP_DESCRIPCION`, `CATP_ESTADO`, `CATP_LOG`, `CATP_CREGISTRO`) VALUES
(1, 'Papelería', 'Articulos escolares....', 'A', NULL, '2021-08-02 21:13:24'),
(2, 'Electrodomésticos', 'Articulos para el hogar', 'A', NULL, '2021-08-02 21:13:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedido_detalle`
--

CREATE TABLE `tbl_pedido_detalle` (
  `DEP_CODIGO` int(11) NOT NULL,
  `PRO_ID` int(11) DEFAULT NULL,
  `DEP_TIPO_PEDIDO` varchar(100) DEFAULT NULL,
  `DEP_DESCRIPCION` varchar(100) DEFAULT NULL,
  `DEP_CANTIDAD` int(11) DEFAULT NULL,
  `DEP_PRECIO_UNITARIO` decimal(8,2) DEFAULT NULL,
  `DEP_PRECIO_TOTAL` decimal(8,2) DEFAULT NULL,
  `DEP_FECHA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_pedido_detalle`
--

INSERT INTO `tbl_pedido_detalle` (`DEP_CODIGO`, `PRO_ID`, `DEP_TIPO_PEDIDO`, `DEP_DESCRIPCION`, `DEP_CANTIDAD`, `DEP_PRECIO_UNITARIO`, `DEP_PRECIO_TOTAL`, `DEP_FECHA`) VALUES
(1, 1, NULL, NULL, 45, '1.31', '58.95', '2021-08-03 04:00:00'),
(2, 3, NULL, NULL, 20, '1150.25', '23005.00', '2021-08-03 06:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `PRO_ID` int(11) NOT NULL,
  `CATP_ID` int(11) DEFAULT NULL,
  `PRO_CODIGO` varchar(50) DEFAULT NULL,
  `PRO_NOMBRE` varchar(100) DEFAULT NULL,
  `PRO_DESCRIPCION` varchar(100) DEFAULT NULL,
  `PRO_PRECIOCOMPRA` decimal(8,2) DEFAULT NULL,
  `PRO_PRECIO_VENTA` decimal(8,2) DEFAULT NULL,
  `PRO_IVA` decimal(8,2) DEFAULT NULL,
  `PRO_ESTADO` char(1) DEFAULT NULL,
  `PRO_STOCK_MAX` int(11) DEFAULT NULL,
  `PRO_STOCK_MIN` int(11) DEFAULT NULL,
  `PRO_CREGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`PRO_ID`, `CATP_ID`, `PRO_CODIGO`, `PRO_NOMBRE`, `PRO_DESCRIPCION`, `PRO_PRECIOCOMPRA`, `PRO_PRECIO_VENTA`, `PRO_IVA`, `PRO_ESTADO`, `PRO_STOCK_MAX`, `PRO_STOCK_MIN`, `PRO_CREGISTRO`) VALUES
(1, 1, 'P001', 'Cuaderno 100 hojas              ', 'Cuaderno a cuadros de 100 hojas', '0.99', '1.31', '0.00', 'A', 15, 5, '2021-08-02 21:15:49'),
(2, 1, 'P002', 'Tijera industrial', 'Tijera para cualquier tipo de superficie', '2.50', '3.25', '0.00', 'A', 15, 5, '2021-08-02 21:16:36'),
(3, 2, 'E001', 'Refrigeradora', 'Refrigeradora de 2 puertas', '550.65', '1150.25', '138.03', 'A', 5, 5, '2021-08-02 21:17:58'),
(4, 2, 'E002', 'Lavadora', 'Lavadora con 2 filtrs de agua', '430.50', '1060.99', '127.32', 'A', 20, 5, '2021-08-02 21:20:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`CATP_ID`);

--
-- Indices de la tabla `tbl_pedido_detalle`
--
ALTER TABLE `tbl_pedido_detalle`
  ADD PRIMARY KEY (`DEP_CODIGO`),
  ADD KEY `FK_RELATIONSHIP_8` (`PRO_ID`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`PRO_ID`),
  ADD KEY `FK_RELATIONSHIP_5` (`CATP_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `CATP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_pedido_detalle`
--
ALTER TABLE `tbl_pedido_detalle`
  MODIFY `DEP_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_pedido_detalle`
--
ALTER TABLE `tbl_pedido_detalle`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`PRO_ID`) REFERENCES `tbl_producto` (`PRO_ID`);

--
-- Filtros para la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`CATP_ID`) REFERENCES `tbl_categoria` (`CATP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
