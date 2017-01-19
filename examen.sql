-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2016 a las 09:18:19
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `examen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
`codigo` int(6) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`codigo`, `descripcion`) VALUES
(30, 'Compras'),
(20, 'Contabilidad'),
(10, 'Direccion'),
(40, 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleadodepartamento`
--

CREATE TABLE IF NOT EXISTS `empleadodepartamento` (
  `empleado` int(6) NOT NULL,
  `departamento` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleadodepartamento`
--

INSERT INTO `empleadodepartamento` (`empleado`, `departamento`) VALUES
(1, 10),
(2, 20),
(3, 20),
(4, 30),
(5, 30),
(6, 30),
(7, 30),
(8, 40),
(10, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `codigo` int(6) NOT NULL,
  `NombreCompleto` varchar(50) NOT NULL,
  `FechaAltaEmpresa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`codigo`, `NombreCompleto`, `FechaAltaEmpresa`) VALUES
(1, 'Abad Galzacorta, Marina', '2001-01-12'),
(2, 'Abaitua Odriozola, Joseba Koldobika', '2000-05-03'),
(3, 'Abaunz Garate, Iñaki', '2000-05-03'),
(4, 'Achon Insausti, Jose Angel', '2003-07-07'),
(5, 'Acillona Lopez, Mercedes', '2005-09-17'),
(6, 'Agirre Keretxeta, Iñigo', '2005-08-21'),
(7, 'Alberro Goikoetxea, Luzia', '2005-08-23'),
(8, 'Alexander Macinnallu, Jean Frances', '2002-05-04'),
(9, 'Almarza Meñica, Juan Manuel', '2007-09-12'),
(10, 'Alonso Bikuña, Amaia', '2007-09-09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
 ADD PRIMARY KEY (`codigo`), ADD UNIQUE KEY `descripcion` (`descripcion`);

--
-- Indices de la tabla `empleadodepartamento`
--
ALTER TABLE `empleadodepartamento`
 ADD PRIMARY KEY (`empleado`,`departamento`), ADD KEY `fk_departamento` (`departamento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
 ADD PRIMARY KEY (`codigo`), ADD UNIQUE KEY `NombreCompleto` (`NombreCompleto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
MODIFY `codigo` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleadodepartamento`
--
ALTER TABLE `empleadodepartamento`
ADD CONSTRAINT `fk_departamento` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_empleado` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
