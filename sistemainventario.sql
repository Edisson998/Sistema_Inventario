-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2021 a las 07:47:38
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
(1, 'Papeleria', 'Articulos para realizar tareas, manualidades caseras', 'A', '', '2021-07-26 18:35:35'),
(2, 'Consumo Masivo', 'Articulos de uso diario en el hogar, snacks,...etc', 'A', NULL, '2021-07-26 18:36:29'),
(3, 'Vestimenta', 'Articulos de vestir para hombre y mujer', 'A', NULL, '2021-07-26 18:37:03'),
(4, 'Electrodomésticos', 'Articulos para el hogar importados desde japon', 'A', NULL, '2021-07-26 18:37:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `CLI_ID` int(11) NOT NULL,
  `CLI_DNI` int(11) DEFAULT NULL,
  `CLI_TIPO_DNI` char(1) DEFAULT NULL,
  `CLI_NOMBRES` varchar(100) DEFAULT NULL,
  `CLI_PAPELLIDO` varchar(100) DEFAULT NULL,
  `CLI_SAPELLIDO` varchar(100) DEFAULT NULL,
  `CLI_GENERO` char(1) DEFAULT NULL,
  `CLI_FECHA_NACIMIENTO` date DEFAULT NULL,
  `CLI_TELEFONO` decimal(10,0) DEFAULT NULL,
  `CLI_CELULAR` varchar(12) DEFAULT NULL,
  `CLI_DIRECCION` varchar(500) DEFAULT NULL,
  `CLI_CORREO` varchar(200) DEFAULT NULL,
  `CLI_ESTADO` char(1) DEFAULT NULL,
  `CLI_CREGISTRO` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedido_cabecera`
--

CREATE TABLE `tbl_pedido_cabecera` (
  `PED_ID` int(11) NOT NULL,
  `CLI_ID` int(11) DEFAULT NULL,
  `PED_FECHA` datetime DEFAULT NULL,
  `PED_NUMERO` int(11) DEFAULT NULL,
  `PED_DIRECCION` varchar(200) DEFAULT NULL,
  `PED_TELEFONO` varchar(11) DEFAULT NULL,
  `PED_DNI` varchar(20) DEFAULT NULL,
  `PED_TOTAL` decimal(8,2) DEFAULT NULL,
  `PED_SUBTOTAL` decimal(8,2) DEFAULT NULL,
  `PED_ESTADO_ENTREGA` varchar(15) DEFAULT NULL,
  `PED_ESTADO` char(1) DEFAULT NULL,
  `PED_CREGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedido_detalle`
--

CREATE TABLE `tbl_pedido_detalle` (
  `DEP_CODIGO` int(11) NOT NULL,
  `PED_ID` int(11) DEFAULT NULL,
  `PRO_ID` int(11) DEFAULT NULL,
  `DEP_TIPO_PEDIDO` varchar(100) DEFAULT NULL,
  `DEP_DESCRIPCION` varchar(100) DEFAULT NULL,
  `DEP_CANTIDAD` int(11) DEFAULT NULL,
  `DEP_PRECIO_UNITARIO` decimal(8,2) DEFAULT NULL,
  `DEP_PRECIO_TOTAL` decimal(8,2) DEFAULT NULL,
  `DEP_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `PRO_ID` int(11) NOT NULL,
  `PRV_ID` int(11) DEFAULT NULL,
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

INSERT INTO `tbl_producto` (`PRO_ID`, `PRV_ID`, `CATP_ID`, `PRO_CODIGO`, `PRO_NOMBRE`, `PRO_DESCRIPCION`, `PRO_PRECIOCOMPRA`, `PRO_PRECIO_VENTA`, `PRO_IVA`, `PRO_ESTADO`, `PRO_STOCK_MAX`, `PRO_STOCK_MIN`, `PRO_CREGISTRO`) VALUES
(1, NULL, 1, 'P001', 'Cuaderno Pelikano', '100 hojas cuadriculadas', '0.99', '1.30', '0.31', 'A', 5, 5, '2021-07-26 18:40:52'),
(2, NULL, 4, 'E001', 'Lavadora Indux', 'Lavadora con 2 filtros de desague, filtradores de pelusa y superficies para cloro', '330.00', '660.00', '330.00', 'A', 2, 5, '2021-07-28 22:46:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedores`
--

CREATE TABLE `tbl_proveedores` (
  `PRV_ID` int(11) NOT NULL,
  `PRV_RAZON_SOCIAL` varchar(200) DEFAULT NULL,
  `PRV_PNOMBRE` varchar(100) DEFAULT NULL,
  `PRV_SNOMBRE` varchar(100) DEFAULT NULL,
  `PRV_PAPELLIDO` varchar(100) DEFAULT NULL,
  `PRV_SAPELLIDO` varchar(100) DEFAULT NULL,
  `PRV_DNI` varchar(15) DEFAULT NULL,
  `PRV_TIPO_DNI` char(2) DEFAULT NULL,
  `PRV_CORREO` varchar(500) DEFAULT NULL,
  `PRV_DIRECCION` varchar(500) DEFAULT NULL,
  `PRV_ESTADO` char(1) DEFAULT NULL,
  `PRV_CREGISTRO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`CATP_ID`);

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`CLI_ID`);

--
-- Indices de la tabla `tbl_pedido_cabecera`
--
ALTER TABLE `tbl_pedido_cabecera`
  ADD PRIMARY KEY (`PED_ID`),
  ADD KEY `FK_RELATIONSHIP_11` (`CLI_ID`);

--
-- Indices de la tabla `tbl_pedido_detalle`
--
ALTER TABLE `tbl_pedido_detalle`
  ADD PRIMARY KEY (`DEP_CODIGO`),
  ADD KEY `FK_RELATIONSHIP_7` (`PED_ID`),
  ADD KEY `FK_RELATIONSHIP_8` (`PRO_ID`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`PRO_ID`),
  ADD KEY `FK_RELATIONSHIP_13` (`PRV_ID`),
  ADD KEY `FK_RELATIONSHIP_5` (`CATP_ID`);

--
-- Indices de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  ADD PRIMARY KEY (`PRV_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `CATP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `CLI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_pedido_cabecera`
--
ALTER TABLE `tbl_pedido_cabecera`
  MODIFY `PED_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_pedido_detalle`
--
ALTER TABLE `tbl_pedido_detalle`
  MODIFY `DEP_CODIGO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  MODIFY `PRV_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_pedido_cabecera`
--
ALTER TABLE `tbl_pedido_cabecera`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`CLI_ID`) REFERENCES `tbl_cliente` (`CLI_ID`);

--
-- Filtros para la tabla `tbl_pedido_detalle`
--
ALTER TABLE `tbl_pedido_detalle`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`PED_ID`) REFERENCES `tbl_pedido_cabecera` (`PED_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`PRO_ID`) REFERENCES `tbl_producto` (`PRO_ID`);

--
-- Filtros para la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`PRV_ID`) REFERENCES `tbl_proveedores` (`PRV_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`CATP_ID`) REFERENCES `tbl_categoria` (`CATP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
