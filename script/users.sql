-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-06-2021 a las 17:29:37
-- Versión del servidor: 10.5.8-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fenusas_formuser`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `userSap` varchar(50) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `ext` int(10) NOT NULL,
  `sede_id` int(12) NOT NULL,
  `charge_id` int(12) NOT NULL,
  `rol_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `userSap`, `user`, `password`, `ext`, `sede_id`, `charge_id`, `rol_id`) VALUES
(1, 'Juan Manuel Marcelo Angarita', 'pas.sis', 'sistemas', 'Reinoso01', 1075, 1, 12, 1),
(9, 'Jairo Parra ', '', '', '', 1070, 1, 8, 2),
(10, 'Yeny Roncancio ', 'jefe.con2', '', '', 1050, 1, 17, 2),
(11, 'Jasson Rodriguez', 'cor.com', '', '', 1053, 1, 2, 2),
(12, 'Angela Amaya', 'asi.com4', '', '', 1052, 1, 6, 2),
(13, 'Mónica Reyes Lopez', 'asi.tes3', '', '', 1031, 1, 11, 2),
(14, 'Diana Marcelo Gualdrón Ardila ', 'asi.car2', '', '', 1073, 1, 3, 1),
(15, 'Beiba Moreno', 'asis.car4', '', '', 1072, 1, 3, 2),
(16, 'William Cuervo', 'super.dis', '', '', 0, 1, 18, 2),
(17, 'William Andrés Sanchez', 'asi.tes2', '', '', 1033, 1, 4, 2),
(18, 'José Guzmán', 'Remoto', '', '', 1080, 1, 11, 2),
(19, 'Yenny Paola Urrego', 'cor.tes1', '', '', 1030, 1, 1, 2),
(20, 'William Fernando Beltrán', 'ase.mos1', '', '', 1010, 1, 7, 2),
(21, 'Yamit Arbey Piza Raba', 'asi.log1', '', '', 1040, 1, 10, 2),
(22, 'Carlos Alberto García', 'ase.mos3', '', '', 1011, 1, 5, 2),
(23, 'Wilmer Acevedo', 'ase.mos2', '', '', 1012, 1, 5, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charge_id` (`charge_id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `sede_id` (`sede_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`charge_id`) REFERENCES `charge` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
