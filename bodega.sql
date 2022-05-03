-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2022 a las 22:32:29
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bodega`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` varchar(250) NOT NULL,
  `id_venta` varchar(250) NOT NULL,
  `id_producto` varchar(250) NOT NULL,
  `precio_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle_venta`, `id_venta`, `id_producto`, `precio_venta`) VALUES
('', '12893427754', '7801505001737', 2990),
('', '12893427754', '7801505001737', 2990),
('', '12893427754', '', 0),
('', '12893427754', '7801620005160', 1500),
('', '964072363419', '7801505001737', 2990),
('', '964072363419', '', 0),
('', '294593115064', '1234', 30000),
('', '294593115064', '123456', 45000),
('', '218092541626', '1234', 30000),
('', '218092541626', '123456', 45000),
('', '370957999543', '123456', 45000),
('', '370957999543', '1234', 30000),
('', '19995712208', '1234', 30000),
('', '19995712208', '1234', 30000),
('', '19995712208', '1234', 30000),
('', '906849447689', '1234', 30000),
('', '906849447689', '', 0),
('', '906849447689', '', 0),
('', '906849447689', '1234', 30000),
('', '881744379026', '1234', 30000),
('', '881744379026', '', 0),
('', '881744379026', '', 0),
('', '881744379026', '', 0),
('', '881744379026', '1234', 30000),
('', '559295339136', '1234', 30000),
('', '559295339136', '123456', 45000),
('', '986091196401', '1234', 30000),
('', '986091196401', '1234', 30000),
('', '986091196401', '1234', 30000),
('', '986091196401', '1234', 30000),
('', '986091196401', '1234', 30000),
('', '986091196401', '1234', 30000),
('', '986091196401', '1234', 30000),
('', '243287373408', '1234', 30000),
('', '243287373408', '1234', 30000),
('', '297170993932', '1234', 30000),
('', '883186649550', '1234', 30000),
('', '956990065315', '1234', 30000),
('', '874991977976', '1234', 30000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` varchar(250) NOT NULL,
  `nom_producto` varchar(250) NOT NULL,
  `cant_producto` int(11) NOT NULL,
  `precio_compra` int(15) NOT NULL,
  `precio_venta` int(15) NOT NULL,
  `comen_producto` varchar(250) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nom_producto`, `cant_producto`, `precio_compra`, `precio_venta`, `comen_producto`, `estado`) VALUES
('1234', 'Pantalla', 8, 15000, 30000, 'Pantalla', 1),
('123456', 'Bateria Iphone 11 Pro MAX', 20, 15000, 45000, 'Bateria Alternativa AAA', 1),
('7801505001737', 'Endulzante', 50, 1500, 2990, 'Endulzante Iansa', 1),
('7801620005160', 'Gatorade Azul', 50, 800, 1500, 'Liquido Azul', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id_tipo_pago` int(2) NOT NULL,
  `detalle_pago` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`id_tipo_pago`, `detalle_pago`) VALUES
(1, 'Debito'),
(2, 'Credito'),
(3, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`) VALUES
('tomas', '2bc6038c3dfca09b2da23c8b6da8ba884dc2dcc2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` varchar(250) NOT NULL,
  `fecha_venta` date NOT NULL,
  `id_tipo_pago` int(2) NOT NULL,
  `total_venta` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha_venta`, `id_tipo_pago`, `total_venta`) VALUES
('227329514960', '2022-05-03', 1, 0),
('883186649550', '2022-05-03', 1, 30000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id_tipo_pago`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_tipo_pago` (`id_tipo_pago`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_tipo_pago`) REFERENCES `tipo_pago` (`id_tipo_pago`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
