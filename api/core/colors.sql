-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2021 a las 08:29:05
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `idcolor` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color` varchar(7) NOT NULL,
  `pantone` varchar(50) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`idcolor`, `name`, `color`, `pantone`, `year`) VALUES
(1, 'Deep Carmine Pink', '#EF2B2D', '1788 C', 2021),
(2, 'Vivid Yellow', '#F9E814', '395 C', 2021),
(3, 'Safety Orange', '#F96B07', '1505 C', 2021),
(4, 'Saddle Brown', '#843F0F', '725 C', 2021),
(5, 'Begonia', '#FC6675', '1777 C', 2021),
(6, 'Spanish Carmine', '#D30547', '1925 C', 2021),
(7, 'French Plum', '#87005B', '2425 C', 2021),
(8, 'Medium Violet-Red', '#CC00A0', '2395 C', 2021),
(9, 'Metallic Violet', '#56008C', 'Medium Purple C', 2021),
(10, 'Violet-Blue', '#3044B5', '2126 C', 2021),
(11, 'Royal Azure', '#0038A8', '293 C', 2021),
(12, 'True Blue', '#0072C6', '3005 C', 2021),
(13, 'Process Cyan', '#00BCE2', '3545 C', 2021),
(14, 'Islamic Green', '#009E0F', '2272 C', 2021),
(15, 'Spanish Green', '#008751', '7725 C', 2021),
(16, 'Philippine Gray', '#898E8C', '423 C', 2021),
(17, 'Pullman Brown', '#604C11', '2308 C', 2021),
(18, 'Rich Black', '#0A0C11', 'Black 6 C', 2021);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `idprofile` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`idprofile`, `name`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `profile` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `name`, `lastname`, `user`, `password`, `profile`, `token`) VALUES
(1, 'Yeshua', 'Bobadilla Segundo', 'admin', '#58gt3@', 1, NULL),
(2, 'Ingrid', 'Tejero Bernal', 'user01', 'itb25.', 2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`idprofile`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `profiles`
--
ALTER TABLE `profiles`
  MODIFY `idprofile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
