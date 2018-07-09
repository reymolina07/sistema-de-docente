-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-07-2018 a las 14:48:54
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `incripcion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `cedulaalu` varchar(14) COLLATE latin1_spanish_ci NOT NULL,
  `nombrealu` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apllidoalu` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `lugnacalu` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fechanacalu` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `sexoalu` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`cedulaalu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`cedulaalu`, `nombrealu`, `apllidoalu`, `lugnacalu`, `fechanacalu`, `sexoalu`) VALUES
('E00000001', 'CARLA AYALA', 'ESCOVAR RIVERA', 'CANTON SAN SEVASTIAN ARRIBA', '21/05/2000', 'FEMENINO'),
('E00000002', 'JOSE LUIS', 'MERINO ESCOBAR', 'SAN SEBASTIAN ARRIBA ', '23/05/1997', 'MASCULINO'),
('E0000000K', 'DSAFDSF', 'SDFDSF', 'SDFSDF', '21/05/2000', 'MASCULINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `ceduladoc` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `nombredoc` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidodoc` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `direcciondoc` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `telefonodoc` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `celulardoc` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `correodoc` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `profesiondoc` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `especialidaddoc` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`ceduladoc`, `nombredoc`, `apellidodoc`, `direcciondoc`, `telefonodoc`, `celulardoc`, `correodoc`, `profesiondoc`, `especialidaddoc`) VALUES
('000000009', 'WALTER BALMORE', 'MOLINA ', 'SANTIAGO NONUALCO', '23562365', '78652314', '', 'PROFESOR ', 'MATEMATICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `nuemeroins` mediumint(10) NOT NULL AUTO_INCREMENT,
  `cedulaalu` varchar(14) COLLATE latin1_spanish_ci NOT NULL,
  `cedulapad` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `cedulamad` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `cedularep` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `ceduladoc` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `grado` int(1) NOT NULL,
  `seccion` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `fechains` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `plantelorigen` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `observacion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `anoescolar` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  KEY `nuemeroins` (`nuemeroins`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`nuemeroins`, `cedulaalu`, `cedulapad`, `cedulamad`, `cedularep`, `ceduladoc`, `grado`, `seccion`, `fechains`, `plantelorigen`, `observacion`, `anoescolar`) VALUES
(4, 'E00000002', '000000002', '000000003', '000000002', '000000009', 1, 'A', '25/06/2018', 'Centro Escolar Canton San Sebastian Arriba', '', '2018'),
(5, 'E00000001', '000000002', '000000003', '000000002', '000000009', 1, 'A', '09/07/2018', 'Centro Escolar Canton San Sebastian Arriba', '', '2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE IF NOT EXISTS `parametros` (
  `anoescolar` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `id` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `menu` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`anoescolar`, `id`, `menu`) VALUES
('2019', '1', 'menu.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repre`
--

CREATE TABLE IF NOT EXISTS `repre` (
  `cedularep` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `nombrerep` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidorep` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `direccionrep` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `telefonorep` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `celularrep` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `correorep` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `profesionrep` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `ocupacionrep` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `fechanacrep` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `sueldorep` varchar(5) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `repre`
--

INSERT INTO `repre` (`cedularep`, `nombrerep`, `apellidorep`, `direccionrep`, `telefonorep`, `celularrep`, `correorep`, `profesionrep`, `ocupacionrep`, `fechanacrep`, `sueldorep`) VALUES
('000000004', 'ASDSAD', 'ASDSAD', 'ASDSAD', '546546', '565465', 'asdsad', 'ASDSA', 'AMA DE CASA ', '23/07/1980', '4'),
('000000003', 'MARIA RODRIGUES', ' ESCOVA HERNADEZ', 'SAN SEBASTIAN ARRIBA CASA NUMERO 29', '23340099', '72569854', '', 'MADRE ', 'AMA DE CASA ', '23/07/1981', '150'),
('4556546', 'asdsad', 'asdasd', 'sadasdasdsad', '45654', '456546', 'sdfsdf', 'ASDSAD', 'ASDSAD', '23/07/1980', '45'),
('000000002', 'MARIO LUIS ', 'MERINO RODRIGUEZ', 'SAN SEBASTIAN ARRIBA CASA NUMERO 29', '23082369', '72568956', '', '', 'JARDINERO', '23/07/1990', '700'),
('000000000', 'CARLOS MANUEL ', 'ESCOVAR HERNADEZ', 'SAN SEBASTIAN ARRIBA CASA NUMERO 25', '23340099', '72569854', '', 'GANADERO ', 'PADRE', '23/07/1980', '400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `usuario` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`usuario`, `clave`, `nombre`, `apellido`, `tipo`) VALUES
('admin', 'ADMIN', 'ADMINISTRADOR', 'GENERAL', 'ADMINISTRADOR'),
('usuario', '12345678', 'nombre de usuario', 'apellido de usuario', 'BASICO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
