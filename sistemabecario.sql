-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2021 a las 01:31:36
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemabecario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`user`, `pass`) VALUES
('alexsebas', '1234'),
('admin2', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_UnicoAlum` varchar(15) NOT NULL,
  `primerNomBeca` varchar(20) NOT NULL,
  `segundoNomBeca` varchar(20) NOT NULL,
  `apellidoPaterBeca` varchar(20) NOT NULL,
  `apellidoMaterBeca` varchar(20) NOT NULL,
  `celular` int(10) NOT NULL,
  `correoElec` varchar(40) NOT NULL,
  `id_UnicoPro` varchar(20) NOT NULL,
  `clavePlantel` varchar(20) NOT NULL,
  `fechaRegistro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_UnicoAlum`, `primerNomBeca`, `segundoNomBeca`, `apellidoPaterBeca`, `apellidoMaterBeca`, `celular`, `correoElec`, `id_UnicoPro`, `clavePlantel`, `fechaRegistro`) VALUES
('ALUM57103', 'Alexander 2', 'Jesus ', 'Amaen', 'avila', 9834313, 'efhurfefef@grfr', 'PRO36323', 'wefwefewf', ''),
('ALUM14007', 'Aaron ', 'Eje', 'Can', 'Caa', 9823443, 'abf@rg', 'PRO36323', 'wefwefewf', 'Sun, 10 Jan 2021 20:39:21 -060'),
('ALUM70466', 'Alexis', 'Armando', 'Castro', 'Sanchez', 2147483647, 'alexarmandomdx@gmail.com', 'PRO98101', 'FGTWEW34', 'Tue, 12 Jan 2021 22:44:54 -060');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becariocuenta`
--

CREATE TABLE `becariocuenta` (
  `id_UnicoAlum` varchar(20) NOT NULL,
  `correo_becario` varchar(50) NOT NULL,
  `pass_becario` varchar(50) NOT NULL,
  `horas_restantes` int(3) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `fechaInicio` varchar(40) DEFAULT NULL,
  `fechaFinal` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `becariocuenta`
--

INSERT INTO `becariocuenta` (`id_UnicoAlum`, `correo_becario`, `pass_becario`, `horas_restantes`, `tipo`, `fechaInicio`, `fechaFinal`) VALUES
('ALUM57103', 'alex@becario.uady.mx', 'sopas', 30, 'INACTIVO', NULL, NULL),
('ALUM14007', 'aaron@becario.uady.mx', 'reflejos', 30, 'INACTIVO', NULL, NULL),
('ALUM70466', 'alex@becario.uady.mx', 'flanes', 0, 'INACTIVO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planteles`
--

CREATE TABLE `planteles` (
  `clavePlantel` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombrePlantel` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fechaRegistro` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `planteles`
--

INSERT INTO `planteles` (`clavePlantel`, `localidad`, `nombrePlantel`, `fechaRegistro`) VALUES
('SDET44FED', 'Cancun Quintana Roo', 'Constitucion de 1917', 'Tue, 05 Jan 2021 21:35:17 -060'),
('eewas34', 'Cancun Quintana Roo', 'Chilam Balam 23', 'Tue, 05 Jan 2021 21:35:31 -060'),
('wefwefewf', 'Cancun', 'Patria nueva', 'Tue, 05 Jan 2021 23:26:31 -060'),
('FGTWEW34', 'Cancun Mexico', 'TECNICA 34', 'Wed, 06 Jan 2021 15:59:43 -060');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_UnicoPro` varchar(20) NOT NULL,
  `tipoProgra` varchar(30) NOT NULL,
  `horasCubrir` int(3) NOT NULL,
  `fechaInicioBeca` varchar(30) NOT NULL,
  `fechaFinBeca` varchar(30) NOT NULL,
  `clavePlantel` varchar(20) NOT NULL,
  `fechaRegistro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_UnicoPro`, `tipoProgra`, `horasCubrir`, `fechaInicioBeca`, `fechaFinBeca`, `clavePlantel`, `fechaRegistro`) VALUES
('PRO98101', 'Practicas Profesionales', 135, '2021-01-14', '2021-01-14', 'FGTWEW34', ''),
('PRO36323', 'Residencia ', 30, '2021-01-06', '2021-02-24', 'wefwefewf', 'Tue, 05 Jan 2021 23:27:37 -060'),
('PRO11261', 'Practicas Profesionales', 4003, '2021-01-14', '2021-01-15', 'SDET44FED', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
