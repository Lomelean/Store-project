-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2025 a las 04:53:06
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
-- Base de datos: `cliente01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `rol` int(1) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellidos`, `correo`, `pass`, `rol`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(2, 'Carlos', 'Eduardo', 'carlos@outlook.com', '20d59b95948b67ce4cadaac4f7934b1a', 1, '9c39a594b0814ccca269196b42b80ffb.jpg', 'FB_IMG_1633915669528.jpg', 1, 0),
(3, 'Alejadron', 'Fernandez', 'estoscelos@hacendaño.com', 'hola', 1, 'hola', '241443669_1044930992942326_1166662690448892590_n.jpg', 1, 0),
(4, 'Chocolate', 'Pistache', 'Choco@pistache.com', '0cc175b9c0f1b6a831c399e269772661', 1, 'e1b9c29e7c65cb6da9c4203f0dd317dd.jpg', '265924065_475575597266703_6408529050754479650_n.jpg', 1, 0),
(11, 'carlos', 'lomeli', 'lomeli@gmail.com', '4d186321c1a7f0f354b297e8914ab240', 0, '', '', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `archivo` varchar(64) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `nombre`, `archivo`, `status`, `eliminado`) VALUES
(1, 'nintendo', '9cec8c4508cff97a0682c480803709e2.png', 1, 0),
(2, 'consolas', 'd758d39c07ace40f83133141d03d98b5.png', 1, 0),
(3, 'gamepass', '753bfcb9c6eb784f01ff36f2fa70e416.png', 1, 0),
(4, 'gameboy', 'deef4ce12e7efdce5a09ec2c991e1fd5.png', 1, 0),
(5, 'asasdasdasd', '9a36d263ddab301e9a3fadb72c88f156.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fecha`, `id_cliente`, `status`) VALUES
(17, '2023-05-19 00:00:00', 2, 1),
(22, '2023-05-24 00:00:00', 2, 1),
(23, '2024-04-22 00:00:00', 11, 1),
(24, '2024-04-22 00:00:00', 11, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`id`, `id_pedido`, `id_producto`, `cantidad`, `precio`) VALUES
(38, 17, 1, 10, 179.99),
(52, 17, 4, 1, 49.99),
(55, 22, 7, 0, 6969),
(56, 22, 6, 1, 549.99),
(57, 22, 2, 10, 109.99),
(58, 22, 8, 5, 12121),
(59, 23, 1, 8, 449.99),
(60, 23, 3, 5, 79.99),
(61, 23, 5, 12, 179.99),
(62, 24, 2, 2, 109.99),
(63, 100, 1, 12, 1212),
(64, 121221, 1, 3, 1212),
(65, 22, 1, 1, 1212);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `codigo` varchar(32) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` double NOT NULL,
  `stock` int(11) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `descripcion`, `costo`, `stock`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(1, 'Red dead redemption', '55668855', 'juego de vaqueros jaja', 449.99, 56, '63b5e50f1cc78ff7d6d840cb1de82480.jpg', 'Red_Dead_Redemption.jpg', 1, 0),
(2, 'FIFA 23', '2', '11 bros tras un balón', 109.99, 100, '22303893069ef93b6287b24aab3ae1a0.jpeg', 'yM0eeJui8AFByeP5BC5XV5j9.jpeg', 1, 0),
(3, 'Tomb raider', '3', 'Aventurera se la juega', 79.99, 50, 'a728494498fd4d32746f3875e36b6146.jpg', 'TombRaider2013.jpg', 1, 0),
(4, 'Naruto Shippuden', '4', 'Videojuego de pelea', 49.99, 13, '498366a04ed172f5ac7a722f9a51f128.jpg', 'p11944294_b_v9_ab.jpg', 1, 0),
(5, 'Days Gone', '666', 'Zombies y motos', 179.99, 100, '55518766c0b7e697c6a32fd8abdf0f6b.jpg', 'DaysGone-800x800.jpg', 1, 0),
(6, 'Spiderman', '69', 'Spiderman game!', 549.99, 56, '73702d11161b29a0b7c40a8b489b1808.jpeg', 'EGS_MarvelsSpiderManRemastered_InsomniacGamesNixxesSoftware_S1_2560x1440-73702d11161b29a0b7c40a8b489b1808.jpeg', 1, 0),
(7, 'Diablo II: Resurrected', '6969', 'RPG con vista isométrica', 6969, 6969, 'd794328719b61fb872d62b7b86824f8f.jpg', 'Diablo_2_Resurrected_cover_art.jpg', 1, 0),
(8, 'videojuego', '123123', 'juego', 12121, 12121, '9a36d263ddab301e9a3fadb72c88f156.jpg', 'MV5BNzkwZDliNGEtMDNkNi00ODcxLWI1N2UtNDE1NmZlM2QyMTY4XkEyXkFqcGdeQXVyMTA0MTM5NjI2._V1_.jpg', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
