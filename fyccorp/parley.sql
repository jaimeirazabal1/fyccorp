-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2015 a las 06:46:06
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `parley`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE IF NOT EXISTS `profesion` (
`id` int(11) NOT NULL,
  `name_p` varchar(50) NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`id`, `name_p`, `visible`) VALUES
(1, 'Arquitecto', 1),
(2, 'Abogado', 1),
(3, 'Asistente', 1),
(4, 'Biólogo', 1),
(5, 'Bombero', 1),
(6, 'Comenciante', 1),
(7, 'Deportista', 1),
(8, 'Distribuidor', 1),
(9, 'Electricista', 1),
(10, 'Entrenador', 1),
(11, 'Estudiante', 1),
(12, 'Fotógrafo', 1),
(13, 'Heladero', 1),
(14, 'Herrador', 1),
(15, 'Ingeniero agrónomo', 1),
(16, 'Ingeniero en Informática', 1),
(17, 'Ingeniero de Sistemas', 0),
(18, 'Ingeniero Civil', 1),
(19, 'Ingeniero Industrial', 0),
(20, 'Masajista', 0),
(21, 'Mecánico', 0),
(22, 'Maestro/a', 0),
(23, 'Notario', 0),
(24, 'Oficial', 0),
(25, 'Panadero', 0),
(26, 'Pastelero', 0),
(27, 'Peluquero/a', 0),
(28, 'Pescadero', 0),
(29, 'Profesor', 0),
(30, 'Psicólogo', 0),
(31, 'Reparador', 0),
(32, 'Restaurador', 0),
(33, 'Administrador/a', 0),
(34, 'Secretario/a', 0),
(35, 'Subastador', 0),
(36, 'Publicista', 0),
(37, 'Comunicador/a Social', 0),
(38, 'Técnico', 0),
(39, 'Transportista', 0),
(40, 'Veterinario', 0),
(41, 'Escritor/a', 0),
(42, 'Periodista', 0),
(43, 'Diseñador/a', 0),
(44, 'Asesor/a', 0),
(45, 'Consultor/a', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `pseudonimo` varchar(20) DEFAULT NULL,
  `clave` varchar(500) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `perfil` varchar(100) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT 'No indicado',
  `telefono` varchar(70) DEFAULT 'No indicado',
  `celular` varchar(70) DEFAULT 'No indicado',
  `fecha_nacimiento` date DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `profesion_id` int(11) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT 'No indicado',
  `pregunta_seguridad` varchar(100) DEFAULT NULL,
  `respuesta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `cedula`, `pseudonimo`, `clave`, `fecha_registro`, `sexo`, `perfil`, `admin`, `status`, `correo`, `visible`, `pais`, `ciudad`, `telefono`, `celular`, `fecha_nacimiento`, `edad`, `profesion_id`, `descripcion`, `pregunta_seguridad`, `respuesta`) VALUES
(1, 'Steffany', 'Jaramillo', '20820674', 'steffy1990', '313437c00302021eda7b4197983f4011', '0000-00-00', 1, 'upload/2014_11_23_04.07.25diseno_grafico.png.png', 1, 1, 'steffanyt@gmail.comdsss', 1, 'Venezuela', 'Guarenas', '021299900', '04147183219', '1990-10-11', 24, 41, 'Design y Desarrolladora web', 'sw', 'sw'),
(2, 'Jaime', 'Irazabal', '16029993', 'jaime', '313437c00302021eda7b4197983f4011', '2014-12-15', 0, 'upload/2014_12_15_04.19.14foto2.jpg.jpg', 0, 1, 'jaime@h.a', 1, 'España', 'Madrid', '02120001100', '0421002200', '1995-01-07', 19, 7, 'x', 'nose', 'nose'),
(3, 'nayho', 'Jaramillo', '000', 'nayho', '81dc9bdb52d04dc20036dbd8313ed055', '2015-02-12', 1, 'upload/2015_02_12_12.47.1440458784.jpg.jpg', 0, 0, 'steffanytj@gmail.comm', 1, 'Venezuela', 'Guarenas', '000', '000', '1996-02-10', 19, 41, 'No indicado', 'hola', 'hola');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesion`
--
ALTER TABLE `profesion`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `profesion`
--
ALTER TABLE `profesion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
