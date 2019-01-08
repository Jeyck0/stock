-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2018 a las 00:13:46
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phpcartes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(10) NOT NULL,
  `nombres` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `sexo` enum('MASCULINO','FEMENINO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_matricula` int(11) NOT NULL,
  `curso` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `rut`, `ciudad`, `direccion`, `fecha_nacimiento`, `telefono`, `sexo`, `num_matricula`, `curso`, `created_at`, `updated_at`) VALUES
(7, 'eduardo', 'riquelme', '121212', 'valdivia', 'asas', '2018-10-24', 2323, 'FEMENINO', 12, '1', NULL, NULL),
(8, 'asdf', 'asdf', '11111', 'valdias', 'asasas', '2018-10-24', 2323, 'MASCULINO', 2, '4h', NULL, NULL),
(9, 'uhuih', '', '', '', '', '0000-00-00', 0, '', 0, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_plantilla`
--

CREATE TABLE `datos_plantilla` (
  `id` int(10) NOT NULL,
  `comentario` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumno_id` int(10) NOT NULL,
  `alumno_id_2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos_plantilla`
--

INSERT INTO `datos_plantilla` (`id`, `comentario`, `alumno_id`, `alumno_id_2`) VALUES
(1, 'registro 1', 7, 0),
(2, '', 8, 0),
(5, '', 7, 8),
(6, '', 8, 9),
(7, '', 8, 9),
(8, '', 8, 9),
(9, '', 7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos`
--

CREATE TABLE `establecimientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` int(11) NOT NULL,
  `rbd` int(11) NOT NULL,
  `nivel_educacional` enum('BASICA','MEDIA','BASICA Y MEDIA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `entidad` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `establecimientos`
--

INSERT INTO `establecimientos` (`id`, `nombre`, `direccion`, `ciudad`, `correo`, `telefono`, `rbd`, `nivel_educacional`, `entidad`, `created_at`, `updated_at`) VALUES
(17, 'espaÃ±a', 'baubau', 'valdivia', NULL, 122323, 1901, 'BASICA Y MEDIA', 'nose', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionals`
--

CREATE TABLE `profesionals` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `curso` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` enum('MASCULINO','FEMENINO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_profesional` enum('EDUCADORA DE PARBULO','PSICOLOGO(A)','TERAPEUTA OCUPACIONAL','FONOAUDIOLOGO(A)','PROFESOR(A)') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jefatura_curso` enum('si','no','','') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesionals`
--

INSERT INTO `profesionals` (`id`, `nombres`, `apellidos`, `rut`, `ciudad`, `direccion`, `correo`, `fecha_nacimiento`, `telefono`, `curso`, `sexo`, `titulo_profesional`, `jefatura_curso`, `created_at`, `updated_at`) VALUES
(13, 'jorge', 'obreque', '17964044-9', 'valdivia', 'los tricahues 373', 'obrequel3371@gmail.com', '1991-07-16', 954677556, '', 'MASCULINO', 'PSICOLOGO(A)', 'si', NULL, NULL),
(14, 'eduardo ', 'riquelme', '20202020', 'valdivia', 'pedro montt', 'eduardo@gmail.com', '2018-10-08', 202020201, '', 'MASCULINO', 'TERAPEUTA OCUPACIONAL', 'si', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.cl', 'admin', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumnos_rut_unique` (`rut`);

--
-- Indices de la tabla `datos_plantilla`
--
ALTER TABLE `datos_plantilla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `alumno_id_2` (`alumno_id`),
  ADD KEY `alumno_id_2_2` (`alumno_id_2`);

--
-- Indices de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `establecimientos_direccion_unique` (`direccion`),
  ADD UNIQUE KEY `establecimientos_rbd_unique` (`rbd`),
  ADD UNIQUE KEY `establecimientos_correo_unique` (`correo`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `profesionals`
--
ALTER TABLE `profesionals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profesionals_rut_unique` (`rut`),
  ADD UNIQUE KEY `profesionals_correo_unique` (`correo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `datos_plantilla`
--
ALTER TABLE `datos_plantilla`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `profesionals`
--
ALTER TABLE `profesionals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_plantilla`
--
ALTER TABLE `datos_plantilla`
  ADD CONSTRAINT `datos_plantilla_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
