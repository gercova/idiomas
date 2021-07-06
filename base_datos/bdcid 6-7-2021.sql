-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2021 a las 10:47:53
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aperturas`
--

CREATE TABLE `aperturas` (
  `id` int(11) NOT NULL,
  `cursos_id` int(11) DEFAULT NULL,
  `sede_id` int(11) DEFAULT NULL,
  `fec_ini` date DEFAULT NULL,
  `act_web` tinyint(1) DEFAULT NULL,
  `us_reg` int(11) DEFAULT NULL,
  `fec_reg` datetime DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aperturas`
--

INSERT INTO `aperturas` (`id`, `cursos_id`, `sede_id`, `fec_ini`, `act_web`, `us_reg`, `fec_reg`, `estado`) VALUES
(1, 1, 1, '2021-07-03', 0, 1, '2021-07-03 01:16:42', 1),
(2, 1, 2, '2021-07-03', 0, 1, '2021-07-03 01:32:21', 1),
(3, 1, 3, '2021-07-03', 0, 1, '2021-07-03 01:51:41', 1),
(4, 1, 3, '2021-07-30', 0, 1, '2021-07-03 02:02:07', 1),
(5, 1, 1, '2021-07-03', 0, 1, '2021-07-03 15:55:46', 1),
(6, 1, 1, '2021-07-03', 0, 1, '2021-07-03 15:57:52', 1),
(7, 1, 2, '2021-07-16', 0, 1, '2021-07-03 15:58:20', 1),
(11, 1, 3, '2021-07-30', 1, 1, '2021-07-04 22:30:22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `descripcion`, `estado`) VALUES
(1, 'SALA VIRTUAL MEET', 1),
(2, 'SALA DE VIDEOLLAMADA EN ZOOM', 1),
(3, 'AULA 01 - LABORATORIOS', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `descripcion`, `estado`) VALUES
(1, 'INGENIERIA DE SISTEMAS E INFORMÁTICA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE `certificados` (
  `id` int(11) NOT NULL,
  `matricula_id` int(11) DEFAULT NULL,
  `fec_ini` date DEFAULT NULL,
  `fec_fin` date DEFAULT NULL,
  `folio` varchar(255) DEFAULT NULL,
  `correlativo` varchar(255) DEFAULT NULL,
  `fecha_imp` date DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `modalidad` varchar(255) DEFAULT NULL,
  `usu_reg` int(11) DEFAULT NULL,
  `fec_reg` date DEFAULT NULL,
  `usu_ente` int(11) DEFAULT NULL,
  `entrega` tinyint(1) DEFAULT 0,
  `fec_ent` date DEFAULT NULL,
  `usu_dupli` int(11) DEFAULT NULL,
  `duplicado` tinyint(4) DEFAULT NULL,
  `fecha_imp_dupli` date DEFAULT NULL,
  `entrega_dupli` tinyint(4) DEFAULT NULL,
  `usu_entrega_dupli` int(11) DEFAULT NULL,
  `fec_entrega_dupli` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

CREATE TABLE `ciclos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`id`, `descripcion`, `estado`) VALUES
(1, 'REGULAR', 1),
(2, 'INTENSIVO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id`, `descripcion`, `referencia`, `estado`) VALUES
(1, 'DERECHO A MATRICULA', '01843', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `ciclo_id` int(11) DEFAULT NULL,
  `nivel_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `silabus` varchar(255) DEFAULT NULL,
  `act_web` tinyint(4) DEFAULT NULL,
  `usu_reg` int(11) DEFAULT NULL,
  `fec_reg` date DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `ciclo_id`, `nivel_id`, `descripcion`, `silabus`, `act_web`, `usu_reg`, `fec_reg`, `estado`) VALUES
(1, 1, 1, 'INGLES PREGRADO', 'Informe_de_actividades.docx', 1, 1, '2021-06-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pago`
--

CREATE TABLE `detalle_pago` (
  `id` bigint(11) NOT NULL,
  `pago_id` int(11) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `monto` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_pago`
--

INSERT INTO `detalle_pago` (`id`, `pago_id`, `codigo`, `monto`, `fecha`) VALUES
(1, 1, '345612', 30, '2021-07-01'),
(2, 1, '431900', 30, '2021-07-07'),
(3, 2, '236790', 30, '2021-07-07'),
(4, 3, '234323', 100, '2021-07-07'),
(5, 4, '985367', 100, '2021-04-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `hora_ini` varchar(15) NOT NULL,
  `hora_fin` varchar(15) NOT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `dni` varchar(12) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `celular` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adicional` varchar(255) DEFAULT '',
  `usu_reg` varchar(255) DEFAULT NULL,
  `fec_reg` date DEFAULT NULL,
  `fec_web` date DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `dni`, `nombre`, `celular`, `email`, `adicional`, `usu_reg`, `fec_reg`, `fec_web`, `estado`) VALUES
(1, '45198491', 'RAMÍREZ SHUPINGAHUA SEGUNDO ROGER', '944929637', 'ctiunsm@gmail.com', 'segunda prueba', '1', '2021-05-27', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `dni` varchar(12) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `celular` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adicional` varchar(255) DEFAULT '',
  `usu_reg` varchar(255) DEFAULT NULL,
  `fec_reg` date DEFAULT NULL,
  `fec_web` date DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `dni`, `nombre`, `celular`, `email`, `adicional`, `usu_reg`, `fec_reg`, `fec_web`, `estado`) VALUES
(1, NULL, 'ss', '944929637', 'a', NULL, '1', '2021-05-25', NULL, 0),
(2, '48190265', 'QUINDE HUAMÁN IVONNE', '123456789', 'ctiunsm@gmail.com', 'xxccx', '1', '2021-05-27', NULL, 1),
(3, '45198491', 'RAMÍREZ SHUPINGAHUA SEGUNDO ROGER', '944929637', 'ramish390@hotmail.com', 'este alumno no posee muchos conocimientos', '1', '2021-05-27', NULL, 1),
(4, '48198491', 'MOSQUERA NOA NAYLER', '456789149', 'ramish390@hotmail.com', 'prueba', '1', '2021-05-27', NULL, 1),
(5, '71719922', 'COTRINA VALLES GERMAN', '920307572', 'GERMAN@gmail.com', 'ES UN PUTITO', '1', '2021-06-13', NULL, 1),
(6, '71719923', 'COTRINA VALLES CARLOS', '999637140', 'carloscontrina98@gmail.com', 'Ninguno', '1', '2021-06-23', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `apertura_id` int(11) DEFAULT NULL,
  `dia_id` int(11) DEFAULT NULL,
  `hora_ini` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id` int(11) NOT NULL,
  `estudiante_id` int(11) DEFAULT NULL,
  `apertura_id` int(11) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `costo` decimal(10,0) DEFAULT NULL,
  `deuda` decimal(10,0) DEFAULT NULL,
  `matriculado` tinyint(1) DEFAULT 0,
  `nota` tinyint(1) DEFAULT 0,
  `certificado` tinyint(1) DEFAULT 0,
  `usu_reg` int(11) DEFAULT NULL,
  `fec_reg` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id`, `estudiante_id`, `apertura_id`, `tipo_id`, `carrera_id`, `costo`, `deuda`, `matriculado`, `nota`, `certificado`, `usu_reg`, `fec_reg`, `estado`) VALUES
(1, 1, 11, 1, 1, '260', '260', 0, 0, 0, 1, '2021-07-05', 1),
(2, 3, 2, 3, NULL, '260', '260', 0, 0, 0, 1, '2021-07-05', 1),
(3, 5, 11, 3, NULL, '0', '0', 0, 0, 0, 1, '2021-07-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `nombre`, `link`) VALUES
(1, 'aulas', 'mantenimiento/aulas'),
(2, 'carreras', 'mantenimiento/carreras'),
(3, 'ciclos', 'mantenimiento/ciclos'),
(4, 'conceptos', 'mantenimiento/conceptos'),
(5, 'dias', 'mantenimiento/dias'),
(6, 'niveles', 'mantenimiento/niveles'),
(7, 'sedes', 'mantenimiento/sedes'),
(8, 'tipos', 'mantenimiento/tipos'),
(9, 'estudiantes', 'registro/estudiantes'),
(10, 'docentes', 'registro/docentes'),
(11, 'cursos', 'registro/cursos'),
(12, 'apertura', 'prematriculas/aperturas'),
(13, 'prematricula', 'prematriculas/prematriculas'),
(14, 'pagos', 'movimientos/pagos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `abreviatura` varchar(255) DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `usu_reg` int(11) DEFAULT NULL,
  `fec_reg` date DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `curso_id`, `descripcion`, `abreviatura`, `horas`, `usu_reg`, `fec_reg`, `estado`) VALUES
(1, 1, 'CILO I', 'A1-I', 30, 1, '2021-06-03', 1),
(2, 1, 'CILO II', 'A1-II', 30, 1, '2021-06-03', 1),
(3, 1, 'CICLO III', 'A1-III', 30, 1, '2021-06-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id`, `descripcion`, `estado`) VALUES
(1, 'BÁSICO', 1),
(2, 'INTERMEDIO', 1),
(3, 'AVANZADO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `matricula_id` int(11) DEFAULT NULL,
  `modulo_id` int(11) DEFAULT NULL,
  `nota` varchar(255) DEFAULT NULL,
  `usu_reg` int(11) DEFAULT NULL,
  `fec_reg` date DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `apertura_id` int(11) NOT NULL,
  `matricula_id` int(11) DEFAULT NULL,
  `estudiante_id` int(11) DEFAULT NULL,
  `concepto_id` int(11) DEFAULT NULL,
  `descripcion` int(11) DEFAULT NULL,
  `monto` decimal(10,0) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `fec_pago` date DEFAULT NULL,
  `usu_reg` int(11) DEFAULT NULL,
  `fec_reg` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `apertura_id`, `matricula_id`, `estudiante_id`, `concepto_id`, `descripcion`, `monto`, `codigo`, `fec_pago`, `usu_reg`, `fec_reg`, `estado`) VALUES
(1, 2, 2, 3, 1, NULL, '260', NULL, NULL, 1, '2021-07-06', 1),
(2, 2, 2, 3, 1, 0, '260', NULL, NULL, 1, '2021-07-06', 1),
(3, 2, 2, 3, 1, 0, '260', NULL, NULL, 1, '2021-07-06', 1),
(4, 2, 2, 3, 1, 0, '160', NULL, NULL, 1, '2021-07-06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `read` int(11) DEFAULT NULL,
  `insert` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `menu_id`, `rol_id`, `read`, `insert`, `update`, `delete`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1, 1),
(4, 4, 1, 1, 1, 1, 1),
(5, 5, 1, 1, 1, 1, 1),
(6, 6, 1, 1, 1, 1, 1),
(7, 7, 1, 1, 1, 1, 1),
(8, 8, 1, 1, 1, 1, 1),
(9, 9, 1, 1, 1, 1, 1),
(10, 10, 1, 1, 1, 1, 1),
(11, 11, 1, 1, 1, 1, 1),
(12, 12, 1, 1, 1, 1, 1),
(13, 13, 1, 1, 1, 1, 1),
(14, 14, 1, 1, 1, 1, 1),
(15, 15, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
(1, 'superadmin', 'hace de todo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `descripcion`, `estado`) VALUES
(1, 'OFICINA TARAPOTO', 1),
(2, 'OFICINA MOYOBAMBA', 1),
(3, 'OFICINA RIOJA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submodulos`
--

CREATE TABLE `submodulos` (
  `id` int(11) NOT NULL,
  `modulo_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `costo` decimal(10,0) DEFAULT NULL,
  `horas` varchar(255) DEFAULT NULL,
  `usu_reg` int(11) DEFAULT NULL,
  `fec_reg` date DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `submodulos`
--

INSERT INTO `submodulos` (`id`, `modulo_id`, `descripcion`, `costo`, `horas`, `usu_reg`, `fec_reg`, `estado`) VALUES
(4, 2, 'CICLO 2', '130', '30', 1, '2021-07-02', 1),
(5, 2, 'CICLO 3', '130', '30', 1, '2021-07-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `descripcion`, `estado`) VALUES
(1, 'PREGRADO', 1),
(2, 'MAESTRÍA', 1),
(3, 'DOCTORADO', 1),
(4, 'PÚBLICO EN GENERAL', 1),
(5, 'ADMINISTRATIVO', 1),
(6, 'OTROS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `nombre`) VALUES
(1, 'DNI'),
(2, 'RUC'),
(3, 'PASAPORTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT '',
  `ciudad` varchar(100) DEFAULT '',
  `celular` varchar(20) DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `ciudad`, `celular`, `email`, `username`, `password`, `rol_id`, `estado`) VALUES
(1, '45198491', 'RAMÍREZ SHUPINGAHUA SEGUNDO ROGER', 'TARAPOTO', '944929637', 'segundoroger@gmail.com', 'shego', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_pagos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_pagos` (
`id` int(11)
,`apertura_id` int(11)
,`matricula_id` int(11)
,`estudiante_id` int(11)
,`concepto_id` int(11)
,`descripcion` int(11)
,`monto` decimal(10,0)
,`codigo` varchar(255)
,`fec_pago` date
,`usu_reg` int(11)
,`fec_reg` date
,`estado` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_pagos`
--
DROP TABLE IF EXISTS `vista_pagos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_pagos`  AS  select `p`.`id` AS `id`,`p`.`apertura_id` AS `apertura_id`,`p`.`matricula_id` AS `matricula_id`,`p`.`estudiante_id` AS `estudiante_id`,`p`.`concepto_id` AS `concepto_id`,`p`.`descripcion` AS `descripcion`,`p`.`monto` AS `monto`,`p`.`codigo` AS `codigo`,`p`.`fec_pago` AS `fec_pago`,`p`.`usu_reg` AS `usu_reg`,`p`.`fec_reg` AS `fec_reg`,`p`.`estado` AS `estado` from `pagos` `p` where `p`.`estado` = '1' ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aperturas`
--
ALTER TABLE `aperturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_id` (`cursos_id`),
  ADD KEY `fk_sede_apertura` (`sede_id`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ciclo_curso` (`ciclo_id`),
  ADD KEY `fk_nivel_curso` (`nivel_id`);

--
-- Indices de la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `fk_detalle_pago` (`pago_id`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estudiante_matricula` (`estudiante_id`),
  ADD KEY `fk_apertura_matricula` (`apertura_id`),
  ADD KEY `fk_id_tipo_matricula` (`tipo_id`),
  ADD KEY `carrera_id` (`carrera_id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_apertura_pago` (`apertura_id`),
  ADD KEY `fk_matricula_pago` (`matricula_id`),
  ADD KEY `fk_estudiante_pago` (`estudiante_id`),
  ADD KEY `fk_concepto_pago` (`concepto_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menus` (`menu_id`),
  ADD KEY `fk_roles` (`rol_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `submodulos`
--
ALTER TABLE `submodulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_modulo` (`modulo_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rol` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aperturas`
--
ALTER TABLE `aperturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `submodulos`
--
ALTER TABLE `submodulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aperturas`
--
ALTER TABLE `aperturas`
  ADD CONSTRAINT `fk_curso_apertura` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `fk_sede_apertura` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_ciclo_curso` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`),
  ADD CONSTRAINT `fk_nivel_curso` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id`);

--
-- Filtros para la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
  ADD CONSTRAINT `fk_detalle_pago` FOREIGN KEY (`pago_id`) REFERENCES `pagos` (`id`);

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `fk_apertura_matricula` FOREIGN KEY (`apertura_id`) REFERENCES `aperturas` (`id`),
  ADD CONSTRAINT `fk_carrera_matricula` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `fk_estudiante_matricula` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`),
  ADD CONSTRAINT `fk_id_carrera_matricula` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `fk_id_tipo_matricula` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`);

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `curso_id` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_apertura_pago` FOREIGN KEY (`apertura_id`) REFERENCES `aperturas` (`id`),
  ADD CONSTRAINT `fk_concepto_pago` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`),
  ADD CONSTRAINT `fk_estudiante_pago` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`),
  ADD CONSTRAINT `fk_matricula_pago` FOREIGN KEY (`matricula_id`) REFERENCES `matriculas` (`id`);

--
-- Filtros para la tabla `submodulos`
--
ALTER TABLE `submodulos`
  ADD CONSTRAINT `fk_modulo` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
