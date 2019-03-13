-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2019 a las 00:19:54
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sercam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf16_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`) VALUES
(1, 'CERVEZAS NACIONAL'),
(4, 'HELADO'),
(5, 'whisky');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledeventas`
--

CREATE TABLE `detalledeventas` (
  `iddetalledeventas` int(10) UNSIGNED NOT NULL,
  `idproducto` int(10) UNSIGNED NOT NULL,
  `idventas` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED DEFAULT NULL,
  `preciodeventas` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `detalledeventas`
--

INSERT INTO `detalledeventas` (`iddetalledeventas`, `idproducto`, `idventas`, `cantidad`, `preciodeventas`) VALUES
(3, 3, 1, 9, '12.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `iddetalleingreso` int(10) UNSIGNED NOT NULL,
  `idproducto` int(10) UNSIGNED DEFAULT NULL,
  `idingreso` int(10) UNSIGNED DEFAULT NULL,
  `cantidad` int(10) UNSIGNED DEFAULT NULL,
  `precio_compra` decimal(11,2) DEFAULT NULL,
  `precio_venta` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`iddetalleingreso`, `idproducto`, `idingreso`, `cantidad`, `precio_compra`, `precio_venta`) VALUES
(8, 2, 1, 12, '212.00', '323.00'),
(9, 3, 1, 10, '50000.00', '75000.00'),
(10, 2, 1, 3, '3.00', '43.00'),
(11, 1, 1, 10, '1500.00', '2000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `idingreso` int(10) UNSIGNED NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `tipo_comprobante` varchar(200) COLLATE utf16_spanish2_ci NOT NULL,
  `num_comprobante` varchar(200) COLLATE utf16_spanish2_ci NOT NULL,
  `fecha_ingreso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`idingreso`, `idproveedor`, `tipo_comprobante`, `num_comprobante`, `fecha_ingreso`) VALUES
(32, 2, 'Boleta', '1', '2019-02-18 17:34:28'),
(33, 3, 'Factura', '1234567', '2019-02-18 18:10:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(10) UNSIGNED NOT NULL,
  `tipodepersona` varchar(20) COLLATE utf16_spanish2_ci NOT NULL,
  `cedula` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(20) COLLATE utf16_spanish2_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf16_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf16_spanish2_ci NOT NULL,
  `direccion` varchar(20) COLLATE utf16_spanish2_ci NOT NULL,
  `gmail` varchar(20) COLLATE utf16_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `tipodepersona`, `cedula`, `nombre`, `apellido`, `telefono`, `direccion`, `gmail`) VALUES
(1, 'PROVEEDOR', 2345678, 'JESUS', 'ALBERTO', '310876576', 'CALLE 13 CARRERA 23 ', 'SED@gmail.com'),
(3, 'CLIENTE', 66, '666', '6', '6', '6', '6@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(10) UNSIGNED NOT NULL,
  `idcategoria` int(10) UNSIGNED NOT NULL,
  `codigo` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(20) COLLATE utf16_spanish2_ci NOT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `idcategoria`, `codigo`, `nombre`, `stock`) VALUES
(1, 4, 11111, 'AGUILA NEGRA 330 Ml', 240),
(2, 1, 6789, 'ZONA', 20),
(3, 5, 66757, 'OLD PARD 500 ML', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `tipousuario` varchar(20) COLLATE utf16_spanish2_ci DEFAULT NULL,
  `cedula` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(20) COLLATE utf16_spanish2_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf16_spanish2_ci NOT NULL,
  `gmail` varchar(20) COLLATE utf16_spanish2_ci NOT NULL,
  `contracena` varchar(20) COLLATE utf16_spanish2_ci NOT NULL,
  `confirmar` varchar(20) COLLATE utf16_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `tipousuario`, `cedula`, `nombre`, `apellido`, `gmail`, `contracena`, `confirmar`) VALUES
(1, 'USUARIO', 1102232678, 'MARIO ', 'MUÑOZ RIVERAm', 'oiram.12@hotmail.com', 'mario', 'mariojnij');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(10) UNSIGNED NOT NULL,
  `idcliente` int(11) NOT NULL,
  `tipo_comprobante` varchar(200) COLLATE utf16_spanish2_ci NOT NULL,
  `num_comprobante` varchar(200) COLLATE utf16_spanish2_ci NOT NULL,
  `fecha_hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idcliente`, `tipo_comprobante`, `num_comprobante`, `fecha_hora`) VALUES
(4, 3, 'Factura', '8', '2019-02-18 18:11:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `detalledeventas`
--
ALTER TABLE `detalledeventas`
  ADD PRIMARY KEY (`iddetalledeventas`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`iddetalleingreso`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`idingreso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalledeventas`
--
ALTER TABLE `detalledeventas`
  MODIFY `iddetalledeventas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `iddetalleingreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
