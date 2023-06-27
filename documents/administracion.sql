-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2023 a las 16:32:59
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `administracion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_producto`
--

CREATE TABLE `tm_producto` (
  `prod_id` int(11) NOT NULL,
  `prod_nom` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `prod_oficial` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `prod_soles` float NOT NULL,
  `prod_usd` float NOT NULL,
  `prod_plazo` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `fech_inicio` date DEFAULT NULL,
  `fech_fin` date DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `prod_monto` float NOT NULL,
  `prod_ie` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_producto`
--

INSERT INTO `tm_producto` (`prod_id`, `prod_nom`, `prod_oficial`, `prod_soles`, `prod_usd`, `prod_plazo`, `fech_inicio`, `fech_fin`, `fech_elim`, `prod_monto`, `prod_ie`, `est`) VALUES
(1, 'ACCENTURE', 'CÉSAR', 673.988, 179.73, '24 meses', '2023-06-13', '2023-06-20', NULL, 225.474, 'Todo los centros Fe y Alegría - No considera las Redes Educativas Rurales', 0),
(2, 'ACCENTURE FEDERATIVOACCENTURE FEDERATIVO', 'RICARDO', 399.245, 106.465, '12 meses', '2023-06-13', '2023-06-22', NULL, 150, 'Gestión de la línea Federativa que recae en Oficina Perú (Brasil, Ecuador, Bolivia, Venezuela y Perú).', 1),
(3, 'ACCENTURE NACIONAL ECOLOGIA', 'RICARDO', 221.991, 59.198, '10 meses', '2023-06-13', '2023-06-21', NULL, 89.862, 'FyA 80 (Lagunas) | FyA 47 (Iquitos) | FyA 72 (Pucallpa).', 1),
(4, 'AECID CONVENIO', 'JORGE', 129.583, 34.555, '12 meses', '2023-06-13', '1900-01-23', NULL, 203.846, 'FyA 74 (Nieva) | FyA 44 (Cusco)', 1),
(5, 'AKTION ', 'JORGE', 500.75, 300.2, '11 meses', '2023-06-13', '1900-01-22', NULL, 6.578, 'FyA 79 (Acobamba)', 1),
(27, 'ACCENTURE', 'CÉSAR', 673.988, 179.73, '24 meses', '2022-01-31', '2022-01-03', NULL, 225.474, 'Todo los centros Fe y Alegría - No considera las Redes Educativas Rurales', 0),
(28, 'ACCENTURE', 'CÉSAR', 673.988, 179.73, '24 meses', '2022-01-03', '2024-02-02', NULL, 225.474, 'Todo los centros Fe y Alegría - No considera las Redes Educativas Rurales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_usuario`
--

CREATE TABLE `tm_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nom` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_apep` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `rol_id` int(11) NOT NULL,
  `usu_pass` int(11) DEFAULT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `fech_fin` date DEFAULT NULL,
  `fech_inicio` date NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_usuario`
--

INSERT INTO `tm_usuario` (`usu_id`, `usu_nom`, `usu_apep`, `usu_correo`, `fech_crea`, `rol_id`, `usu_pass`, `fech_modi`, `fech_elim`, `fech_fin`, `fech_inicio`, `est`) VALUES
(1, 'Antony', 'Milian Montalvo', 'antonymilian19@gmail.com', '2023-06-07 15:57:35', 2, 123456, NULL, NULL, '0000-00-00', '0000-00-00', 1),
(53, '1224', 'Otros', '', '2023-06-26 16:06:46', 1, NULL, '2023-06-26 16:35:14', NULL, '2023-06-26', '2023-06-12', 1),
(54, '4452', 'Sillas', '', '2023-06-26 16:15:42', 1, NULL, NULL, NULL, '0000-00-00', '2023-06-29', 1),
(55, '4712', 'Muebles', '', '2023-06-26 16:33:58', 1, NULL, '2023-06-26 16:34:07', NULL, '0000-00-00', '2023-06-29', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tm_producto`
--
ALTER TABLE `tm_producto`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tm_producto`
--
ALTER TABLE `tm_producto`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
