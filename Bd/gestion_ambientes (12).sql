-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2023 a las 02:39:12
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_ambientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambientes`
--

CREATE TABLE `ambientes` (
  `id_numero_ambiente` int(15) NOT NULL,
  `piso` varchar(50) NOT NULL,
  `linea_formacion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `cantidad_sillas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ambientes`
--

INSERT INTO `ambientes` (`id_numero_ambiente`, `piso`, `linea_formacion`, `estado`, `cantidad_sillas`) VALUES
(1, '2', 2, 2, 3),
(6, '8', 1, 2, 0),
(504, '5', 1, 2, 0),
(555, '1', 1, 2, 0),
(602, '5', 1, 1, 0),
(888, '3', 1, 1, 0),
(999, '4', 1, 1, 0),
(5454, '1', 1, 1, 0),
(5557, '2', 1, 1, 0),
(5558, '5', 1, 1, 0),
(9998, '16', 1, 1, 0),
(21331, '1', 1, 2, 0),
(55566, '1', 1, 1, 0),
(55575, '313231', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente_elemento`
--

CREATE TABLE `ambiente_elemento` (
  `id_ambiente_elemento` int(11) NOT NULL,
  `id_numero_ambiente` int(15) NOT NULL,
  `id_elemento_estatico` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ambiente_elemento`
--

INSERT INTO `ambiente_elemento` (`id_ambiente_elemento`, `id_numero_ambiente`, `id_elemento_estatico`) VALUES
(46, 5558, 'a901'),
(47, 5558, 'a902'),
(48, 5558, 'a903'),
(49, 5558, 'a904'),
(50, 5558, 'a905'),
(51, 5558, 'a906'),
(52, 5558, 'a914'),
(53, 5558, 'a915'),
(59, 602, '914'),
(93, 1, '914'),
(94, 1, '915'),
(128, 1, '23332'),
(130, 1, '5044'),
(133, 1, 'a905'),
(134, 1, 'a906'),
(157, 6, '12143'),
(158, 6, '23332'),
(159, 6, '5044'),
(160, 6, '901');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_elemento`
--

CREATE TABLE `categoria_elemento` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria_elemento`
--

INSERT INTO `categoria_elemento` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'portatil'),
(2, 'equipo de mesa'),
(3, 'tablero'),
(4, 'pantalla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_prestamo`
--

CREATE TABLE `detalle_prestamo` (
  `detalle_prestamo` int(15) NOT NULL,
  `cantidad` varchar(5) DEFAULT NULL,
  `id_prestamo` int(11) NOT NULL,
  `serial` varchar(35) NOT NULL,
  `cargador` varchar(2) NOT NULL,
  `mouse` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_prestamo`
--

INSERT INTO `detalle_prestamo` (`detalle_prestamo`, `cantidad`, `id_prestamo`, `serial`, `cargador`, `mouse`) VALUES
(109, NULL, 117, 'a901', 'no', 'no'),
(110, NULL, 117, 'a902', 'no', 'no'),
(111, NULL, 117, 'a903', 'no', 'no'),
(112, NULL, 117, 'a904', 'no', 'no'),
(113, NULL, 117, 'a905', 'no', 'no'),
(114, NULL, 117, 'a906', 'no', 'no'),
(115, NULL, 117, 'a914', 'no', 'no'),
(116, NULL, 117, 'a915', 'no', 'no'),
(117, NULL, 117, 'abcd2', 'no', 'no'),
(118, NULL, 118, 'a901', 'no', 'no'),
(119, NULL, 118, 'a902', 'no', 'no'),
(120, NULL, 118, 'a903', 'no', 'no'),
(121, NULL, 118, 'a904', 'no', 'no'),
(122, NULL, 118, 'a905', 'no', 'no'),
(123, NULL, 118, 'a906', 'no', 'no'),
(124, NULL, 118, 'a914', 'no', 'no'),
(125, NULL, 118, 'a915', 'no', 'no'),
(126, NULL, 118, 'abcd2', 'no', 'no'),
(127, NULL, 119, 'a901', 'no', 'no'),
(129, NULL, 120, 'a901', 'no', 'no'),
(132, NULL, 120, 'a904', 'no', 'no'),
(133, NULL, 122, 'a901', 'no', 'no'),
(134, NULL, 122, 'a902', 'no', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `serial` varchar(35) NOT NULL,
  `tipo_dispositivo` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `placa` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`serial`, `tipo_dispositivo`, `marca`, `modelo`, `placa`, `estado`) VALUES
('a901', 1, 'hp', 'aadd', 'NULL', 2),
('a902', 1, 'hp', 'aadd', 'NULL', 2),
('a903', 1, 'hp', 'aadd', 'NULL', 1),
('a904', 1, 'hp', 'aadd', 'NULL', 1),
('a905', 2, 'hp', 'aadd', 'NULL', 1),
('a906', 2, 'hp', 'aadd', 'NULL', 1),
('a914', 3, 'hp', 'aadd', 'NULL', 1),
('a915', 3, 'hp', 'aadd', 'NULL', 1),
('abcd2', 1, 'adcads', 'qefsaf', 'szxX', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos_estaticos_ambiente`
--

CREATE TABLE `elementos_estaticos_ambiente` (
  `id_elemento_estatico` varchar(30) NOT NULL,
  `categoria_elemento` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `estado` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `elementos_estaticos_ambiente`
--

INSERT INTO `elementos_estaticos_ambiente` (`id_elemento_estatico`, `categoria_elemento`, `marca`, `modelo`, `placa`, `estado`) VALUES
('12143', 1, 'hp', 'a1969', '209', 2),
('23332', 2, 'lenovo', '15bs16la', NULL, 2),
('5044', 3, 'TBL', 'TBL', NULL, 2),
('901', 1, 'hp', 'aadd', 'NULL', 2),
('902', 1, 'hp', 'aadd', 'NULL', 2),
('903', 1, 'hp', 'aadd', 'a', 2),
('904', 1, 'hp', 'aadd', 'NULL', 2),
('905', 2, 'hp', 'aadd', 'NULL', 2),
('906', 2, 'hp', 'aadd', 'NULL', 1),
('914', 3, 'hp', 'aadd', 'NULL', 1),
('915', 3, 'hp', 'aadd', 'NULL', 2),
('a901', 1, 'hp', 'aadd', 'NULL', 1),
('a902', 1, 'hp', 'aadd', 'NULL', 2),
('a903', 1, 'hp', 'aadd', 'NULL', 2),
('a904', 1, 'hp', 'aadd', 'NULL', 2),
('a905', 2, 'hp', 'aadd', 'NULL', 1),
('a906', 2, 'hp', 'aadd', 'NULL', 1),
('a914', 3, 'hp', 'aadd', 'NULL', 1),
('a915', 3, 'hp', 'aadd', 'NULL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_ambiente`
--

CREATE TABLE `estado_ambiente` (
  `id_estado_ambiente` int(11) NOT NULL,
  `estado_ambiente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_ambiente`
--

INSERT INTO `estado_ambiente` (`id_estado_ambiente`, `estado_ambiente`) VALUES
(1, 'disponible'),
(2, 'ocupado'),
(3, 'mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_elementos`
--

CREATE TABLE `estado_elementos` (
  `id_estado_elemento` int(11) NOT NULL,
  `estado_elemento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_elementos`
--

INSERT INTO `estado_elementos` (`id_estado_elemento`, `estado_elemento`) VALUES
(1, 'disponible'),
(2, 'ocupado'),
(3, 'Mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_elemento_estatico`
--

CREATE TABLE `estado_elemento_estatico` (
  `id_estado_estatico` int(15) NOT NULL,
  `nombre_estado_estatico` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_elemento_estatico`
--

INSERT INTO `estado_elemento_estatico` (`id_estado_estatico`, `nombre_estado_estatico`) VALUES
(1, 'Disponible'),
(2, 'Ocupado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_formacion`
--

CREATE TABLE `linea_formacion` (
  `id_linea` int(11) NOT NULL,
  `nombre_linea` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `linea_formacion`
--

INSERT INTO `linea_formacion` (`id_linea`, `nombre_linea`) VALUES
(1, 'ADSI - ADSO'),
(2, 'GAFIME');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones_ambientes`
--

CREATE TABLE `observaciones_ambientes` (
  `id_observacion` int(11) NOT NULL,
  `observacion` text NOT NULL,
  `fecha_observacion` date NOT NULL,
  `hora_observacion` time NOT NULL,
  `id_numero_ambiente` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `observaciones_ambientes`
--

INSERT INTO `observaciones_ambientes` (`id_observacion`, `observacion`, `fecha_observacion`, `hora_observacion`, `id_numero_ambiente`) VALUES
(1, 'aasasasa', '2023-05-10', '05:58:21', 1),
(2, 'aasasasajh', '2023-05-10', '05:59:15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `hora_prestamo` time NOT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `hora_entrega` time DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `id_numero_ambiente` int(15) DEFAULT NULL,
  `numero_documento` int(15) NOT NULL,
  `estado_prestamo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `fecha_prestamo`, `hora_prestamo`, `fecha_entrega`, `hora_entrega`, `observaciones`, `id_numero_ambiente`, `numero_documento`, `estado_prestamo`) VALUES
(53, '2023-04-17', '08:43:37', '2023-04-17', '08:43:58', NULL, NULL, 212121, 'inactivo'),
(54, '2023-04-18', '12:33:56', '2023-04-18', '12:34:27', '1234', 55566, 212121, 'inactivo'),
(61, '2023-04-21', '10:59:31', '2023-04-21', '11:00:26', NULL, 555, 212121, 'inactivo'),
(62, '2023-04-21', '11:01:13', '2023-04-21', '11:29:29', NULL, 555, 212121, 'inactivo'),
(63, '2023-04-21', '11:08:28', '2023-04-21', '11:08:56', NULL, 602, 125686554, 'inactivo'),
(65, '2023-04-21', '04:19:53', '2023-04-21', '11:23:34', NULL, 602, 12345, 'inactivo'),
(67, '2023-04-21', '04:23:47', '2023-04-21', '11:30:41', NULL, 602, 12345, 'inactivo'),
(69, '2023-04-21', '04:29:46', '2023-04-21', '11:30:52', NULL, 555, 212121, 'inactivo'),
(70, '2023-04-21', '04:31:09', '2023-04-21', '11:32:37', NULL, 555, 212121, 'inactivo'),
(71, '2023-04-21', '04:33:03', '2023-04-21', '11:33:22', NULL, 555, 212121, 'inactivo'),
(72, '2023-04-21', '04:37:25', '2023-04-21', '11:38:28', NULL, 555, 212121, 'inactivo'),
(73, '2023-04-21', '04:46:16', '2023-04-21', '11:49:05', NULL, 555, 212121, 'inactivo'),
(74, '2023-04-22', '01:15:30', '2023-04-22', '01:18:04', NULL, NULL, 212121, 'inactivo'),
(75, '2023-04-22', '01:16:10', '2023-04-22', '01:16:29', NULL, NULL, 212121, 'inactivo'),
(76, '2023-04-22', '01:30:15', NULL, NULL, NULL, NULL, 212121, 'activo'),
(77, '2023-04-22', '01:30:32', '2023-04-22', '01:31:07', NULL, NULL, 212121, 'inactivo'),
(78, '2023-04-22', '01:34:59', '2023-04-24', '02:27:28', NULL, NULL, 212121, 'inactivo'),
(79, '2023-04-21', '07:05:29', '2023-04-24', '03:02:42', NULL, 555, 12345, 'inactivo'),
(80, '2023-04-21', '07:06:00', '2023-04-22', '02:06:34', NULL, 602, 1007538905, 'inactivo'),
(81, '2023-04-24', '07:28:36', '2023-04-24', '02:51:01', NULL, NULL, 212121, 'inactivo'),
(82, '2023-04-24', '07:45:32', NULL, NULL, NULL, NULL, 12345, 'activo'),
(83, '2023-04-24', '08:02:57', '2023-04-24', '03:03:06', NULL, 602, 12345, 'inactivo'),
(84, '2023-04-24', '08:03:25', NULL, NULL, 'prueba es un aprueba larga para ver si funciona ', 555, 212121, 'activo'),
(85, '2023-04-24', '09:46:13', NULL, NULL, NULL, NULL, 212121, 'activo'),
(86, '2023-04-24', '03:40:50', NULL, NULL, NULL, NULL, 212121, 'activo'),
(87, '2023-04-24', '03:41:11', NULL, NULL, NULL, NULL, 212121, 'activo'),
(88, '2023-04-24', '03:42:21', '2023-04-24', '11:06:18', NULL, NULL, 212121, 'inactivo'),
(89, '2023-04-24', '03:54:16', '2023-04-24', '11:18:36', NULL, NULL, 12345, 'inactivo'),
(90, '2023-04-24', '04:24:21', '2023-04-24', '11:25:26', NULL, NULL, 12345, 'inactivo'),
(91, '2023-04-24', '04:26:16', '2023-04-24', '11:30:03', NULL, NULL, 12345, 'inactivo'),
(92, '2023-04-24', '04:31:36', '2023-04-24', '11:33:26', NULL, NULL, 12345, 'inactivo'),
(93, '2023-04-24', '04:34:20', '2023-04-24', '11:40:04', NULL, NULL, 212121, 'inactivo'),
(94, '2023-04-24', '04:40:59', '2023-04-25', '12:24:02', NULL, NULL, 212121, 'inactivo'),
(95, '2023-04-24', '05:24:34', '2023-04-25', '12:24:51', NULL, NULL, 212121, 'inactivo'),
(96, '2023-04-24', '05:25:27', NULL, NULL, NULL, NULL, 212121, 'activo'),
(97, '2023-04-24', '05:25:58', '2023-04-25', '12:26:30', NULL, NULL, 212121, 'inactivo'),
(98, '2023-04-24', '06:58:48', '2023-04-25', '01:59:01', NULL, NULL, 212121, 'inactivo'),
(99, '2023-04-25', '08:42:36', '2023-04-25', '03:42:53', NULL, NULL, 212121, 'inactivo'),
(100, '2023-04-25', '08:48:22', '2023-04-25', '03:49:16', NULL, NULL, 212121, 'inactivo'),
(101, '2023-04-25', '08:49:30', '2023-04-25', '03:49:52', NULL, NULL, 212121, 'inactivo'),
(102, '2023-04-25', '09:41:12', '2023-04-25', '04:55:38', 'observacion de prueba', NULL, 212121, 'inactivo'),
(103, '2023-04-25', '10:12:09', '2023-04-25', '05:23:14', NULL, NULL, 212121, 'inactivo'),
(104, '2023-04-25', '10:12:48', '2023-04-25', '05:13:04', NULL, NULL, 12345, 'inactivo'),
(105, '2023-04-25', '10:13:15', '2023-04-25', '05:13:28', NULL, NULL, 12345, 'inactivo'),
(106, '2023-04-25', '10:23:24', '2023-04-28', '09:40:48', NULL, NULL, 212121, 'inactivo'),
(107, '2023-04-28', '04:14:38', '2023-04-28', '11:33:55', NULL, NULL, 212121, 'inactivo'),
(108, '2023-04-28', '05:28:36', '2023-04-29', '12:28:46', NULL, NULL, 212121, 'inactivo'),
(109, '2023-05-01', '12:07:14', '2023-05-01', '07:07:57', NULL, NULL, 212121, 'inactivo'),
(110, '2023-05-01', '12:29:43', '2023-05-01', '07:30:32', NULL, NULL, 12345, 'inactivo'),
(111, '2023-05-01', '12:36:05', '2023-05-01', '07:41:04', NULL, NULL, 212121, 'inactivo'),
(112, '2023-05-01', '12:41:36', '2023-05-01', '07:42:39', NULL, NULL, 212121, 'inactivo'),
(113, '2023-05-01', '12:42:53', '2023-05-01', '07:43:08', NULL, NULL, 212121, 'inactivo'),
(114, '2023-05-01', '12:45:54', NULL, NULL, 'observación prueba\r\n', NULL, 212121, 'activo'),
(115, '2023-05-04', '04:26:55', '2023-05-08', '06:03:17', NULL, NULL, 212121, 'inactivo'),
(116, '2023-05-08', '11:03:49', NULL, NULL, NULL, NULL, 212121, 'activo'),
(117, '2023-05-09', '02:45:42', '2023-05-09', '09:46:19', NULL, NULL, 212121, 'inactivo'),
(118, '2023-05-09', '02:46:52', '2023-05-09', '09:47:05', NULL, NULL, 45345678, 'inactivo'),
(119, '2023-05-09', '02:54:54', '2023-05-09', '09:55:58', NULL, NULL, 12345, 'inactivo'),
(120, '2023-05-09', '02:56:29', '2023-05-09', '09:58:16', NULL, NULL, 12345, 'inactivo'),
(121, '2023-05-10', '09:02:57', NULL, NULL, NULL, NULL, 212121, 'activo'),
(122, '2023-05-10', '09:03:17', NULL, NULL, NULL, NULL, 212121, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resetpasswords`
--

CREATE TABLE `resetpasswords` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resetpasswords`
--

INSERT INTO `resetpasswords` (`id`, `code`, `email`) VALUES
(1, '163fcd214b489e', 'kevinrasanchez31@gmail.com'),
(2, '163fcd3cc70868', 'kevinrasanchez31@gmail.com'),
(3, '163fcd8bd93ba0', 'kevinrasanchez31@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(15) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Instructor'),
(3, 'Invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_dispositivo`
--

CREATE TABLE `tipo_dispositivo` (
  `id_tipo_dispositivo` int(11) NOT NULL,
  `tipo_dispositivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_dispositivo`
--

INSERT INTO `tipo_dispositivo` (`id_tipo_dispositivo`, `tipo_dispositivo`) VALUES
(1, 'portatil'),
(2, 'microfono'),
(3, 'microfonos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `idDocumento` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`idDocumento`, `tipo`) VALUES
(1, 'Cédula de ciudadanía'),
(2, 'Cédula de extranjería'),
(3, 'Tarjeta de identidad'),
(4, 'Permiso especial de permanencia '),
(5, 'Permiso por protección  temporal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `numero_documento` int(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `numero_ficha` int(50) DEFAULT NULL,
  `centro` varchar(50) DEFAULT NULL,
  `telefono` int(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `id_rol` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`numero_documento`, `nombre`, `apellido`, `tipo_documento`, `numero_ficha`, `centro`, `telefono`, `correo`, `contrasena`, `id_rol`) VALUES
(12345, 'Luis  Eduardo', 'Archila admin', 2, NULL, NULL, 2214444, 'larchila03@correo.com', '123456', 1),
(123131, 'luis eduardo', 'archila', 1, NULL, 'La salada', 567768698, 'mau@correo.com', NULL, 3),
(123453, 'luis', 'arboleda', 1, NULL, NULL, 2147483647, 'mau@correo.com', NULL, 2),
(212121, 'jairo', 'alvarez', 1, NULL, NULL, 343223234, 'mau@correo.com', NULL, 2),
(45345678, 'jairoo', 'alvarezz', 1, NULL, 'La salada ', 21474836, 'jairo222@correo.com', NULL, 3),
(125686554, 'luis', 'arboleda', 1, NULL, 'La salada', 2147483647, 'correo22@correo.com', NULL, 3),
(1007538905, 'luis eduardo', 'archila', 1, NULL, NULL, 233123123, 'corre22@correo.com', NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD PRIMARY KEY (`id_numero_ambiente`),
  ADD KEY `estado` (`estado`),
  ADD KEY `linea_formacion` (`linea_formacion`);

--
-- Indices de la tabla `ambiente_elemento`
--
ALTER TABLE `ambiente_elemento`
  ADD PRIMARY KEY (`id_ambiente_elemento`),
  ADD KEY `id_ambiente` (`id_numero_ambiente`),
  ADD KEY `id_elemento_estatico` (`id_elemento_estatico`);

--
-- Indices de la tabla `categoria_elemento`
--
ALTER TABLE `categoria_elemento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detalle_prestamo`
--
ALTER TABLE `detalle_prestamo`
  ADD PRIMARY KEY (`detalle_prestamo`),
  ADD KEY `id_elemento` (`serial`),
  ADD KEY `id_prestamo` (`id_prestamo`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `estado` (`estado`),
  ADD KEY `tipo_dispositivo` (`tipo_dispositivo`);

--
-- Indices de la tabla `elementos_estaticos_ambiente`
--
ALTER TABLE `elementos_estaticos_ambiente`
  ADD PRIMARY KEY (`id_elemento_estatico`),
  ADD KEY `categoria_elemento` (`categoria_elemento`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `estado_ambiente`
--
ALTER TABLE `estado_ambiente`
  ADD PRIMARY KEY (`id_estado_ambiente`);

--
-- Indices de la tabla `estado_elementos`
--
ALTER TABLE `estado_elementos`
  ADD PRIMARY KEY (`id_estado_elemento`);

--
-- Indices de la tabla `estado_elemento_estatico`
--
ALTER TABLE `estado_elemento_estatico`
  ADD PRIMARY KEY (`id_estado_estatico`);

--
-- Indices de la tabla `linea_formacion`
--
ALTER TABLE `linea_formacion`
  ADD PRIMARY KEY (`id_linea`);

--
-- Indices de la tabla `observaciones_ambientes`
--
ALTER TABLE `observaciones_ambientes`
  ADD PRIMARY KEY (`id_observacion`),
  ADD KEY `id_numero_ambiente` (`id_numero_ambiente`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_ambientes` (`id_numero_ambiente`),
  ADD KEY `id_usuarios` (`numero_documento`);

--
-- Indices de la tabla `resetpasswords`
--
ALTER TABLE `resetpasswords`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_dispositivo`
--
ALTER TABLE `tipo_dispositivo`
  ADD PRIMARY KEY (`id_tipo_dispositivo`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`numero_documento`),
  ADD UNIQUE KEY `telefono` (`telefono`,`correo`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `tipo_documento` (`tipo_documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambiente_elemento`
--
ALTER TABLE `ambiente_elemento`
  MODIFY `id_ambiente_elemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `categoria_elemento`
--
ALTER TABLE `categoria_elemento`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_prestamo`
--
ALTER TABLE `detalle_prestamo`
  MODIFY `detalle_prestamo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `estado_ambiente`
--
ALTER TABLE `estado_ambiente`
  MODIFY `id_estado_ambiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_elementos`
--
ALTER TABLE `estado_elementos`
  MODIFY `id_estado_elemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_elemento_estatico`
--
ALTER TABLE `estado_elemento_estatico`
  MODIFY `id_estado_estatico` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `linea_formacion`
--
ALTER TABLE `linea_formacion`
  MODIFY `id_linea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `observaciones_ambientes`
--
ALTER TABLE `observaciones_ambientes`
  MODIFY `id_observacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `resetpasswords`
--
ALTER TABLE `resetpasswords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_dispositivo`
--
ALTER TABLE `tipo_dispositivo`
  MODIFY `id_tipo_dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `idDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `numero_documento` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008675346;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD CONSTRAINT `ambientes_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado_ambiente` (`id_estado_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ambientes_ibfk_2` FOREIGN KEY (`linea_formacion`) REFERENCES `linea_formacion` (`id_linea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ambiente_elemento`
--
ALTER TABLE `ambiente_elemento`
  ADD CONSTRAINT `ambiente_elemento_ibfk_1` FOREIGN KEY (`id_numero_ambiente`) REFERENCES `ambientes` (`id_numero_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ambiente_elemento_ibfk_2` FOREIGN KEY (`id_elemento_estatico`) REFERENCES `elementos_estaticos_ambiente` (`id_elemento_estatico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_prestamo`
--
ALTER TABLE `detalle_prestamo`
  ADD CONSTRAINT `detalle_prestamo_ibfk_3` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_prestamo_ibfk_4` FOREIGN KEY (`serial`) REFERENCES `elementos` (`serial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `elementos_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado_elementos` (`id_estado_elemento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elementos_ibfk_2` FOREIGN KEY (`tipo_dispositivo`) REFERENCES `tipo_dispositivo` (`id_tipo_dispositivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `elementos_estaticos_ambiente`
--
ALTER TABLE `elementos_estaticos_ambiente`
  ADD CONSTRAINT `elementos_estaticos_ambiente_ibfk_1` FOREIGN KEY (`categoria_elemento`) REFERENCES `categoria_elemento` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elementos_estaticos_ambiente_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estado_elemento_estatico` (`id_estado_estatico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `observaciones_ambientes`
--
ALTER TABLE `observaciones_ambientes`
  ADD CONSTRAINT `observaciones_ambientes_ibfk_1` FOREIGN KEY (`id_numero_ambiente`) REFERENCES `ambientes` (`id_numero_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_numero_ambiente`) REFERENCES `ambientes` (`id_numero_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`numero_documento`) REFERENCES `usuario` (`numero_documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`tipo_documento`) REFERENCES `tipo_documento` (`idDocumento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
