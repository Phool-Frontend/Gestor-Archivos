-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2020 a las 04:25:50
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_archivos`
--

CREATE TABLE `t_archivos` (
  `id_archivo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_archivos`
--

INSERT INTO `t_archivos` (`id_archivo`, `id_usuario`, `id_categoria`, `nombre`, `tipo`, `ruta`, `fecha`) VALUES
(64, 25, 19, 'horario 2020.pdf', 'pdf', '../../archivos/25/horario 2020.pdf', '2020-04-30 19:06:24'),
(65, 25, 19, 'ANOTACIÓN DEL PASO 24 DEL INSTRUCTIVO.pdf', 'pdf', '../../archivos/25/ANOTACIÓN DEL PASO 24 DEL INSTRUCTIVO.pdf', '2020-04-30 19:06:24'),
(66, 26, 20, 'AFLORA - Padre Sol.mp3', 'mp3', '../../archivos/26/AFLORA - Padre Sol.mp3', '2020-04-30 19:09:09'),
(68, 26, 20, 'AFLORA - Tu Amor.mp3', 'mp3', '../../archivos/26/AFLORA - Tu Amor.mp3', '2020-04-30 19:10:10'),
(93, 26, 20, 'Camtasia pz perron.png', 'png', '../../archivos/26/Camtasia pz perron.png', '2020-04-30 21:03:46'),
(94, 26, 20, 'Captura de pantalla (1).png', 'png', '../../archivos/26/Captura de pantalla (1).png', '2020-04-30 21:03:46'),
(101, 26, 20, 'contactos.sql', 'sql', '../../archivos/26/contactos.sql', '2020-04-30 21:20:43'),
(102, 26, 20, 'ELECTROTECNIA III.xlsx', 'xlsx', '../../archivos/26/ELECTROTECNIA III.xlsx', '2020-04-30 21:22:03'),
(103, 31, 22, 'ELECTROTECNIA III.xlsx', 'xlsx', '../../archivos/31/ELECTROTECNIA III.xlsx', '2020-04-30 21:24:45'),
(104, 31, 22, 'ELECTROTECNIA V.xlsx', 'xlsx', '../../archivos/31/ELECTROTECNIA V.xlsx', '2020-04-30 21:24:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categorias`
--

CREATE TABLE `t_categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_categorias`
--

INSERT INTO `t_categorias` (`id_categoria`, `id_usuario`, `nombre`, `fechaInsert`) VALUES
(9, 25, 'ñato y películas ', '2020-04-24 12:46:14'),
(11, 25, 'racknarok', '2020-04-24 15:43:15'),
(13, 25, 'rampage', '2020-04-25 08:15:55'),
(14, 25, 'ready', '2020-04-25 08:17:49'),
(16, 25, 'Tutunetes Crash 123', '2020-04-25 10:34:31'),
(18, 25, 'TROLINO', '2020-04-25 11:51:01'),
(19, 25, 'fumeke', '2020-04-25 18:26:51'),
(20, 26, 'Musica', '2020-04-30 19:08:42'),
(22, 31, 'Archivos Exel', '2020-04-30 21:24:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `insert` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `nombre`, `fechaNacimiento`, `email`, `usuario`, `password`, `insert`) VALUES
(25, 'phool', '0000-00-00', 'phool@gmail.com', 'phool', '1106ec3e08a44adbb4bdf067eea3d13bca72f564', '2020-04-21 19:47:12'),
(26, 'tigre', '0000-00-00', 'tigre@gmail.com', 'tigre', 'c557c8fce1c642b7aab2671ede854f731a8b5d91', '2020-04-30 19:08:15'),
(28, 'papiGato', '0000-00-00', 'conejo@asd.com', 'conejo', '51390396e3fe636190fee7c6a203e8b904c86e01', '2020-04-30 20:37:56'),
(31, 'admin', '2020-04-18', 'admin@yahoo.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2020-04-30 21:24:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `fkArchivosCategorias_idx` (`id_categoria`),
  ADD KEY `fkUsuariosArchivos_idx` (`id_usuario`);

--
-- Indices de la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fkCategoriaUsuario_idx` (`id_usuario`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD CONSTRAINT `fkArchivosCategorias` FOREIGN KEY (`id_categoria`) REFERENCES `t_categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkUsuariosArchivos` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  ADD CONSTRAINT `fkCategoriaUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
