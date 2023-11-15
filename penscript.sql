-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 02:21:05
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `penscript`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `article_id` int(11) NOT NULL,
  `precio` double DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `delete_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`article_id`, `precio`, `nombre`, `descripcion`, `imagen`, `delete_at`) VALUES
(7, 200, 'Lapiz Fabercastell', 'El mejor lápiz Fabercastell de tu vida', 'https://dojiw2m9tvv09.cloudfront.net/61749/product/17702226.png', NULL),
(8, 450, 'Lapiz Pizzini', 'El mejor lápiz Pizzini de tu vida', 'https://rmsonline.com.ar/3204-large_default/lapiz-de-grafito-pizzini-triangular-hb.jpg', NULL),
(9, 300, 'Lapicera Fabercastell', 'El mejor lápiz Fabercastell de tu vida', 'https://acdn.mitiendanube.com/stores/240/185/products/articulo-lapicera-faber-azul1-0155b394c95c2505e316300212566186-240-0.png', NULL),
(10, 550, 'Lapicera Pizzini', 'El mejor lápiz Pizzini de tu vida', 'https://poligarsrl.com.ar/poligar_shop/8871-home_default/bidon-10-litros-recuperado------------------------.jpg', NULL),
(11, 750, 'Estilógrafo Fabercastell', 'El mejor Estilógrafo Fabercastel de tu vida', 'https://dojiw2m9tvv09.cloudfront.net/61749/product/L_14063280.png?101&time=1698582008', NULL),
(12, 1250, 'Estilógrafo Pizzini', 'El mejor Estilógrafo Pizzini de tu vida', 'https://bodypel.com.ar/media/catalog/product/cache/80f087d456a0c8c87baf1ae3c5b587c8/p/u/punt130__.png', NULL),
(13, 5, 'Goma Fabercastell', 'La mejor goma Fabercastell de tu vida', 'https://www.ofi-z.com/img/articulos/goma_de_borrar_faber_7082_lapiz_tinta.jpg', NULL),
(14, 10, 'Goma Pizzini', 'La mejor goma Pizzini de tu vida', 'https://ss-static-01.esmsv.com/id/57887/productos/obtenerimagen/?id=1276&useDensity=false&width=1280&height=720&tipoEscala=contain', NULL),
(15, 800, 'Liquidpaper Fabercastell', 'El mejor liquidpaper Fabercastell de tu vida', 'https://www.ofi-z.com/img/articulos/lapiz_corrector_faber_castell_8_ml.gif', NULL),
(16, 999, 'Liquidpaper Pizzini', 'El mejor liquidpaper Pizzini de tu vida', 'https://www.todoutiles.com.ar/thumb/036157_800x800.JPG', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`article_id`, `user_id`, `id`) VALUES
(3, 30, 30),
(6, 30, 31),
(0, 30, 32),
(0, 30, 33),
(4, 30, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `user_id` int(11) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `cargo` tinyint(4) NOT NULL,
  `delete_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`user_id`, `nombreUsuario`, `email`, `contraseña`, `cargo`, `delete_at`) VALUES
(3, '2', '2', '2', 2, NULL),
(30, '1', '1', '1', 1, NULL),
(33, 'sabri', 'sabri', 'sabri', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`article_id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
