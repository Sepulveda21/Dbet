-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2020 a las 05:06:40
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbet_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(9) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `caja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `clave`, `caja`) VALUES
(1, 'admin1', 'admin1', 'caja1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id` int(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `balance` decimal(9,0) NOT NULL,
  `administrador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `nombre`, `balance`, `administrador`) VALUES
(1, 'caja1', '933543', 'admin1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE `depositos` (
  `id` int(9) NOT NULL,
  `fecha_creacion` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `monto` decimal(9,0) NOT NULL,
  `metodo` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `depositos`
--

INSERT INTO `depositos` (`id`, `fecha_creacion`, `monto`, `metodo`, `estado`, `usuario`) VALUES
(29, '2020-09-21 00:42:46.256009', '100', 'Mercado pago', 'APROBADO', 'cmasterdaniel95'),
(30, '2020-09-21 00:57:53.992529', '50', 'Striper', 'APROBADO', 'cuenta1'),
(31, '2020-09-21 01:29:13.034377', '10', 'Mercado pago', 'APROBADO', 'jeancesar1983'),
(32, '2020-09-21 01:44:50.156437', '10000', 'Airtm', 'APROBADO', 'cmasterdaniel95'),
(33, '2020-09-21 02:45:59.443423', '100', 'Coinbase', 'APROBADO', 'Cio ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `players`
--

CREATE TABLE `players` (
  `id` int(9) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `players`
--

INSERT INTO `players` (`id`, `usuario`, `clave`, `balance`, `timestamp`) VALUES
(1, 'administrador', '2', '0', '2020-09-22 23:35:23'),
(2, 'jose', '1', '0', '2020-09-22 23:37:30'),
(3, 'daniel', '2', '0', '2020-09-22 23:48:33'),
(4, 'JD', '2', '0', '2020-09-23 02:34:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `push`
--

CREATE TABLE `push` (
  `id_notificacion` int(11) NOT NULL,
  `invitado` varchar(40) NOT NULL,
  `invitacion` varchar(40) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `visto` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `push`
--

INSERT INTO `push` (`id_notificacion`, `invitado`, `invitacion`, `estado`, `visto`) VALUES
(3, 'daniel', 'administrador', 'activo', 0),
(5, 'JD', 'jose', 'activo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiros`
--

CREATE TABLE `retiros` (
  `id` int(9) NOT NULL,
  `fecha_creacion` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `monto` decimal(9,0) NOT NULL,
  `metodo` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `wallet` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `retiros`
--

INSERT INTO `retiros` (`id`, `fecha_creacion`, `monto`, `metodo`, `estado`, `wallet`, `usuario`) VALUES
(13, '2020-09-21 01:01:50.036967', '9', 'Stripe', 'APROBADO', 'p0012554000', 'cuenta1'),
(14, '2020-09-21 02:51:26.009479', '40', 'Coinbase', 'APROBADO', '33q333', 'Cio ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `push`
--
ALTER TABLE `push`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- Indices de la tabla `retiros`
--
ALTER TABLE `retiros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `players`
--
ALTER TABLE `players`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `push`
--
ALTER TABLE `push`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `retiros`
--
ALTER TABLE `retiros`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
