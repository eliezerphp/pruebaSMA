-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2022 a las 14:08:40
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_areas`
--

CREATE TABLE `tbl_areas` (
  `id` int(11) NOT NULL,
  `descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_areas`
--

INSERT INTO `tbl_areas` (`id`, `descripcion`) VALUES
(1, 'Coordinación de Ciencias Económicas'),
(2, 'Coordinación de ingeniería'),
(3, 'Coordinación Ciencia Jurídicas'),
(4, 'Coordinación de Ciencias Agrónomas'),
(5, 'Post Grado'),
(6, 'Compras y Bodega'),
(7, 'Registro Academico'),
(8, 'Dirección Academica'),
(9, 'Recursos Humanos'),
(10, 'Bienestar Estudiantil'),
(11, 'Cartera y Cobro'),
(12, 'Contabilidad'),
(13, 'Soporte Informático'),
(14, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asignaturas`
--

CREATE TABLE `tbl_asignaturas` (
  `id` int(11) NOT NULL,
  `descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_asignaturas`
--

INSERT INTO `tbl_asignaturas` (`id`, `descripcion`) VALUES
(1, 'Diseño arquitectónico'),
(2, 'Administración II'),
(3, 'Planificación y administración'),
(4, 'Investigacion de operaciones'),
(5, 'Emprendimiento y Empleabilidad'),
(6, 'Español'),
(7, 'Historia de la Arquitectura V '),
(8, 'Ética Profesional'),
(9, 'Programación .NET');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aulas`
--

CREATE TABLE `tbl_aulas` (
  `id` int(11) NOT NULL,
  `descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_aulas`
--

INSERT INTO `tbl_aulas` (`id`, `descripcion`) VALUES
(1, 'N-101'),
(2, 'N-102'),
(3, 'N-103'),
(4, 'N-104'),
(5, 'N-201'),
(6, 'DG-5'),
(7, 'DG-4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bloques`
--

CREATE TABLE `tbl_bloques` (
  `id` int(11) NOT NULL,
  `descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_bloques`
--

INSERT INTO `tbl_bloques` (`id`, `descripcion`) VALUES
(1, 'I '),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bloque_turno`
--

CREATE TABLE `tbl_bloque_turno` (
  `id` int(11) NOT NULL,
  `id_bloque` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_bloque_turno`
--

INSERT INTO `tbl_bloque_turno` (`id`, `id_bloque`, `id_turno`, `hora_inicio`, `hora_final`) VALUES
(1, 1, 1, '08:00:00', '09:40:00'),
(2, 2, 1, '10:00:00', '10:50:00'),
(3, 3, 1, '12:00:00', '12:50:00'),
(4, 1, 2, '08:00:00', '09:40:00'),
(5, 2, 2, '09:40:00', '11:20:00'),
(6, 3, 2, '11:20:00', '12:20:00'),
(7, 4, 2, '13:00:00', '14:10:00'),
(8, 5, 2, '14:20:00', '15:40:00'),
(9, 1, 3, '08:00:00', '09:20:00'),
(10, 2, 3, '09:20:00', '10:30:00'),
(11, 3, 3, '10:50:00', '12:00:00'),
(12, 4, 3, '12:00:00', '13:10:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_det_solicitud`
--

CREATE TABLE `tbl_det_solicitud` (
  `id` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `id_medio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_docentes`
--

CREATE TABLE `tbl_docentes` (
  `id` int(11) NOT NULL,
  `nombres` tinytext NOT NULL,
  `apellidos` tinytext NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_docentes`
--

INSERT INTO `tbl_docentes` (`id`, `nombres`, `apellidos`, `estado`) VALUES
(1, 'Maria ', 'Parrales', 1),
(2, 'Iveth', 'Mendoza', 1),
(3, 'Helenka Romanova', 'Silva Báez', 1),
(4, 'dick', 'sanchez', 1),
(5, 'José', 'Guillermo García', 1),
(6, 'José', 'Robredo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_medios`
--

CREATE TABLE `tbl_medios` (
  `id` int(11) NOT NULL,
  `descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_medios`
--

INSERT INTO `tbl_medios` (`id`, `descripcion`) VALUES
(1, 'Proyector'),
(2, 'Extensión'),
(3, 'Laptop'),
(4, 'Cable HDMI'),
(5, 'Parlantes'),
(6, 'Micrófono'),
(7, 'Cable tipo B USB'),
(8, 'Adaptador HDMI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_puestos`
--

CREATE TABLE `tbl_puestos` (
  `id` int(11) NOT NULL,
  `descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_puestos`
--

INSERT INTO `tbl_puestos` (`id`, `descripcion`) VALUES
(1, 'Coord. Marketing y Publicidad'),
(2, 'Director de Tecnología'),
(3, 'Responsable de laboratorios de computación'),
(4, 'Docente'),
(5, 'Secretaria Academica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Solicitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitudes`
--

CREATE TABLE `tbl_solicitudes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `fecha_hora_solicitud` datetime NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_entrega` time NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_trabajadores`
--

CREATE TABLE `tbl_trabajadores` (
  `id` int(11) NOT NULL,
  `id_area` int(11) DEFAULT NULL,
  `id_puesto` int(11) NOT NULL,
  `nombres` tinytext NOT NULL,
  `apellidos` tinytext NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_trabajadores`
--

INSERT INTO `tbl_trabajadores` (`id`, `id_area`, `id_puesto`, `nombres`, `apellidos`, `estado`) VALUES
(1, 13, 3, 'Eliezer Ariel', 'Álvarez Rodríguez', 1),
(2, 13, 2, 'Ulises ', 'Rivera', 1),
(3, 1, 1, 'Karina', 'Arriaza', 1),
(4, 14, 4, 'Alicia', 'Granados', 1),
(5, 14, 4, 'Iveth ', 'Mendoza', 1),
(6, 14, 4, 'Helenka', 'Romanova', 1),
(7, 2, 5, 'Lee', 'Escobar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_turnos`
--

CREATE TABLE `tbl_turnos` (
  `id` int(11) NOT NULL,
  `descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_turnos`
--

INSERT INTO `tbl_turnos` (`id`, `descripcion`) VALUES
(1, 'Diurno'),
(2, 'Sabatino'),
(3, 'Dominical');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `id_trabajador`, `id_rol`, `usuario`, `contraseña`, `estado`) VALUES
(1, 1, 1, 'Admin', 'admin123', 1),
(2, 3, 2, 'Karina.Arriaza', '123', 1),
(3, 2, 1, 'ulises.rivera', 'admin123', 1),
(4, 4, 2, 'alicia.granados', '123', 1),
(5, 5, 2, 'iveth.mendoza', '123', 1),
(6, 6, 2, 'helenka.romanova', '123', 1),
(7, 7, 2, 'lee.escobar', '123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_areas`
--
ALTER TABLE `tbl_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_asignaturas`
--
ALTER TABLE `tbl_asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_aulas`
--
ALTER TABLE `tbl_aulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_bloques`
--
ALTER TABLE `tbl_bloques`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_bloque_turno`
--
ALTER TABLE `tbl_bloque_turno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bloque` (`id_bloque`),
  ADD KEY `id_turno` (`id_turno`);

--
-- Indices de la tabla `tbl_det_solicitud`
--
ALTER TABLE `tbl_det_solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_solicitud` (`id_solicitud`),
  ADD KEY `id_medio` (`id_medio`);

--
-- Indices de la tabla `tbl_docentes`
--
ALTER TABLE `tbl_docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_medios`
--
ALTER TABLE `tbl_medios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_puestos`
--
ALTER TABLE `tbl_puestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_solicitudes`
--
ALTER TABLE `tbl_solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_turno` (`id_turno`),
  ADD KEY `id_asignatura` (`id_asignatura`),
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `id_trabajador` (`id_trabajador`);

--
-- Indices de la tabla `tbl_trabajadores`
--
ALTER TABLE `tbl_trabajadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_puesto` (`id_puesto`);

--
-- Indices de la tabla `tbl_turnos`
--
ALTER TABLE `tbl_turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trabajador` (`id_trabajador`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_areas`
--
ALTER TABLE `tbl_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_asignaturas`
--
ALTER TABLE `tbl_asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_aulas`
--
ALTER TABLE `tbl_aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_bloques`
--
ALTER TABLE `tbl_bloques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_bloque_turno`
--
ALTER TABLE `tbl_bloque_turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_det_solicitud`
--
ALTER TABLE `tbl_det_solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_docentes`
--
ALTER TABLE `tbl_docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_medios`
--
ALTER TABLE `tbl_medios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_puestos`
--
ALTER TABLE `tbl_puestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_solicitudes`
--
ALTER TABLE `tbl_solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_trabajadores`
--
ALTER TABLE `tbl_trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_turnos`
--
ALTER TABLE `tbl_turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_bloque_turno`
--
ALTER TABLE `tbl_bloque_turno`
  ADD CONSTRAINT `tbl_bloque_turno_ibfk_1` FOREIGN KEY (`id_bloque`) REFERENCES `tbl_bloques` (`id`),
  ADD CONSTRAINT `tbl_bloque_turno_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `tbl_turnos` (`id`);

--
-- Filtros para la tabla `tbl_det_solicitud`
--
ALTER TABLE `tbl_det_solicitud`
  ADD CONSTRAINT `tbl_det_solicitud_ibfk_1` FOREIGN KEY (`id_solicitud`) REFERENCES `tbl_solicitudes` (`id`),
  ADD CONSTRAINT `tbl_det_solicitud_ibfk_2` FOREIGN KEY (`id_medio`) REFERENCES `tbl_medios` (`id`);

--
-- Filtros para la tabla `tbl_solicitudes`
--
ALTER TABLE `tbl_solicitudes`
  ADD CONSTRAINT `tbl_solicitudes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id`),
  ADD CONSTRAINT `tbl_solicitudes_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `tbl_turnos` (`id`),
  ADD CONSTRAINT `tbl_solicitudes_ibfk_3` FOREIGN KEY (`id_asignatura`) REFERENCES `tbl_asignaturas` (`id`),
  ADD CONSTRAINT `tbl_solicitudes_ibfk_4` FOREIGN KEY (`id_aula`) REFERENCES `tbl_aulas` (`id`),
  ADD CONSTRAINT `tbl_solicitudes_ibfk_5` FOREIGN KEY (`id_trabajador`) REFERENCES `tbl_trabajadores` (`id`);

--
-- Filtros para la tabla `tbl_trabajadores`
--
ALTER TABLE `tbl_trabajadores`
  ADD CONSTRAINT `tbl_trabajadores_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `tbl_areas` (`id`),
  ADD CONSTRAINT `tbl_trabajadores_ibfk_2` FOREIGN KEY (`id_puesto`) REFERENCES `tbl_puestos` (`id`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `tbl_trabajadores` (`id`),
  ADD CONSTRAINT `tbl_usuarios_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
