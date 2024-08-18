-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-08-2024 a las 16:34:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sistema_visitas_medicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `especialidad_id` int(11) NOT NULL,
  `subespecialidad_id` int(11) NOT NULL,
  `dir_consultorio` varchar(200) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `nombres`, `apellidos`, `especialidad_id`, `subespecialidad_id`, `dir_consultorio`, `telefono`, `email`, `fecha_nacimiento`) VALUES
(44, 'Carlos', 'Pérez', 3, 5, 'Calle 123, Consultorio 1', '123456789', 'carlos.perez@hospital.com', '1985-08-06'),
(45, 'Laura', 'Gómez', 6, 8, 'Avenida 45, Consultorio 3', '987654321', 'laura.gomez@medicos.com', '1975-10-22'),
(46, 'Juan', 'Martínez', 1, 2, 'Calle 987, Consultorio 5', '123456', 'juan.martinez@medicos.com', '1990-03-18'),
(47, 'Ana', 'López', 6, 8, 'Calle 456, Consultorio 7', '555666777', 'prueba3@email.com', '1985-12-19'),
(49, 'Voluptates omnis ut ', 'Sed enim ratione occ', 3, 5, 'Veritatis assumenda ', '75', 'tygyjavux@mailinator.com', '1991-11-08'),
(50, 'Dolores qui consequa', 'Quisquam magnam face', 9, 13, 'Voluptatem accusamu', '26', 'limagevuko@mailinator.com', '2015-02-25'),
(51, 'In dolor in voluptas', 'Veniam nulla sed qu', 5, 7, 'Aliquid debitis mole', '51', 'sazonoq@mailinator.com', '2001-07-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitador`
--

CREATE TABLE `visitador` (
  `id_visitador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `especialidad_id` int(11) NOT NULL,
  `subespecialidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `visitador`
--

INSERT INTO `visitador` (`id_visitador`, `nombre`, `apellido`, `telefono`, `correo`, `especialidad_id`, `subespecialidad_id`) VALUES
(7, 'prueba', 'prueba apellido', '123456789', 'email', 8, 10),
(8, 'prueba 2', 'prueba 2 cambio', '68627565', 'prueba@email.com', 7, 9),
(9, 'prueba 3', 'prueba 3 cambio', '9879541', 'Libero nostrum ipsam@email.com', 5, 7),
(12, 'editado', 'apellido editado', '76', 'Adipisci repellendus', 7, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitador`
--
ALTER TABLE `visitador`
  ADD PRIMARY KEY (`id_visitador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `visitador`
--
ALTER TABLE `visitador`
  MODIFY `id_visitador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
