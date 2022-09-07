-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2022 a las 22:33:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_desarrollo`
--
CREATE DATABASE IF NOT EXISTS `db_desarrollo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_desarrollo`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spAddCiudadano`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAddCiudadano` (IN `_documento` INT(15), IN `_nombre` VARCHAR(50), IN `_apellidos` VARCHAR(100), IN `_contrasena` VARCHAR(150), IN `_telefonoCelular` INT(15), IN `_telefonoFijo` INT(10), IN `_correo` VARCHAR(150), IN `_direccion` VARCHAR(150), IN `_fechaNacimiento` DATE, IN `_discapacidad` VARCHAR(150), IN `_accesoDis` BOOLEAN, IN `_conecInt` BOOLEAN, IN `_tipoReg` BOOLEAN, IN `_municipio` VARCHAR(100), IN `_barrioVereda` VARCHAR(100), IN `_idTipoDocumento` INT(2), IN `_idSexo` INT(3), IN `_idEtnia` INT(3), IN `_idEstrato` INT(2), IN `_idNivelEdu` INT(3), IN `_idDispositivo` INT(2))   BEGIN

INSERT INTO ciudadano (documento, nombre, apellidos, contrasena, telefonoCelular, telefonoFijo, correo, direccion, fechaNacimiento, discapacidad, accesoDis, conecInt, tipoReg, municipio, barrioVereda, idTipoDocumento, idSexo, idEtnia, idEstrato, idNivelEdu, idDispositivo) 
VALUES (_documento, _nombre, _apellidos, _contrasena, _telefonoCelular, _telefonoFijo, _correo, _direccion, _fechaNacimiento, _discapacidad, _accesoDis, _conecInt, _tipoReg, _municipio, _barrioVereda, _idTipoDocumento, _idSexo,  _idEtnia, _idEstrato, _idNivelEdu, _idDispositivo); 
END$$

DROP PROCEDURE IF EXISTS `spAddSondeo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAddSondeo` (IN `_titulo` VARCHAR(100), IN `_fechaApertura` DATETIME, IN `_fechaCierre` DATETIME, IN `_tematicaAbordada` VARCHAR(100), IN `_idSexo` INT(3), IN `_idEtnia` INT(3))   BEGIN

INSERT INTO sondeo (titulo, fechaApertura, fechaCierre, tematicaAbordada, idSexo, idEtnia)
VALUES (_titulo, _fechaApertura, _fechaCierre, _tematicaAbordada, _idSexo, _idEtnia);

END$$

DROP PROCEDURE IF EXISTS `spQueryEstrato`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spQueryEstrato` (IN `_idEstrato` INT(2))   BEGIN

SELECT * FROM ciudadano WHERE idEstrato = _idEstrato;

END$$

DROP PROCEDURE IF EXISTS `spQueryEtnia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spQueryEtnia` (IN `_idEtnia` INT(3))   BEGIN

SELECT * FROM ciudadano WHERE idEtnia = _idEtnia;

END$$

DROP PROCEDURE IF EXISTS `spQueryEtniaSexo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spQueryEtniaSexo` (IN `_idSexo` INT(3), IN `_idEtnia` INT(3))   BEGIN

SELECT * FROM ciudadano WHERE idSexo = _idSexo AND idEtnia = _idEtnia;

END$$

DROP PROCEDURE IF EXISTS `spQueryLogin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spQueryLogin` (IN `_documento` INT(15), IN `_contrasena` VARCHAR(150))   BEGIN

SELECT * FROM ciudadano WHERE documento = _documento AND contrasena = _contrasena;

END$$

DROP PROCEDURE IF EXISTS `spQueryLogin2`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spQueryLogin2` (IN `_documento` INT(15))   BEGIN

SELECT * FROM ciudadano WHERE documento = _documento;

END$$

DROP PROCEDURE IF EXISTS `spQuerySexo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spQuerySexo` (IN `_idSexo` INT(3))   BEGIN

SELECT * FROM ciudadano WHERE idSexo = _idSexo;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `documento` int(15) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  PRIMARY KEY (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadano`
--

DROP TABLE IF EXISTS `ciudadano`;
CREATE TABLE IF NOT EXISTS `ciudadano` (
  `documento` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `contrasena` varchar(150) NOT NULL,
  `telefonoCelular` varchar(100) NOT NULL,
  `telefonoFijo` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `discapacidad` varchar(150) NOT NULL,
  `accesoDis` tinyint(1) NOT NULL,
  `conecInt` tinyint(1) NOT NULL,
  `tipoReg` tinyint(1) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `barrioVereda` varchar(100) NOT NULL,
  `idTipoDocumento` int(2) NOT NULL,
  `idSexo` int(3) NOT NULL,
  `idEtnia` int(3) NOT NULL,
  `idEstrato` int(2) NOT NULL,
  `idNivelEdu` int(3) NOT NULL,
  `idDispositivo` int(2) NOT NULL,
  PRIMARY KEY (`documento`),
  KEY `idSexo` (`idSexo`),
  KEY `idEtnia` (`idEtnia`),
  KEY `idEstrato` (`idEstrato`),
  KEY `idNivelEdu` (`idNivelEdu`),
  KEY `idDispositivo` (`idDispositivo`),
  KEY `idTipoDocumento` (`idTipoDocumento`,`idSexo`,`idEtnia`,`idEstrato`,`idNivelEdu`,`idDispositivo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

DROP TABLE IF EXISTS `dispositivo`;
CREATE TABLE IF NOT EXISTS `dispositivo` (
  `idDispositivo` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) NOT NULL,
  PRIMARY KEY (`idDispositivo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`idDispositivo`, `descripcion`) VALUES
(1, 'T. Movil'),
(2, 'Computador'),
(3, 'Tablet'),
(4, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estrato`
--

DROP TABLE IF EXISTS `estrato`;
CREATE TABLE IF NOT EXISTS `estrato` (
  `idEstrato` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` int(1) NOT NULL,
  PRIMARY KEY (`idEstrato`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estrato`
--

INSERT INTO `estrato` (`idEstrato`, `descripcion`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etnia`
--

DROP TABLE IF EXISTS `etnia`;
CREATE TABLE IF NOT EXISTS `etnia` (
  `idEtnia` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idEtnia`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `etnia`
--

INSERT INTO `etnia` (`idEtnia`, `descripcion`) VALUES
(0, 'No aplica'),
(1, 'Blanco'),
(2, 'Mestizo'),
(3, 'Negro'),
(4, 'Indigena'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveleducacion`
--

DROP TABLE IF EXISTS `niveleducacion`;
CREATE TABLE IF NOT EXISTS `niveleducacion` (
  `idNivelEdu` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idNivelEdu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `niveleducacion`
--

INSERT INTO `niveleducacion` (`idNivelEdu`, `descripcion`) VALUES
(1, 'Basica Primaria'),
(2, 'Bachiller'),
(3, 'Tecnico'),
(4, 'Tecnologo'),
(5, 'Profesional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE IF NOT EXISTS `pregunta` (
  `idPregunta` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntarespuesta`
--

DROP TABLE IF EXISTS `preguntarespuesta`;
CREATE TABLE IF NOT EXISTS `preguntarespuesta` (
  `idPreguntaRespuesta` int(5) NOT NULL AUTO_INCREMENT,
  `idPregunta` int(5) NOT NULL,
  `idRespuesta` int(5) NOT NULL,
  PRIMARY KEY (`idPreguntaRespuesta`),
  KEY `idPregunta` (`idPregunta`),
  KEY `idRespuesta` (`idRespuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
CREATE TABLE IF NOT EXISTS `respuesta` (
  `idRespuesta` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`idRespuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

DROP TABLE IF EXISTS `sexo`;
CREATE TABLE IF NOT EXISTS `sexo` (
  `idSexo` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`idSexo`, `descripcion`) VALUES
(0, 'No Aplica'),
(1, 'Hombre'),
(2, 'Mujer'),
(3, 'Intersexual'),
(4, 'Indefinido'),
(5, 'Prefiere no decir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sondeo`
--

DROP TABLE IF EXISTS `sondeo`;
CREATE TABLE IF NOT EXISTS `sondeo` (
  `idSondeo` int(5) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `fechaApertura` datetime NOT NULL,
  `fechaCierre` datetime NOT NULL,
  `tematicaAbordada` varchar(100) NOT NULL,
  `idSexo` int(3) NOT NULL,
  `idEtnia` int(3) NOT NULL,
  PRIMARY KEY (`idSondeo`),
  KEY `idSexo` (`idSexo`),
  KEY `idEtnia` (`idEtnia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sondeociudadano`
--

DROP TABLE IF EXISTS `sondeociudadano`;
CREATE TABLE IF NOT EXISTS `sondeociudadano` (
  `idSondeoCiudadano` int(5) NOT NULL AUTO_INCREMENT,
  `documento` int(15) NOT NULL,
  `idSondeo` int(5) NOT NULL,
  PRIMARY KEY (`idSondeoCiudadano`),
  KEY `documento` (`documento`,`idSondeo`),
  KEY `idSondeo` (`idSondeo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sondeopregunta`
--

DROP TABLE IF EXISTS `sondeopregunta`;
CREATE TABLE IF NOT EXISTS `sondeopregunta` (
  `idSondeoPregunta` int(5) NOT NULL AUTO_INCREMENT,
  `idSondeo` int(5) NOT NULL,
  `idPregunta` int(5) NOT NULL,
  PRIMARY KEY (`idSondeoPregunta`),
  KEY `idSondeo` (`idSondeo`),
  KEY `idPregunta` (`idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

DROP TABLE IF EXISTS `tipodocumento`;
CREATE TABLE IF NOT EXISTS `tipodocumento` (
  `idTipoDocumento` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idTipoDocumento`, `descripcion`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Tarjeta de Identidad'),
(3, 'Cedula de extranjeria');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD CONSTRAINT `ciudadano_ibfk_1` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`),
  ADD CONSTRAINT `ciudadano_ibfk_2` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`),
  ADD CONSTRAINT `ciudadano_ibfk_5` FOREIGN KEY (`idEtnia`) REFERENCES `etnia` (`idEtnia`),
  ADD CONSTRAINT `ciudadano_ibfk_6` FOREIGN KEY (`idEstrato`) REFERENCES `estrato` (`idEstrato`),
  ADD CONSTRAINT `ciudadano_ibfk_7` FOREIGN KEY (`idNivelEdu`) REFERENCES `niveleducacion` (`idNivelEdu`),
  ADD CONSTRAINT `ciudadano_ibfk_8` FOREIGN KEY (`idDispositivo`) REFERENCES `dispositivo` (`idDispositivo`);

--
-- Filtros para la tabla `preguntarespuesta`
--
ALTER TABLE `preguntarespuesta`
  ADD CONSTRAINT `preguntarespuesta_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPregunta`),
  ADD CONSTRAINT `preguntarespuesta_ibfk_2` FOREIGN KEY (`idRespuesta`) REFERENCES `respuesta` (`idRespuesta`);

--
-- Filtros para la tabla `sondeo`
--
ALTER TABLE `sondeo`
  ADD CONSTRAINT `sondeo_ibfk_1` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`),
  ADD CONSTRAINT `sondeo_ibfk_2` FOREIGN KEY (`idEtnia`) REFERENCES `etnia` (`idEtnia`);

--
-- Filtros para la tabla `sondeociudadano`
--
ALTER TABLE `sondeociudadano`
  ADD CONSTRAINT `sondeociudadano_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `ciudadano` (`documento`),
  ADD CONSTRAINT `sondeociudadano_ibfk_2` FOREIGN KEY (`idSondeo`) REFERENCES `sondeo` (`idSondeo`);

--
-- Filtros para la tabla `sondeopregunta`
--
ALTER TABLE `sondeopregunta`
  ADD CONSTRAINT `sondeopregunta_ibfk_1` FOREIGN KEY (`idSondeo`) REFERENCES `sondeo` (`idSondeo`),
  ADD CONSTRAINT `sondeopregunta_ibfk_2` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (`idPregunta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
