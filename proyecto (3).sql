-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-06-2015 a las 15:18:25
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `duracion` int(11) DEFAULT NULL,
  `comienzo` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `notas` varchar(2000) DEFAULT NULL,
  `avance` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `proyecto_id`, `nombre`, `duracion`, `comienzo`, `fin`, `estado`, `notas`, `avance`) VALUES
(4, 1, 'Recopilación de Información', NULL, '2015-06-01', '2015-07-16', '1', NULL, NULL),
(5, 1, 'Análisis y Organización', NULL, '2015-06-02', '2015-06-29', '1', NULL, NULL),
(6, 1, 'Charlas Informativas', NULL, '2015-08-01', '2015-08-11', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Artículos de Oficina', 'Oficina y Papeleria'),
(2, 'Mobiliario', 'Escritorios, sillas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(255) DEFAULT 'No indicado',
  `correo` varchar(50) DEFAULT NULL,
  `telefonos` varchar(50) DEFAULT '0000',
  `contacto` varchar(255) DEFAULT 'No indicado',
  `descripcion` varchar(255) DEFAULT 'No indicado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `direccion`, `correo`, `telefonos`, `contacto`, `descripcion`) VALUES
(1, 'SteffDesign', 'Los Naranjos\r\nzona 3 casa a-1', 'steffanytj@gmail.com', '04127183219, 04241778844', 'Steffany Terán, gerente general de automatización', 'Empresa de diseño gráfico'),
(2, 'Derrick Jose Martinez', 'No indicado', 'derrickjose_1@gmail.com', '04148921109', 'No indicado', 'No indicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `telefono` varchar(50) DEFAULT 'No indicado',
  `correo` varchar(50) NOT NULL,
  `tipo` int(1) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT 'No indicado',
  `fecha_ingreso` date NOT NULL,
  `fecha_egreso` date NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `perfil` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellido`, `cedula`, `telefono`, `correo`, `tipo`, `direccion`, `fecha_ingreso`, `fecha_egreso`, `cargo`, `perfil`) VALUES
(1, 'Fabian Andres', 'Meneses Torres', '189028811', '02123834952', 'fabian@gmail.com', 1, 'Los Dos Caminos', '2010-10-02', '2010-10-02', 'Gerente General', 'upload/2015_06_16_12.25.41perfil1.png.png'),
(2, 'Elizabeth Andreina', 'Gomez L.', '150917822', '02120981177', 'eliza@hotmail.com', 1, 'Guarenas, Edo Miranda', '2010-04-02', '2010-04-02', 'Directora General de Proyectos', 'upload/2015_06_16_12.35.17perfil.png.png'),
(4, 'Gabriel', 'Monterreal', '190981177', '0412891999', 'gabrielalex@gmail.com', 2, 'Av. Urdaneta', '2014-03-05', '2014-03-05', 'Soporte Técnico II', 'upload/2015_06_16_12.59.05demian.jpg.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE IF NOT EXISTS `horas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actividades_id` int(11) NOT NULL,
  `recursohumano_id` int(11) NOT NULL,
  `lunes` int(2) DEFAULT NULL,
  `martes` int(2) DEFAULT NULL,
  `miercoles` int(2) DEFAULT NULL,
  `jueves` int(2) DEFAULT NULL,
  `viernes` int(2) DEFAULT NULL,
  `sabado` int(2) DEFAULT NULL,
  `domingo` int(2) DEFAULT NULL,
  `lunes_e` int(2) DEFAULT NULL,
  `martes_e` int(2) DEFAULT NULL,
  `miercoles_e` int(2) DEFAULT NULL,
  `jueves_e` int(2) DEFAULT NULL,
  `viernes_e` int(2) DEFAULT NULL,
  `sabado_e` int(2) DEFAULT NULL,
  `domingo_e` int(2) DEFAULT NULL,
  `descripcion` varchar(3000) DEFAULT NULL,
  `semana` varchar(10) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `total_e` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`id`, `actividades_id`, `recursohumano_id`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `lunes_e`, `martes_e`, `miercoles_e`, `jueves_e`, `viernes_e`, `sabado_e`, `domingo_e`, `descripcion`, `semana`, `total`, `total_e`) VALUES
(4, 6, 1, 1, 2, 3, NULL, NULL, NULL, NULL, 1, 2, 3, NULL, NULL, NULL, NULL, 'primera descripcion', 'Semana 1', 6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE IF NOT EXISTS `materiales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recursos_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `responsable` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `nombre`, `cliente_id`, `responsable`, `descripcion`, `fecha`, `fecha_final`) VALUES
(1, 'Desarrollo de un Sistema Automatizado de entrenamiento ', 1, 2, 'Se plantea la creación de un Sistema que permita el manejo de las capacidades de todos los miembros de la empresa, en pro de capacitar al personal y fomentar el trabajo en equipo.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursohumano`
--

CREATE TABLE IF NOT EXISTS `recursohumano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `costo` float DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_egreso` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE IF NOT EXISTS `recursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorias_id` int(11) NOT NULL,
  `abreviatura` varchar(10) DEFAULT NULL,
  `cantidad` int(10) NOT NULL,
  `costo` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `categorias_id`, `abreviatura`, `cantidad`, `costo`) VALUES
(1, 1, 'LAP', 100, 120.9),
(2, 2, 'ESC', 5, 5000.23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `empleado_id`, `usuario`, `clave`, `status`, `admin`) VALUES
(1, 4, 'admin', '1234', 1, 1),
(2, 1, 'fabian', '1234', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
