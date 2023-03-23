-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2023 a las 01:42:50
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
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ambientes`
--

INSERT INTO `ambientes` (`id_numero_ambiente`, `piso`, `estado`) VALUES
(6, '8', 2),
(504, '5', 2),
(555, '1', 1),
(602, '5', 1),
(888, '3', 1),
(999, '4', 1),
(5454, '1', 1),
(5557, '2', 1),
(5558, '5', 1),
(9998, '16', 1),
(21331, '1', 2),
(55566, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_prestamo`
--

CREATE TABLE `detalle_prestamo` (
  `detalle_prestamo` int(15) NOT NULL,
  `cantidad` varchar(5) DEFAULT NULL,
  `id_prestamo` int(11) NOT NULL,
  `serial` int(15) NOT NULL,
  `cargador` varchar(2) NOT NULL,
  `mouse` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_prestamo`
--

INSERT INTO `detalle_prestamo` (`detalle_prestamo`, `cantidad`, `id_prestamo`, `serial`, `cargador`, `mouse`) VALUES
(1, '1', 17, 2002222, 'si', 'n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `serial` int(15) NOT NULL,
  `tipo_dispositivo` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `placa` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`serial`, `tipo_dispositivo`, `marca`, `modelo`, `placa`, `estado`) VALUES
(11, 1, 'hp', '23332', '2323', 1),
(93, 2, 'mac', 'hp', '234234', 2),
(767, 1, 'mac', 'qefsaf', '234234', 1),
(31439, 1, 'adcads', 'qefsaf', '2qdsa', 2),
(34234, 1, 'mac', 'qefsaf', '234234', 2),
(34323, 1, 'mac', 'qefsaf', '234234', 2),
(56666, 1, 'mac', 'qefsaf', '234234', 2),
(68878, 1, 'mac', 'qefsaf', '234234', 2),
(314321, 1, 'mac', 'qefsaf', '234234', 2),
(314344, 1, 'efrfwef', 'qefsaf', 'szxX', 2),
(2002222, 1, 'hp', 'A1989', '209', 2),
(45345435, 2, 'mac', 'qefsaf', '234234', 2),
(314328888, 1, ' mbj88', 'qefsaf', '234234', 2),
(314355656, 1, 'mac', 'qefsaf', 'wefdf', 1),
(2002222111, 1, 'hp', 'A1989', '209', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos_estaticos_ambiente`
--

CREATE TABLE `elementos_estaticos_ambiente` (
  `id_elemento_ambiente` int(15) NOT NULL,
  `tipo_dispositivo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `placa` varchar(100) NOT NULL,
  `id_numero_ambiente` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, '2023-02-14', '10:50:00', '2023-03-10', '07:52:21', '', 888, 4212121, 'inactivo'),
(4, '2023-02-14', '10:50:00', NULL, NULL, '', 888, 4212121, ''),
(5, '2023-02-14', '10:50:00', NULL, NULL, '', 888, 4212121, ''),
(14, '2023-02-13', '05:39:57', NULL, NULL, 'NA', 999, 4212121, ''),
(15, '2023-02-13', '05:40:25', '2023-03-18', '01:20:57', 'hola mundosssss xxxxxx7666', 999, 4212121, 'inactivo'),
(16, '2023-02-13', '05:40:37', '2023-03-18', '01:20:54', 'nueva observacn\r\n\r\n\r\nhola', 999, 4212121, 'inactivo'),
(17, '2023-02-13', '05:55:36', '2023-02-13', '09:10:38', NULL, 504, 4212121, ''),
(18, '2023-02-13', '05:57:10', '2023-02-13', '09:10:15', NULL, 888, 4212121, ''),
(19, '2023-02-13', '08:00:43', '2023-02-13', '09:10:20', 'obsrvacion', 999, 4212121, ''),
(24, '2023-03-01', '10:24:33', '2023-03-16', '09:06:19', NULL, NULL, 444444, 'inactivo');

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
(3, 'Aprendiz');

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
  `numero_ficha` int(50) NOT NULL,
  `telefono` int(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `id_rol` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`numero_documento`, `nombre`, `apellido`, `tipo_documento`, `numero_ficha`, `telefono`, `correo`, `contrasena`, `id_rol`) VALUES
(13333, 'Kevin', 'Alvarez', 1, 6868686, 343223234, 'correo22@correo.com', NULL, 3),
(13434, 'admin', 'admin', 2, 0, 5455545, 'admin@admin.com', '123', 1),
(444444, 'oscar', 'cañas', 1, 2310789, 1332324, 'oscar@correo.co', NULL, 3),
(1234599, 'Mauricio Velez', 'velez', 1, 0, 343223234, 'andre22@correo.com', NULL, 2),
(4212121, 'Juan camilo', 'vergara', 4, 0, 214444, 'correo@correo.com', NULL, 2),
(12242423, 'andres', 'ruiz', 1, 24324234, 423434, 'correo@correo.com', NULL, 3),
(12345678, 'santiago', 'ruiz', 2, 2314567, 34234434, 'santiago@correo.co', NULL, 3),
(23342347, 'santi', 'git', 1, 0, 233434, 'correo@correo.com', NULL, 2),
(44556612, 'Santiago', 'Molina Sepulveda', 1, 2310895, 315541212, 'santiago@correo.com', NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD PRIMARY KEY (`id_numero_ambiente`),
  ADD KEY `estado` (`estado`);

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
  ADD PRIMARY KEY (`id_elemento_ambiente`),
  ADD KEY `Id_ambiente` (`id_numero_ambiente`);

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
-- AUTO_INCREMENT de la tabla `detalle_prestamo`
--
ALTER TABLE `detalle_prestamo`
  MODIFY `detalle_prestamo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  MODIFY `numero_documento` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213123132;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD CONSTRAINT `ambientes_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado_ambiente` (`id_estado_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_prestamo`
--
ALTER TABLE `detalle_prestamo`
  ADD CONSTRAINT `detalle_prestamo_ibfk_2` FOREIGN KEY (`serial`) REFERENCES `elementos` (`serial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_prestamo_ibfk_3` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `elementos_estaticos_ambiente_ibfk_1` FOREIGN KEY (`id_numero_ambiente`) REFERENCES `ambientes` (`id_numero_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE;

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
