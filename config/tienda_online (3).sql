-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2024 a las 05:43:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` tinyint(4) NOT NULL DEFAULT 0,
  `activo` tinyint(4) NOT NULL,
  `fecha_alta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `password`, `nombre`, `email`, `token_password`, `password_request`, `activo`, `fecha_alta`) VALUES
(0, 'admin', '$2y$10$rwecIdl7tHxGBs7g2AKp2eNmfX.fbmjq9b9YKhfsMFKEZ161QHBF2', 'Administrador', 'bryanmoranchandi@gmailcom', NULL, 0, 1, '2024-03-24 03:43:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id` int(11) NOT NULL,
  `caracteristica` varchar(30) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`id`, `caracteristica`, `activo`) VALUES
(1, 'Color', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `activo`) VALUES
(1, 'Repuestos', 1),
(2, 'PC', 1),
(3, 'Color', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `estatus` tinyint(4) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `email`, `telefono`, `dni`, `estatus`, `fecha_alta`, `fecha_modifica`, `fecha_baja`) VALUES
(1, 'Bryan Alejandro', 'Morán Chandi', 'bryan_zac22@hotmail.com', '0999738698', '1050365046', 1, '2024-03-17 17:53:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`) VALUES
(1, '58F730691B028481S', '2024-03-08 16:07:47', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 529.97),
(2, '1MF38711L0570064E', '2024-03-08 16:09:00', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 179.98),
(3, '35Y53462M3259644C', '2024-03-08 16:10:12', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 889.94),
(4, '7U397791HM710824P', '2024-03-16 15:23:34', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 499.99),
(5, '51370780SU5032018', '2024-03-16 15:25:42', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 499.99),
(6, '3N777062NY882332V', '2024-03-16 15:27:13', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 499.99),
(7, '4BB08185UW4929319', '2024-03-16 15:40:53', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 499.99),
(8, '7A701883TV0973728', '2024-03-16 15:43:02', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 499.99),
(9, '6W488048MH323744P', '2024-03-16 15:52:48', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 499.99),
(10, '2JE04549DS705384C', '2024-03-16 17:08:03', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 1649.97),
(11, '56651527MF3074122', '2024-03-16 17:09:22', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 429.98),
(12, '41R44423T9752313U', '2024-03-16 17:11:47', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 499.99),
(13, '8A789693J2651473L', '2024-03-16 17:15:30', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 379.97),
(14, '2M104958035240627', '2024-03-16 17:21:54', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 419.98),
(15, '9NW37175DK585433G', '2024-03-17 00:37:59', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 679.98),
(16, '300431252X4765033', '2024-03-17 00:39:11', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 1549.97),
(17, '8XS52181GD860501A', '2024-03-18 20:26:15', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 499.99),
(18, '2YY41948SV183922G', '2024-03-19 00:52:51', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 679.98),
(19, '4K104416BK873714T', '2024-03-19 02:06:35', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 1699.97),
(20, '160583764U056154F', '2024-03-19 02:08:03', 'COMPLETED', 'bryan_zac22@hotmail.com', 'SH6U7TMR2M8CL', 699.99),
(21, '1W456370EM7107057', '2024-03-19 02:26:27', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 179.99),
(22, '35768354AD171372J', '2024-03-19 02:39:20', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 1599.98),
(23, '0GU30623KW849083D', '2024-03-19 02:53:17', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 2099.97),
(24, '12L868526F756824F', '2024-03-19 03:01:14', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 2099.97),
(25, '8RK97619FF5477153', '2024-03-23 21:28:21', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 1199.98),
(26, '3XF21426G8280770Y', '2024-03-23 21:46:07', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 179.99),
(27, '10J98259CV1682021', '2024-03-23 21:47:02', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 179.99),
(28, '5BV94376TP8071731', '2024-03-23 21:50:48', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 859.97),
(29, '82R77960EP0514741', '2024-03-23 22:01:17', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 699.99),
(30, '2CJ05443TT002602S', '2024-03-23 22:03:45', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 699.99),
(31, '4VT47288YV439205M', '2024-03-23 22:07:43', 'COMPLETED', 'sb-gpsw4729648114@personal.example.com', '35JKCY58TG7LG', 799.99),
(32, '1GC01089UJ3583420', '2024-03-24 03:53:24', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 699.99),
(33, '7YU05736RF962230J', '2024-03-24 04:07:24', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 679.98),
(34, '00L12496J66521547', '2024-03-24 04:10:19', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 499.99),
(35, '4W759861V30906846', '2024-03-24 06:17:13', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 1019.91),
(36, '5D300466E8920525S', '2024-03-24 11:27:54', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 3119.94),
(37, '9V212992UP163880F', '2024-03-24 11:31:28', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 159.98),
(38, '3KS96177946176448', '2024-03-24 12:25:13', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 359.98),
(39, '09324272T12432932', '2024-03-24 12:50:51', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 999.98),
(40, '9FG7168421370511X', '2024-03-24 13:11:50', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 1559.96),
(41, '81U614133M394853F', '2024-03-29 03:41:56', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 1654.92),
(42, '2T756958NW1024218', '2024-03-29 03:43:05', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 1654.92),
(43, '01Y35784L9988193U', '2024-03-29 03:46:47', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 1654.92),
(44, '65F79982Y2785112C', '2024-03-29 03:54:28', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 1654.92),
(45, '3KX69340G5219452Y', '2024-03-29 05:37:47', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 1654.92),
(46, '4TG30818J3522060H', '2024-03-29 05:38:37', 'COMPLETED', 'bryan_zac22@hotmail.com', '1', 969.97);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `valor`) VALUES
(1, 'tienda_nombre', ''),
(2, 'correo_email', 'bryanmoranchandi@gmail.com'),
(3, 'correo_smtp', 'smtp.gmail.com'),
(4, 'correo_password', 'OwpsQy8wrZ9thppR83kdew==:XXBJn2UdxzuSbf7ZnPqpDw=='),
(5, 'correo_puerto', '587');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `nombre`, `precio`, `cantidad`) VALUES
(1, 1, 11, 'Teclado mecánico Corsair K95 RGB Platinum XT', 199.99, 1),
(2, 1, 44, 'Teclado Mecánico Corsair K70 RGB MK.2 Cherry MX Red (Segunda Mano)', 129.99, 1),
(3, 1, 46, 'Auriculares Inalámbricos Sony WH-1000XM3 (Segunda Mano)', 199.99, 1),
(4, 2, 14, 'Ventilador de CPU Noctua NH-D15', 99.99, 1),
(5, 2, 15, 'Caja de PC NZXT H510', 79.99, 1),
(6, 3, 13, 'Fuente de alimentación EVGA Supernova 850 G5', 129.99, 3),
(7, 3, 17, 'Auriculares inalámbricos HyperX Cloud Flight', 149.99, 2),
(8, 3, 49, 'Tableta Gráfica Wacom Intuos Pro (Segunda Mano)', 199.99, 1),
(9, 4, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(10, 5, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(11, 6, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(12, 7, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(13, 8, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(14, 9, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(15, 10, 3, 'Dell Inspiron Small Desktop with 13th Gen Intel® Core™ Processor', 699.99, 1),
(16, 10, 7, 'Disco SSD Samsung 970 EVO Plus 1TB', 149.99, 1),
(17, 10, 5, 'Tarjeta gráfica NVIDIA GeForce RTX 3080', 799.99, 1),
(18, 11, 9, 'Placa base ASUS ROG Strix Z590-E Gaming WiFi', 329.99, 1),
(19, 11, 8, 'Memoria RAM Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4 3200MHz', 99.99, 1),
(20, 12, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(21, 13, 7, 'Disco SSD Samsung 970 EVO Plus 1TB', 149.99, 2),
(22, 13, 12, 'Ratón gaming Logitech G502 HERO', 79.99, 1),
(23, 14, 16, 'Webcam Logitech C920 HD Pro', 69.99, 1),
(24, 14, 18, 'Impresora multifunción HP LaserJet Pro MFP M428fdw', 349.99, 1),
(25, 15, 1, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', 179.99, 1),
(26, 15, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(27, 16, 3, 'Dell Inspiron Small Desktop with 13th Gen Intel® Core™ Processor', 699.99, 2),
(28, 16, 7, 'Disco SSD Samsung 970 EVO Plus 1TB', 149.99, 1),
(29, 17, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(30, 18, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(31, 18, 1, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', 179.99, 1),
(32, 19, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 2),
(33, 19, 3, 'Dell Inspiron Small Desktop with 13th Gen Intel® Core™ Processor', 699.99, 1),
(34, 20, 3, 'Dell Inspiron Small Desktop with 13th Gen Intel® Core™ Processor', 699.99, 1),
(35, 21, 1, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', 179.99, 1),
(36, 22, 5, 'Tarjeta gráfica NVIDIA GeForce RTX 3080', 799.99, 2),
(37, 23, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(38, 23, 5, 'Tarjeta gráfica NVIDIA GeForce RTX 3080', 799.99, 2),
(39, 24, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(40, 24, 5, 'Tarjeta gráfica NVIDIA GeForce RTX 3080', 799.99, 2),
(41, 25, 3, 'Dell Inspiron Small Desktop with 13th Gen Intel® Core™ Processor', 699.99, 1),
(42, 25, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(43, 26, 1, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', 179.99, 1),
(44, 27, 1, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', 179.99, 1),
(45, 28, 1, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', 179.99, 2),
(46, 28, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(47, 29, 3, 'Dell Inspiron Small Desktop with 13th Gen Intel® Core™ Processor', 699.99, 1),
(48, 30, 3, 'Dell Inspiron Small Desktop with 13th Gen Intel® Core™ Processor', 699.99, 1),
(49, 31, 5, 'Tarjeta gráfica NVIDIA GeForce RTX 3080', 799.99, 1),
(50, 32, 3, 'Dell Inspiron Small Desktop with 13th Gen Intel® Core™ Processor', 699.99, 1),
(51, 33, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(52, 33, 1, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', 179.99, 1),
(53, 34, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(54, 35, 7, 'Disco SSD Samsung 970 EVO Plus 1TB', 149.99, 1),
(55, 35, 8, 'Memoria RAM Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4 3200MHz', 99.99, 3),
(56, 35, 12, 'Ratón gaming Logitech G502 HERO', 79.99, 2),
(57, 35, 17, 'Auriculares inalámbricos HyperX Cloud Flight', 149.99, 1),
(58, 35, 44, 'Teclado Mecánico Corsair K70 RGB MK.2 Cherry MX Red (Segunda Mano)', 129.99, 2),
(59, 36, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 3),
(60, 36, 5, 'Tarjeta gráfica NVIDIA GeForce RTX 3080', 799.99, 2),
(61, 36, 22, 'Cable HDMI 2.1 de 3 metros Ultra High Speed', 19.99, 1),
(62, 37, 15, 'Caja de PC NZXT H510', 79.99, 2),
(63, 38, 1, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', 179.99, 2),
(64, 39, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 2),
(65, 40, 1, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', 179.99, 2),
(66, 40, 2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', 499.99, 1),
(67, 40, 3, 'Dell Inspiron Small Desktop with 13th Gen Intel® Core™ Processor', 699.99, 1),
(68, 41, 7, 'Disco SSD Samsung 970 EVO Plus 1TB', 142.49, 2),
(69, 41, 10, 'Monitor Gaming ASUS ROG Swift PG279Q', 629.99, 1),
(70, 41, 8, 'Memoria RAM Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4 3200MHz', 99.99, 4),
(71, 41, 46, 'Auriculares Inalámbricos Sony WH-1000XM3 ', 169.99, 2),
(72, 42, 7, 'Disco SSD Samsung 970 EVO Plus 1TB', 142.49, 2),
(73, 42, 10, 'Monitor Gaming ASUS ROG Swift PG279Q', 629.99, 1),
(74, 42, 8, 'Memoria RAM Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4 3200MHz', 99.99, 4),
(75, 42, 46, 'Auriculares Inalámbricos Sony WH-1000XM3 ', 169.99, 2),
(76, 43, 7, 'Disco SSD Samsung 970 EVO Plus 1TB', 142.49, 2),
(77, 43, 10, 'Monitor Gaming ASUS ROG Swift PG279Q', 629.99, 1),
(78, 43, 8, 'Memoria RAM Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4 3200MHz', 99.99, 4),
(79, 43, 46, 'Auriculares Inalámbricos Sony WH-1000XM3 ', 169.99, 2),
(80, 44, 7, 'Disco SSD Samsung 970 EVO Plus 1TB', 142.49, 2),
(81, 44, 10, 'Monitor Gaming ASUS ROG Swift PG279Q', 629.99, 1),
(82, 44, 8, 'Memoria RAM Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4 3200MHz', 99.99, 4),
(83, 44, 46, 'Auriculares Inalámbricos Sony WH-1000XM3 ', 169.99, 2),
(84, 45, 7, 'Disco SSD Samsung 970 EVO Plus 1TB', 142.49, 2),
(85, 45, 10, 'Monitor Gaming ASUS ROG Swift PG279Q', 629.99, 1),
(86, 45, 8, 'Memoria RAM Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4 3200MHz', 99.99, 4),
(87, 45, 46, 'Auriculares Inalámbricos Sony WH-1000XM3 ', 169.99, 2),
(88, 46, 10, 'Monitor Gaming ASUS ROG Swift PG279Q', 629.99, 1),
(89, 46, 46, 'Auriculares Inalámbricos Sony WH-1000XM3 ', 169.99, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_prod_caracter`
--

CREATE TABLE `det_prod_caracter` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_caracteristica` int(11) NOT NULL,
  `valor` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `det_prod_caracter`
--

INSERT INTO `det_prod_caracter` (`id`, `id_producto`, `id_caracteristica`, `valor`, `stock`) VALUES
(1, 2, 1, 'Negro', 10),
(2, 2, 1, 'Gris', 10),
(3, 2, 1, 'Dorado', 10),
(4, 2, 1, 'Negro Mate', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(3) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`, `id_categoria`, `activo`) VALUES
(1, 'Tarjeta gráfica RX 580 AMD Radeon', '<p><i>¡Rendimiento sólido a precio asequible!</i></p><p><strong>Características:</strong></p><ul><li><strong>Memoria:</strong> 8GB GDDR5</li><li><strong>Tecnología:</strong> AMD Radeon FreeSync</li><li><strong>Compatibilidad:</strong> Amplia variedad de juegos y aplicaciones</li><li><strong>Estado:</strong> Excelente, opción rentable</li></ul><p><strong>¡Mejora tu experiencia de juego sin gastar de más!</strong></p>', 199.99, 10, 10, 1, 1),
(2, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', '<p><i>Equilibrio perfecto entre rendimiento y portabilidad</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Procesador:</strong> AMD Ryzen 5</li><li><strong>Memoria RAM:</strong> 8GB</li><li><strong>Almacenamiento:</strong> SSD de 512GB</li><li><strong>Pantalla:</strong> 15.6 pulgadas Full HD</li><li><strong>Diseño:</strong> Delgado y ligero</li></ul><p><strong>Descripción:</strong></p><p>La laptop HP Pavilion 15-eh0022la es una opción atractiva en el mercado de segunda mano para aquellos que buscan un equilibrio entre rendimiento y portabilidad. Con un procesador AMD Ryzen 5 y 8GB de RAM, ofrece un rendimiento rápido y receptivo para tus tareas diarias. Además, su SSD de 512GB proporciona un amplio espacio de almacenamiento y tiempos de carga rápidos.</p><p>Su pantalla de 15.6 pulgadas con resolución Full HD garantiza una experiencia visual nítida y detallada, mientras que su diseño delgado y ligero la hace fácil de llevar contigo a todas partes. Ya sea que necesites trabajar en movimiento o disfrutar de tus contenidos multimedia favoritos, la HP Pavilion 15-eh0022la es una compañera confiable que no te decepcionará.</p><p><strong>¡Obtén el equilibrio perfecto entre rendimiento y portabilidad con la laptop HP Pavilion 15-eh0022la!</strong></p>', 499.99, 0, 0, 1, 1),
(3, ' Dell Inspiron Small Desktop with 13th Gen Intel® Core™ Processor', '<p><i>¡Rendimiento versátil y confiable en una unidad compacta!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Procesador:</strong> Intel Core de 13ª generación</li><li><strong>Rendimiento:</strong> Rápido y eficiente para multitarea</li><li><strong>Usos:</strong> Productividad, entretenimiento y más</li><li><strong>Estado:</strong> Segunda mano, opción sólida</li></ul><p><strong>Descripción:</strong></p><p>El Dell Inspiron Small Desktop con procesador Intel Core de 13ª generación es una opción sólida para aquellos que buscan un rendimiento versátil en el mercado de segunda mano. Este equipo está equipado con un procesador Intel Core de última generación, lo que garantiza un rendimiento rápido y eficiente para una variedad de tareas, desde la productividad diaria hasta el entretenimiento multimedia.</p><p>Gracias a su diseño compacto, el Inspiron Small Desktop se adapta fácilmente a cualquier espacio, ya sea en la oficina o en el hogar. Su potente procesador permite realizar multitarea sin problemas, ejecutar aplicaciones exigentes y disfrutar de una experiencia fluida en juegos y contenido multimedia.</p><p>Si buscas un equipo confiable que pueda satisfacer tus necesidades de rendimiento sin romper tu presupuesto, el Dell Inspiron Small Desktop con procesador Intel Core de 13ª generación es una opción que no te decepcionará.</p><p><strong>¡Obtén un rendimiento versátil y confiable con el Dell Inspiron Small Desktop!</strong></p>', 699.99, 0, 0, 1, 1),
(4, 'Procesador Intel Core i7-10700K', '<p><i>Potencia excepcional para juegos y aplicaciones exigentes</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Núcleos y hilos:</strong> 8 núcleos y 16 hilos</li><li><strong>Frecuencia base:</strong> 3.80 GHz</li><li><strong>Frecuencia máxima:</strong> Hasta 5.10 GHz con Intel Turbo Boost</li><li><strong>Diseño:</strong> Potente para multitarea fluida</li></ul><p><strong>Descripción:</strong></p><p>El procesador Intel Core i7-10700K es una unidad potente diseñada para brindar un rendimiento excepcional en juegos y aplicaciones exigentes. Con sus 8 núcleos y 16 hilos, ofrece una capacidad de procesamiento multitarea fluida y rápida, permitiéndote realizar varias tareas simultáneamente sin sacrificar el rendimiento.</p><p>Con una frecuencia base de 3.80 GHz y la capacidad de alcanzar hasta 5.10 GHz gracias a la tecnología Intel Turbo Boost, este procesador ofrece una potencia impresionante para usuarios que requieren un alto rendimiento en sus sistemas. Ya sea para gaming, edición de video, diseño gráfico o cualquier otra tarea exigente, el Core i7-10700K ofrece la potencia necesaria para enfrentar cualquier desafío.</p><p>Si buscas un procesador que pueda manejar fácilmente las demandas de las aplicaciones más exigentes, el Intel Core i7-10700K es una opción excepcional que no te decepcionará en términos de rendimiento y eficiencia.</p><p><strong>¡Domina cualquier tarea con la potencia excepcional del procesador Intel Core i7-10700K!</strong></p>', 399.99, 0, 0, 1, 1),
(5, 'Tarjeta gráfica NVIDIA GeForce RTX 3080', '<p><i>Potencia excepcional para gaming y creación de contenido</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Arquitectura:</strong> NVIDIA Ampere</li><li><strong>Memoria:</strong> 10GB GDDR6X de alta velocidad</li><li><strong>Tecnologías avanzadas:</strong> Trazado de rayos en tiempo real, DLSS AI</li><li><strong>Rendimiento:</strong> Excepcional para juegos y creación de contenido</li></ul><p><strong>Descripción:</strong></p><p>La tarjeta gráfica NVIDIA GeForce RTX 3080 es una opción de primera categoría para los entusiastas del gaming y la creación de contenido. Equipada con la arquitectura NVIDIA Ampere, esta tarjeta ofrece un rendimiento excepcional que te sumerge en mundos virtuales increíblemente realistas.</p><p>Con 10GB de memoria GDDR6X de alta velocidad, la RTX 3080 proporciona una potencia de procesamiento impresionante, lo que te permite disfrutar de juegos fluidos y renderizar proyectos de diseño 3D sin problemas.</p><p>Además, con tecnologías avanzadas como el trazado de rayos en tiempo real y el DLSS AI, la RTX 3080 lleva la calidad visual a un nuevo nivel, ofreciendo gráficos impresionantes y una experiencia de juego inmersiva.</p><p>Ya sea que estés jugando los últimos títulos AAA o trabajando en proyectos creativos exigentes, la tarjeta gráfica NVIDIA GeForce RTX 3080 asegura un rendimiento sin compromisos y te permite exprimir al máximo tu pasión por el gaming y la creación de contenido.</p><p><strong>¡Experimenta el poder incomparable de la tarjeta gráfica NVIDIA GeForce RTX 3080 y lleva tus juegos y proyectos creativos al siguiente nivel!</strong></p>', 799.99, 0, 0, 1, 1),
(7, 'Disco SSD Samsung 970 EVO Plus 1TB', '<p><i>Aumenta el rendimiento de tu sistema con almacenamiento rápido y confiable</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Capacidad:</strong> 1TB</li><li><strong>Tecnología:</strong> V-NAND y interfaz PCIe NVMe</li><li><strong>Velocidades:</strong> Lectura y escritura excepcionales</li><li><strong>Compatibilidad:</strong> Factor de forma M.2</li></ul><p><strong>Descripción:</strong></p><p>El disco SSD Samsung 970 EVO Plus es la solución perfecta para mejorar el rendimiento de tu sistema con almacenamiento rápido y confiable. Con una generosa capacidad de 1TB, este SSD utiliza la tecnología V-NAND y la interfaz PCIe NVMe para ofrecer velocidades de lectura y escritura excepcionales, lo que te permite disfrutar de una experiencia informática más fluida y eficiente.</p><p>Diseñado para cargas de trabajo intensivas, juegos y edición de video, el 970 EVO Plus garantiza tiempos de carga más rápidos y un rendimiento general mejorado en comparación con los discos duros tradicionales. Ya sea que estés ejecutando aplicaciones exigentes o transferiendo archivos grandes, este SSD te proporciona la velocidad y la fiabilidad que necesitas.</p><p>Además, su factor de forma M.2 lo hace compatible con una amplia gama de dispositivos, lo que te brinda la flexibilidad de utilizarlo en tu computadora de escritorio, laptop o incluso en sistemas compactos.</p><p><strong>¡Optimiza el rendimiento de tu sistema con el disco SSD Samsung 970 EVO Plus y experimenta una informática más rápida y fluida en todas tus actividades!</strong></p>', 149.99, 5, 0, 1, 1),
(8, 'Memoria RAM Corsair Vengeance RGB Pro 16GB (2x8GB) DDR4 3200MHz', '<p><i>¡Rendimiento excepcional y estilo deslumbrante!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Capacidad:</strong> 16GB (2x8GB)</li><li><strong>Velocidad:</strong> 3200MHz</li><li><strong>Diseño:</strong> Iluminación RGB personalizable</li><li><strong>Compatibilidad:</strong> Placas base Intel y AMD</li></ul><p><strong>Descripción:</strong></p><p>La memoria RAM Corsair Vengeance RGB Pro ofrece un rendimiento excepcional y un diseño llamativo que complementa cualquier sistema. Con una capacidad total de 16GB (2x8GB) y una velocidad de 3200MHz, esta memoria proporciona un rendimiento rápido y estable para multitarea, gaming y aplicaciones exigentes.</p><p>Además de su potente rendimiento, la Corsair Vengeance RGB Pro cuenta con iluminación RGB personalizable, que te permite personalizar el aspecto de tu sistema con efectos de iluminación dinámicos y vibrantes. Desde sutiles transiciones de color hasta patrones de luz audaces, esta memoria añade un toque de estilo y personalidad a tu configuración.</p><p>Optimizada para placas base tanto Intel como AMD, la Corsair Vengeance RGB Pro garantiza una compatibilidad perfecta y un rendimiento óptimo en cualquier plataforma. Ya sea que estés construyendo una nueva PC gaming o actualizando tu sistema existente, esta memoria es la elección perfecta para usuarios que buscan un equilibrio entre rendimiento y estética.</p><p><strong>¡Experimenta el rendimiento excepcional y el estilo deslumbrante con la memoria RAM Corsair Vengeance RGB Pro!</strong></p>', 99.99, 0, 0, 1, 1),
(9, 'Placa base ASUS ROG Strix Z590-E Gaming WiFi', '<p><i>¡Construye un sistema de alto rendimiento con estilo y funcionalidad de primera clase!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Compatibilidad:</strong> Procesadores Intel de última generación</li><li><strong>Conectividad:</strong> WiFi integrada</li><li><strong>Iluminación:</strong> RGB Aura Sync</li><li><strong>Tecnologías avanzadas:</strong> PCIe 4.0, USB 3.2 Gen 2</li><li><strong>Diseño:</strong> Robusto y estético</li></ul><p><strong>Descripción:</strong></p><p>La placa base ASUS ROG Strix Z590-E Gaming WiFi es una opción premium para aquellos que buscan construir un sistema de alto rendimiento con todas las características necesarias para satisfacer las demandas de los jugadores y creadores de contenido más exigentes.</p><p>Compatible con procesadores Intel de última generación, esta placa base garantiza un rendimiento confiable y una compatibilidad óptima con una amplia gama de componentes. Además, la conectividad WiFi integrada te permite disfrutar de una conexión inalámbrica rápida y estable sin necesidad de adaptadores adicionales.</p><p>Con su iluminación RGB Aura Sync, la Z590-E Gaming WiFi añade un toque de estilo personalizado a tu sistema, permitiéndote sincronizar efectos de iluminación con otros dispositivos compatibles para crear una experiencia visual impresionante.</p><p>Además, esta placa base cuenta con tecnologías avanzadas como PCIe 4.0 y USB 3.2 Gen 2, que proporcionan un rendimiento de vanguardia y velocidades de transferencia de datos ultra rápidas para que puedas aprovechar al máximo tus componentes de hardware.</p><p>Con un diseño robusto y una estética impresionante, la ASUS ROG Strix Z590-E Gaming WiFi ofrece lo mejor en términos de estilo y funcionalidad, asegurando que tu sistema no solo tenga un rendimiento excepcional, sino que también luzca increíble mientras lo hace.</p><p><strong>¡Construye tu sistema de ensueño con la placa base ASUS ROG Strix Z590-E Gaming WiFi y lleva tu experiencia de juego y creación de contenido al siguiente nivel!</strong></p>', 329.99, 10, 0, 1, 1),
(10, 'Monitor Gaming ASUS ROG Swift PG279Q', '<p><i>¡Sumérgete en la acción con imágenes nítidas y una experiencia de juego suave!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Pantalla:</strong> IPS de 27 pulgadas con resolución WQHD (2560 x 1440)</li><li><strong>Frecuencia de actualización:</strong> Hasta 165Hz</li><li><strong>Tecnología:</strong> G-Sync para eliminar el tearing</li><li><strong>Ajustes ergonómicos:</strong> Altura, inclinación y giro ajustables</li><li><strong>Diseño:</strong> Elegante y ergonómico</li></ul><p><strong>Descripción:</strong></p><p>El monitor gaming ASUS ROG Swift PG279Q te sumerge en la acción con imágenes nítidas y una experiencia de juego suave y libre de tearing. Con una pantalla IPS de 27 pulgadas y una resolución WQHD (2560 x 1440), este monitor ofrece colores precisos y ángulos de visión amplios para una experiencia visual inmersiva y detallada.</p><p>Con una frecuencia de actualización de hasta 165Hz y la tecnología G-Sync, disfrutarás de una jugabilidad suave y sin interrupciones, incluso en los juegos más exigentes. La eliminación del tearing garantiza una experiencia visual impecable, lo que te permite concentrarte completamente en la acción.</p><p>Además de su rendimiento excepcional, el PG279Q ofrece un diseño elegante y ergonómico que te permite ajustar la altura, inclinación y giro del monitor para una comodidad óptima durante largas sesiones de juego o trabajo.</p><p>Ya sea que estés inmerso en intensas batallas de juego o trabajando en proyectos creativos, el monitor ASUS ROG Swift PG279Q eleva tu experiencia visual al siguiente nivel, brindándote imágenes nítidas y una jugabilidad fluida que te permite destacar en cualquier situación.</p><p><strong>¡Hazte con el monitor ASUS ROG Swift PG279Q y lleva tu experiencia de juego y trabajo al siguiente nivel de inmersión y rendimiento!</strong></p>', 699.99, 10, 0, 1, 1),
(11, 'Teclado mecánico Corsair K95 RGB Platinum XT', '<p><i>¡Rendimiento excepcional y diseño premium para tus necesidades de juego y trabajo!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Interruptores:</strong> Cherry MX Speed para respuesta ultrarrápida</li><li><strong>Retroiluminación:</strong> RGB personalizable por tecla</li><li><strong>Características adicionales:</strong> Teclas macro programables, reposamuñecas desmontable, controles multimedia dedicados</li></ul><p><strong>Descripción:</strong></p><p>El teclado mecánico Corsair K95 RGB Platinum XT ofrece un rendimiento excepcional y un diseño premium que lo convierte en la elección perfecta para jugadores y profesionales que buscan lo mejor en términos de funcionalidad y estilo.</p><p>Equipado con interruptores Cherry MX Speed, este teclado garantiza una respuesta ultrarrápida y una experiencia de escritura fluida y precisa, lo que te permite reaccionar rápidamente en cada pulsación.</p><p>Además de su excelente rendimiento, el K95 RGB Platinum XT cuenta con retroiluminación RGB personalizable por tecla, que te permite crear efectos de iluminación impresionantes para adaptarse a tu estilo y ambiente de juego.</p><p>Con características adicionales como teclas macro programables, reposamuñecas desmontable y controles multimedia dedicados, este teclado te ofrece la versatilidad y comodidad que necesitas para maximizar tu productividad y disfrutar de una experiencia de juego sin igual.</p><p>Ya sea que estés inmerso en intensas batallas de juego o trabajando en proyectos creativos, el Corsair K95 RGB Platinum XT eleva tu experiencia de escritura al siguiente nivel, brindándote rendimiento excepcional y un diseño premium que destaca en cualquier situación.</p><p><strong>¡Hazte con el teclado Corsair K95 RGB Platinum XT y lleva tus habilidades de juego y trabajo al máximo nivel!</strong></p>', 199.99, 5, 0, 1, 1),
(12, 'Ratón gaming Logitech G502 HERO', '<p><i>¡Rendimiento excepcional y comodidad duradera para tus sesiones de juego!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Sensor:</strong> HERO de 16,000 DPI para seguimiento preciso</li><li><strong>Personalización:</strong> 11 botones programables y sistema de peso ajustable</li><li><strong>Diseño:</strong> Ergonómico con agarres texturizados para un control preciso y cómodo</li></ul><p><strong>Descripción:</strong></p><p>El ratón gaming Logitech G502 HERO ofrece un rendimiento excepcional y una comodidad duradera que te permite disfrutar de sesiones de juego prolongadas con total confianza. Equipado con el sensor HERO de 16,000 DPI, este ratón proporciona un seguimiento preciso y sin aceleración en una amplia variedad de superficies, lo que te permite reaccionar rápidamente en cada movimiento.</p><p>Con 11 botones programables y un sistema de peso ajustable, el G502 HERO te ofrece una personalización completa para adaptarse a tu estilo de juego único. Ya sea que prefieras shooters, MOBAs o MMOs, puedes configurar los botones según tus necesidades específicas y optimizar tu experiencia de juego.</p><p>Además, su diseño ergonómico con agarres texturizados garantiza un control preciso y cómodo en todo momento, reduciendo la fatiga y permitiéndote concentrarte completamente en el juego.</p><p>Con el ratón Logitech G502 HERO, estarás preparado para destacar en cualquier situación de juego, gracias a su rendimiento excepcional, su comodidad duradera y su capacidad de personalización incomparable.</p><p><strong>¡Hazte con el Logitech G502 HERO y lleva tu experiencia de juego al siguiente nivel de precisión y comodidad!</strong></p>', 79.99, 0, 0, 1, 1),
(13, 'Fuente de alimentación EVGA Supernova 850 G5', '<p><i>Potencia confiable y eficiente para tu sistema de PC</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Capacidad:</strong> 850W</li><li><strong>Certificación:</strong> 80 Plus Gold para eficiencia excepcional</li><li><strong>Diseño:</strong> Modular para instalación limpia</li><li><strong>Ventilador:</strong> Con rodamiento de fluido para funcionamiento silencioso</li><li><strong>Garantía:</strong> 10 años respaldados por la reputación de calidad de EVGA</li></ul><p><strong>Descripción:</strong></p><p>La fuente de alimentación EVGA Supernova 850 G5 ofrece una potencia confiable y eficiente para tu sistema de PC, asegurando un suministro estable de energía con una eficiencia excepcional. Con una capacidad de 850W y certificación 80 Plus Gold, esta fuente de alimentación garantiza un rendimiento óptimo y una reducción en los costos de energía.</p><p>Su diseño modular permite una instalación limpia y sin complicaciones, ya que solo necesitas conectar los cables que realmente necesitas, lo que mejora el flujo de aire dentro del chasis y ayuda a mantener tu sistema ordenado y bien organizado.</p><p>Además, el ventilador con rodamiento de fluido asegura un funcionamiento silencioso incluso bajo cargas pesadas, manteniendo tu sistema fresco y tranquilo durante largas sesiones de uso intensivo.</p><p>Respaldada por una garantía de 10 años y la reputación de calidad de EVGA, la Supernova 850 G5 es la opción ideal para sistemas de alto rendimiento, ofreciendo una combinación incomparable de fiabilidad, eficiencia y tranquilidad.</p><p><strong>¡Confía en la EVGA Supernova 850 G5 para alimentar tu sistema con la potencia y la calidad que necesitas para un rendimiento óptimo!</strong></p>', 129.99, 5, 0, 1, 1),
(14, 'Ventilador de CPU Noctua NH-D15', '<p><i>¡Rendimiento de enfriamiento excepcional para tu procesador!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Diseño:</strong> Doble torre con dos ventiladores NF-A15 de 140mm</li><li><strong>Compatibilidad:</strong> Diseño asimétrico para compatibilidad con módulos de RAM de gran altura</li><li><strong>Pasta térmica:</strong> NT-H1 preaplicada para una transferencia de calor eficiente</li><li><strong>Construcción:</strong> Robusta y fiable</li></ul><p><strong>Descripción:</strong></p><p>El ventilador de CPU Noctua NH-D15 ofrece un rendimiento de enfriamiento excepcional para tu procesador, garantizando temperaturas óptimas incluso en condiciones de uso intensivo o overclocking.</p><p>Con su diseño de doble torre y dos ventiladores NF-A15 de 140mm, este disipador de calor proporciona una refrigeración eficiente y silenciosa, asegurando un funcionamiento estable y prolongado de tu CPU.</p><p>Además, el diseño asimétrico del NH-D15 garantiza la compatibilidad con módulos de RAM de gran altura, lo que te permite instalar este disipador incluso en sistemas con configuraciones de memoria más exigentes.</p><p>La pasta térmica NT-H1 preaplicada garantiza una transferencia de calor eficiente entre la CPU y el disipador, lo que contribuye a mantener las temperaturas bajo control y prolongar la vida útil de tu procesador.</p><p>Con una construcción robusta y una reputación de fiabilidad, el Noctua NH-D15 es una opción popular entre los entusiastas del PC que buscan el mejor rendimiento de enfriamiento para sus sistemas.</p><p><strong>¡Confía en el NH-D15 de Noctua para mantener tu procesador fresco y funcionando de manera óptima en todo momento!</strong></p>', 99.99, 0, 0, 1, 1),
(15, 'Caja de PC NZXT H510', '<p><i>¡Estilo y funcionalidad en un diseño elegante y minimalista!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Diseño:</strong> Elegante y minimalista con panel lateral de vidrio templado</li><li><strong>Construcción:</strong> Estructura de acero resistente para una plataforma robusta</li><li><strong>Gestión de cables:</strong> Optimizada para una instalación limpia y ordenada</li><li><strong>Soporte de montaje SSD:</strong> Ajustable para una mayor flexibilidad</li><li><strong>Refrigeración:</strong> Sistema eficiente para mantener tus componentes frescos</li></ul><p><strong>Descripción:</strong></p><p>La caja de PC NZXT H510 combina estilo y funcionalidad en un diseño elegante y minimalista que destaca en cualquier entorno. Con un panel lateral de vidrio templado que muestra tus componentes internos y una estructura de acero resistente, esta caja ofrece una plataforma robusta y atractiva para construir tu sistema.</p><p>Su diseño compacto y la gestión de cables optimizada garantizan una instalación limpia y ordenada, lo que permite lucir tus componentes de manera impecable mientras mantienes un flujo de aire eficiente dentro del chasis.</p><p>Además, el NZXT H510 viene con características como un soporte de montaje SSD ajustable, que te brinda la flexibilidad de instalar tus unidades de almacenamiento de la manera que prefieras, y un sistema de refrigeración eficiente que mantiene tus componentes frescos incluso durante largas sesiones de uso intensivo.</p><p>Ya sea que estés construyendo un PC de gaming o de trabajo, el NZXT H510 ofrece un equilibrio perfecto entre forma y función, asegurando que tu sistema no solo luzca bien, sino que también funcione de manera óptima en todo momento.</p><p><strong>¡Dale vida a tu construcción con la caja NZXT H510 y disfruta de un diseño elegante y una funcionalidad excepcional en tu sistema!</strong></p>', 79.99, 10, 0, 1, 1),
(16, 'Webcam Logitech C920 HD Pro', '<p><i>¡Calidad de video excepcional para tus videollamadas, transmisiones y grabaciones!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Resolución:</strong> Full HD 1080p para imágenes nítidas y claras</li><li><strong>Corrección automática de iluminación:</strong> Garantiza una calidad de imagen óptima en cualquier entorno</li><li><strong>Lente de cristal y enfoque automático:</strong> Para una calidad de imagen consistente</li><li><strong>Conexión:</strong> USB plug-and-play para una instalación rápida y sencilla</li><li><strong>Compatibilidad:</strong> Con una amplia variedad de aplicaciones de video</li></ul><p><strong>Descripción:</strong></p><p>La webcam Logitech C920 HD Pro es la elección perfecta para usuarios que buscan una calidad de video excepcional para sus videollamadas, transmisiones y grabaciones. Con resolución Full HD 1080p, esta webcam captura imágenes nítidas y claras que te permiten lucir lo mejor posible en cualquier situación.</p><p>La corrección automática de iluminación garantiza una calidad de imagen óptima en cualquier entorno, ajustando automáticamente la exposición para adaptarse a las condiciones de iluminación ambiental. Además, la lente de cristal y el enfoque automático aseguran una calidad de imagen consistente en todo momento, sin importar la distancia a la que te encuentres de la cámara.</p><p>Con conexión USB plug-and-play, la Logitech C920 HD Pro se instala rápida y fácilmente en tu computadora, sin necesidad de instalar controladores adicionales. Además, es compatible con una amplia variedad de aplicaciones de video, lo que te permite utilizarla con tus programas favoritos para videollamadas, transmisiones en vivo y grabaciones de video.</p><p><strong>¡Confía en la Logitech C920 HD Pro para ofrecerte una calidad de video excepcional en todas tus actividades de video online!</strong></p>', 69.99, 0, 0, 1, 1),
(17, 'Auriculares inalámbricos HyperX Cloud Flight', '<p><i>¡Rendimiento de audio superior y comodidad duradera para largas sesiones de juego!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Sonido envolvente 7.1 virtual:</strong> Para una experiencia de audio inmersiva</li><li><strong>Controladores de 50mm:</strong> Proporcionan una claridad excepcional</li><li><strong>Batería de larga duración:</strong> Hasta 30 horas de reproducción continua</li><li><strong>Diseño ligero y almohadillas de espuma viscoelástica:</strong> Para una comodidad óptima</li></ul><p><strong>Descripción:</strong></p><p>Los auriculares inalámbricos HyperX Cloud Flight ofrecen un rendimiento de audio superior y una comodidad duradera que los convierte en la elección perfecta para largas sesiones de juego.</p><p>Equipados con sonido envolvente 7.1 virtual y potentes controladores de 50mm, estos auriculares ofrecen una experiencia de audio inmersiva con una claridad excepcional. Ya sea que estés sumergido en el fragor de la batalla o disfrutando de tu música favorita, los Cloud Flight te proporcionan un sonido envolvente que te sumerge completamente en el juego.</p><p>Además, su batería de larga duración ofrece hasta 30 horas de reproducción continua, lo que te permite jugar sin interrupciones durante todo el día. Olvídate de preocuparte por la duración de la batería y concéntrate en lo que realmente importa: tu juego.</p><p>Con un diseño ligero y almohadillas de espuma viscoelástica, los Cloud Flight garantizan una comodidad óptima incluso durante las sesiones de juego más intensas. No importa cuánto tiempo juegues, estos auriculares están diseñados para mantenerse cómodos y adaptables a tus necesidades.</p><p><strong>¡Hazte con los auriculares HyperX Cloud Flight y lleva tu experiencia de juego al siguiente nivel con un audio de alta calidad y una comodidad excepcional!</strong></p>', 149.99, 5, 0, 1, 1),
(18, 'Impresora multifunción HP LaserJet Pro MFP M428fdw', '<p><i>¡Impresión rápida, escaneo de alta calidad, copia y fax en un dispositivo compacto y fácil de usar!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Impresión rápida:</strong> Hasta 40 páginas por minuto</li><li><strong>Conectividad:</strong> WiFi y Ethernet para entornos de oficina ocupados</li><li><strong>Alimentador automático de documentos:</strong> Para hasta 50 hojas</li><li><strong>Impresión a doble cara automática:</strong> Ahorra tiempo y papel</li><li><strong>Calidad HP confiable:</strong> Impresiones nítidas y claras</li></ul><p><strong>Descripción:</strong></p><p>La impresora multifunción HP LaserJet Pro MFP M428fdw ofrece una combinación excepcional de impresión rápida, escaneo de alta calidad, copia y fax, todo en un dispositivo compacto y fácil de usar que es perfecto para entornos de oficina ocupados.</p><p>Con una velocidad de impresión de hasta 40 páginas por minuto, esta impresora garantiza que tus documentos se impriman rápidamente y sin demoras, lo que te permite mantener la productividad en tu lugar de trabajo. Además, la conectividad WiFi y Ethernet te permite imprimir fácilmente desde múltiples dispositivos y compartir la impresora en toda la red de la oficina.</p><p>El alimentador automático de documentos de 50 hojas facilita el escaneo y la copia de documentos de varias páginas, mientras que la capacidad para imprimir a doble cara de forma automática te ayuda a ahorrar tiempo y papel, reduciendo el impacto ambiental de tus impresiones.</p><p>Con la calidad de impresión HP confiable, puedes estar seguro de que tus documentos se verán nítidos y claros en todo momento, lo que garantiza resultados profesionales en cada impresión, escaneo o copia.</p><p><strong>¡Aumenta la productividad en tu lugar de trabajo con la impresora HP LaserJet Pro MFP M428fdw y disfruta de un rendimiento excepcional en todas tus tareas de impresión y escaneo!</strong></p>', 349.99, 15, 0, 1, 1),
(19, 'Kit de herramientas de reparación de PC iFixit Pro Tech Toolkit', '<p><i>¡Todo lo que necesitas para reparar ordenadores, teléfonos y dispositivos electrónicos!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Variedad de herramientas:</strong> Más de 70 piezas, incluyendo destornilladores, pinzas y palancas</li><li><strong>Facilidad y seguridad:</strong> Diseñado para desmontar y reparar dispositivos con facilidad y seguridad</li><li><strong>Portabilidad:</strong> Diseño compacto y duradero, fácil de transportar y almacenar</li><li><strong>Versatilidad:</strong> Adecuado para profesionales de la reparación y entusiastas del bricolaje</li></ul><p><strong>Descripción:</strong></p><p>El kit de herramientas de reparación de PC iFixit Pro Tech Toolkit proporciona todo lo que necesitas para desmontar y reparar ordenadores, teléfonos y otros dispositivos electrónicos con facilidad y seguridad.</p><p>Con más de 70 piezas cuidadosamente seleccionadas, incluyendo destornilladores de precisión, pinzas antiestáticas, palancas de apertura y herramientas de corte, este kit te ofrece una variedad de opciones para abordar cualquier tarea de reparación.</p><p>Diseñado con la facilidad y la seguridad en mente, cada herramienta en el kit está diseñada para permitirte desmontar y reparar dispositivos de manera efectiva, sin dañar componentes sensibles.</p><p>Además, su diseño compacto y duradero hace que sea fácil de transportar y almacenar, lo que te permite llevar tus herramientas contigo dondequiera que vayas.</p><p>Ya seas un profesional de la reparación o un entusiasta del bricolaje, el iFixit Pro Tech Toolkit es una adición indispensable a tu arsenal de herramientas, asegurando que estés preparado para abordar cualquier proyecto de reparación con confianza y precisión.</p><p><strong>¡Obtén el iFixit Pro Tech Toolkit y mantén tus dispositivos electrónicos en perfecto estado con las herramientas adecuadas para el trabajo!</strong></p>', 69.99, 0, 0, 1, 1),
(20, 'Router WiFi TP-Link Archer AX6000', '<p><i>¡Velocidades ultrarrápidas y cobertura excepcional para tus dispositivos conectados!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Tecnología WiFi 6:</strong> Velocidades de hasta 6 Gbps para un rendimiento superior</li><li><strong>Potente procesador:</strong> Cuatro núcleos para un funcionamiento eficiente</li><li><strong>Ocho antenas de alta ganancia:</strong> Garantizan una conectividad confiable en todo el hogar u oficina</li><li><strong>Funcionalidades avanzadas:</strong> Beamforming, MU-MIMO y configuración fácil con la aplicación Tether</li></ul><p><strong>Descripción:</strong></p><p>El router WiFi TP-Link Archer AX6000 ofrece velocidades ultrarrápidas y una cobertura excepcional para satisfacer las necesidades de tus dispositivos conectados, ya sea para gaming, streaming o descargas intensivas.</p><p>Con tecnología WiFi 6 y velocidades de hasta 6 Gbps, este router proporciona un rendimiento superior que te permite disfrutar de una conexión estable y rápida en todo momento. Ya no tendrás que preocuparte por las interrupciones durante tus sesiones de gaming o streaming.</p><p>Equipado con un potente procesador de cuatro núcleos, el Archer AX6000 garantiza un funcionamiento eficiente y sin problemas incluso con múltiples dispositivos conectados simultáneamente. Además, sus ocho antenas de alta ganancia aseguran una conectividad confiable en todo tu hogar u oficina, eliminando los puntos muertos y proporcionando una cobertura uniforme en todas las áreas.</p><p>Con características avanzadas como Beamforming y MU-MIMO, este router optimiza la señal y la distribuye de manera inteligente para mejorar el rendimiento y la estabilidad de la red. Además, su configuración es fácil gracias a la aplicación Tether, que te permite gestionar y controlar tu red desde cualquier lugar a través de tu dispositivo móvil.</p><p><strong>¡Obtén el TP-Link Archer AX6000 y experimenta una conectividad inigualable para todos tus dispositivos conectados en tu hogar u oficina!</strong></p>', 299.99, 10, 0, 1, 1),
(21, 'Adaptador Bluetooth USB Avantree DG60', '<p><i>¡Agrega conectividad Bluetooth a tu PC de forma rápida y sencilla!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Tecnología Bluetooth 5.0:</strong> Para una conexión estable y de alta calidad</li><li><strong>Soporte aptX y aptX HD:</strong> Ofrece una calidad de audio excepcional</li><li><strong>Diseño compacto:</strong> Plug-and-play para una instalación sin problemas</li><li><strong>Compatibilidad universal:</strong> Funciona con cualquier sistema compatible con USB</li></ul><p><strong>Descripción:</strong></p><p>El adaptador Bluetooth USB Avantree DG60 es la solución perfecta para agregar conectividad Bluetooth a tu PC de forma rápida y sencilla, permitiéndote disfrutar de una calidad de audio excepcional en tus auriculares y altavoces inalámbricos.</p><p>Con tecnología Bluetooth 5.0, este adaptador ofrece una conexión estable y confiable, lo que te permite disfrutar de una transmisión de audio sin cortes ni interferencias. Además, con el soporte de baja latencia aptX y aptX HD, puedes disfrutar de una calidad de audio superior, con un sonido claro y nítido, incluso al escuchar música o ver películas.</p><p>Su diseño compacto y plug-and-play garantiza una instalación sin problemas en cualquier sistema compatible con USB, sin necesidad de instalar controladores adicionales. Simplemente conéctalo a un puerto USB disponible y estarás listo para disfrutar de todas las ventajas de la conectividad Bluetooth en tu PC.</p><p>Ya sea que estés escuchando música, viendo películas o jugando juegos, el adaptador Bluetooth Avantree DG60 te ofrece una conexión confiable y de alta calidad, asegurando una experiencia de audio inalámbrica sin igual en tu PC.</p><p><strong>¡Hazte con el Avantree DG60 y lleva la experiencia de audio de tu PC al siguiente nivel con la conectividad Bluetooth de alta calidad!</strong></p>', 24.99, 0, 0, 1, 1),
(22, 'Cable HDMI 2.1 de 3 metros Ultra High Speed', '<p><i>¡Conexión confiable y de alta calidad para tus dispositivos compatibles!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Resolución 8K:</strong> Soporte para una experiencia visual impresionante</li><li><strong>HDR y frecuencias de actualización de hasta 120Hz:</strong> Para una calidad de imagen excepcional</li><li><strong>Construcción duradera:</strong> Garantiza una transmisión de señal estable</li><li><strong>Conectores chapados en oro:</strong> Para una conexión sin interferencias</li></ul><p><strong>Descripción:</strong></p><p>El cable HDMI 2.1 de 3 metros Ultra High Speed proporciona una conexión confiable y de alta calidad para tus dispositivos compatibles, permitiéndote disfrutar de una experiencia visual impresionante en resolución 8K, HDR y frecuencias de actualización de hasta 120Hz.</p><p>Con soporte para resolución 8K, este cable te sumerge en una calidad de imagen sin precedentes, mostrando cada detalle con una claridad impresionante. Además, el HDR (High Dynamic Range) ofrece colores más vibrantes y un contraste mejorado, mientras que las frecuencias de actualización de hasta 120Hz garantizan una reproducción suave y fluida de imágenes en movimiento rápido.</p><p>Su construcción duradera y los conectores chapados en oro garantizan una transmisión de señal estable y sin interferencias, lo que te permite disfrutar de una calidad de imagen y sonido excepcional en todo momento.</p><p>Ya sea que estés conectando tu consola de juegos, reproductor de Blu-ray o PC a tu televisor o monitor, el cable HDMI Ultra High Speed te ofrece la mejor calidad de imagen y sonido, asegurando una experiencia de entretenimiento inigualable.</p><p><strong>¡Hazte con el cable HDMI Ultra High Speed y lleva la calidad de imagen y sonido de tus dispositivos al siguiente nivel!</strong></p>', 19.99, 0, 0, 1, 1),
(23, 'Hub USB-C Anker PowerExpand+ 7-in-1', '<p><i>¡Expande la conectividad de tu dispositivo USB-C con una amplia variedad de puertos!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Puertos HDMI y USB 3.0:</strong> Para conectar múltiples dispositivos simultáneamente</li><li><strong>Lector de tarjetas SD/microSD:</strong> Para acceder fácilmente a tus archivos multimedia</li><li><strong>Carga passthrough de 100W:</strong> Para cargar tu dispositivo USB-C mientras usas el hub</li><li><strong>Diseño compacto y elegante:</strong> Fácil de transportar y usar en cualquier lugar</li></ul><p><strong>Descripción:</strong></p><p>El hub USB-C Anker PowerExpand+ 7-in-1 te proporciona una amplia variedad de puertos para expandir la conectividad de tu dispositivo USB-C, ofreciéndote la versatilidad que necesitas en cualquier situación.</p><p>Con puertos HDMI y USB 3.0, este hub te permite conectar múltiples dispositivos simultáneamente, desde monitores externos y unidades flash hasta ratones y teclados. Además, el lector de tarjetas SD/microSD te permite acceder fácilmente a tus archivos multimedia, simplificando la transferencia de fotos, videos y otros documentos.</p><p>La función de carga passthrough de 100W te permite cargar tu dispositivo USB-C mientras usas el hub, asegurando que nunca te quedes sin energía mientras trabajas o disfrutas de tu contenido multimedia favorito.</p><p>Su diseño compacto y elegante hace que sea fácil de transportar y usar en cualquier lugar, ya sea en la oficina, en casa o mientras viajas. Simplemente conéctalo a tu dispositivo USB-C y disfruta de una conectividad expandida en un abrir y cerrar de ojos.</p><p>Ya sea que estés trabajando, viendo contenido multimedia o transfiriendo archivos, el hub USB-C Anker PowerExpand+ 7-in-1 te ofrece la versatilidad que necesitas para hacer más en menos tiempo.</p><p><strong>¡Obtén el hub USB-C Anker PowerExpand+ 7-in-1 y expande la conectividad de tu dispositivo USB-C de manera fácil y conveniente!</strong></p>', 49.99, 0, 0, 1, 1),
(43, 'Monitor Gaming ASUS VG248QE 24\" Full HD 144Hz ', '<p><i>¡Experimenta una jugabilidad fluida y sin problemas!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Pantalla de 24 pulgadas y resolución Full HD:</strong> Imágenes nítidas y detalladas</li><li><strong>Frecuencia de actualización de 144Hz:</strong> Jugabilidad suave y sin tearing</li><li><strong>Tecnología de reducción de desenfoque:</strong> Mejora la claridad de las imágenes en movimiento</li><li><strong>Versión de segunda mano:</strong> Opción de calidad a un precio más accesible</li></ul><p><strong>Descripción:</strong></p><p>El monitor ASUS VG248QE es una opción popular entre los jugadores que buscan una experiencia de juego fluida y sin problemas.</p><p>Con una pantalla de 24 pulgadas y resolución Full HD, este monitor ofrece imágenes nítidas y detalladas que te sumergen completamente en tus juegos favoritos. La frecuencia de actualización de 144Hz asegura una jugabilidad suave y sin tearing, lo que te permite disfrutar de tus juegos de manera óptima.</p><p>Además, la tecnología de reducción de desenfoque mejora la claridad de las imágenes en movimiento, lo que te permite ver cada detalle incluso en las escenas más rápidas y exigentes.</p><p>Esta versión de segunda mano del monitor ASUS VG248QE proporciona una excelente opción para aquellos que buscan un monitor de calidad a un precio más accesible. Aunque sea de segunda mano, sigue ofreciendo un rendimiento excepcional y una experiencia de juego inigualable.</p><p><strong>¡Sumérgete en tus juegos favoritos con el monitor ASUS VG248QE y experimenta una jugabilidad fluida y sin problemas como nunca antes!</strong></p>', 199.99, 10, 0, 1, 1),
(44, 'Teclado Mecánico Corsair K70 RGB MK.2 Cherry MX Red', '<p><i>¡Rendimiento excepcional y estética llamativa!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Interruptores Cherry MX Red:</strong> Para una respuesta suave y lineal</li><li><strong>Retroiluminación RGB personalizable:</strong> Crea efectos de iluminación impresionantes</li><li><strong>Construcción premium:</strong> Durabilidad y comodidad garantizadas</li></ul><p><strong>Descripción:</strong></p><p>El teclado mecánico Corsair K70 RGB MK.2 es una opción premium para aquellos que buscan un rendimiento excepcional y una estética llamativa en su configuración de juego o trabajo.</p><p>Equipado con interruptores Cherry MX Red, este teclado ofrece una respuesta suave y lineal que permite una experiencia de escritura cómoda y precisa. Ya sea que estés jugando intensamente o escribiendo durante horas, los interruptores Cherry MX Red proporcionan una sensación consistente y fiable en cada pulsación.</p><p>Además, la retroiluminación RGB personalizable del K70 RGB MK.2 te permite crear efectos de iluminación impresionantes que se adaptan a tu estilo y ambiente. Con la posibilidad de personalizar cada tecla individualmente, puedes crear tu propia combinación de colores y efectos para una experiencia visual única.</p><p>Construido con materiales de alta calidad y una construcción robusta, el Corsair K70 RGB MK.2 no solo ofrece un rendimiento excepcional, sino que también garantiza una durabilidad a largo plazo. Su diseño ergonómico y reposamuñecas desmontable garantizan una comodidad óptima incluso durante sesiones de juego o trabajo prolongadas.</p><p><strong>¡Eleva tu experiencia de escritura y gaming con el teclado mecánico Corsair K70 RGB MK.2 y disfruta de un rendimiento excepcional y una estética impresionante en tu configuración!</strong></p>', 129.99, 0, 0, 1, 1),
(45, 'Impresora Multifunción HP OfficeJet Pro 9015', '<p><i>¡Versatilidad y eficiencia para entornos de oficina doméstica o pequeñas empresas!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Impresión, escaneo, copiado y fax:</strong> Todas las funciones esenciales en un solo dispositivo</li><li><strong>Velocidad de impresión rápida:</strong> Mantén la productividad con resultados rápidos</li><li><strong>Calidad de impresión profesional:</strong> Textos nítidos y gráficos vibrantes</li><li><strong>Impresión móvil:</strong> Accede y controla tu impresora desde dispositivos móviles</li></ul><p><strong>Descripción:</strong></p><p>La impresora multifunción HP OfficeJet Pro 9015 es la opción perfecta para entornos de oficina doméstica o pequeñas empresas que buscan versatilidad y eficiencia en un solo dispositivo.</p><p>Con la capacidad de imprimir, escanear, copiar y enviar faxes, la OfficeJet Pro 9015 ofrece todas las funciones esenciales que necesitas para mantenerte productivo en tu día a día. Ya sea que estés imprimiendo informes, escaneando documentos importantes o copiando materiales para tus reuniones, este dispositivo lo hace todo de manera eficiente.</p><p>Su velocidad de impresión rápida te permite obtener tus documentos en manos en poco tiempo, mientras que la calidad de impresión profesional garantiza textos nítidos y gráficos vibrantes en cada página.</p><p>Además, con funciones avanzadas como la impresión móvil, puedes acceder y controlar tu impresora desde cualquier lugar utilizando tu smartphone o tablet. Esto te brinda la flexibilidad de imprimir desde cualquier lugar de tu hogar u oficina, incluso cuando estás fuera.</p><p>En resumen, la HP OfficeJet Pro 9015 es una opción conveniente y confiable que satisfará todas tus necesidades de impresión diarias, permitiéndote mantener la productividad y la eficiencia en todo momento.</p><p><strong>¡Obtén la HP OfficeJet Pro 9015 y experimenta la versatilidad y eficiencia que necesitas en tu entorno de trabajo!</strong></p>', 149.99, 5, 0, 1, 1),
(46, 'Auriculares Inalámbricos Sony WH-1000XM3 ', '<p><i>¡Sumérgete en una experiencia auditiva excepcional con cancelación de ruido avanzada!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Excelente calidad de sonido:</strong> Disfruta de un audio de alta fidelidad en cada canción</li><li><strong>Cancelación de ruido adaptativa:</strong> Sumérgete en tu música sin distracciones externas</li><li><strong>Diseño ergonómico y almohadillas suaves:</strong> Comodidad garantizada incluso durante largas sesiones de escucha</li><li><strong>Versión de segunda mano:</strong> Una opción premium a un precio más accesible</li></ul><p><strong>Descripción:</strong></p><p>Los auriculares inalámbricos Sony WH-1000XM3 son reconocidos por su excelente calidad de sonido, comodidad y características avanzadas de cancelación de ruido, ofreciendo una experiencia auditiva excepcional en todo momento.</p><p>Con estos auriculares, puedes disfrutar de un audio de alta fidelidad que resalta cada detalle de tu música favorita. Ya sea que estés escuchando tus canciones preferidas o viendo películas, te sumergirás en un sonido envolvente y realista que te cautivará.</p><p>La tecnología de cancelación de ruido adaptativa te permite bloquear de manera inteligente los sonidos externos, permitiéndote sumergirte por completo en tu música sin distracciones. Ya sea en un avión, tren o en la calle, disfrutarás de una experiencia auditiva inmersiva en cualquier entorno.</p><p>Además, el diseño ergonómico y las almohadillas suaves garantizan una experiencia auditiva cómoda incluso durante largas sesiones de escucha. Podrás usar los auriculares durante horas sin sentir fatiga o incomodidad en tus oídos.</p><p>Esta versión de segunda mano de los Sony WH-1000XM3 ofrece una excelente opción para aquellos que buscan auriculares premium a un precio más accesible. Aunque sean de segunda mano, seguirán proporcionando un rendimiento excepcional y una experiencia auditiva de alta calidad que satisfará incluso a los usuarios más exigentes.</p><p><strong>¡Sumérgete en tu música favorita con los auriculares Sony WH-1000XM3 y experimenta una calidad de sonido sin igual en cada canción!</strong></p>', 199.99, 15, 0, 1, 1),
(47, 'Silla de Oficina Ergonómica ', '<p><i>¡Mantén una postura cómoda y saludable durante tus largas horas de trabajo!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Ajustes personalizables:</strong> Altura del asiento, inclinación del respaldo y reposabrazos adaptables</li><li><strong>Diseño acolchado y transpirable:</strong> Comodidad y soporte durante todo el día</li><li><strong>Versión de segunda mano:</strong> Una opción económica y funcional</li></ul><p><strong>Descripción:</strong></p><p>Una silla de oficina ergonómica es esencial para mantener una postura cómoda y saludable durante largas horas de trabajo, y esta silla de segunda mano ofrece todas las características necesarias para asegurar tu comodidad y bienestar.</p><p>Con ajustes personalizables como la altura del asiento, la inclinación del respaldo y los reposabrazos adaptables, puedes configurar la silla según tus necesidades individuales y preferencias ergonómicas. Esto te permite mantener una postura óptima y reducir la fatiga muscular durante tu jornada laboral.</p><p>Además, el diseño acolchado y transpirable de la silla proporciona una comodidad excepcional y un soporte adecuado para tu espalda y cuerpo. Ya sea que estés trabajando en una tarea intensiva o participando en reuniones largas, esta silla te mantendrá cómodo y enfocado durante todo el día.</p><p>Al ser una versión de segunda mano, esta silla ofrece una opción económica y funcional para aquellos que buscan una silla de oficina de calidad sin gastar demasiado. Aunque sea de segunda mano, sigue ofreciendo la funcionalidad y comodidad necesarias para un entorno de trabajo productivo.</p><p><strong>¡Invierte en tu comodidad y bienestar con esta silla de oficina ergonómica de segunda mano y disfruta de una postura saludable durante tus largas horas de trabajo!</strong></p>', 99.99, 0, 0, 1, 1);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`, `id_categoria`, `activo`) VALUES
(48, 'Router WiFi Mesh Google Nest WiFi ', '<p><i>¡Cobertura confiable y rápida en todo tu hogar!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Tecnología de malla:</strong> Elimina los puntos muertos y garantiza una conexión estable en todas partes</li><li><strong>Diseño elegante y compacto:</strong> Se integra perfectamente en cualquier hogar</li><li><strong>Facilidad de uso:</strong> Configuración sencilla y control intuitivo a través de la aplicación</li></ul><p><strong>Descripción:</strong></p><p>El router WiFi Mesh Google Nest WiFi es la solución perfecta para garantizar una cobertura confiable y rápida en todo tu hogar.</p><p>Gracias a su tecnología de malla, el Nest WiFi crea una red inalámbrica unificada que elimina los puntos muertos y garantiza una conexión estable en todas partes. Ya no tendrás que preocuparte por las áreas de tu hogar donde la señal WiFi es débil, ya que el Nest WiFi extiende la cobertura de manera inteligente para garantizar que todos tus dispositivos estén conectados sin problemas.</p><p>Además de su rendimiento excepcional, el Nest WiFi cuenta con un diseño elegante y compacto que se integra perfectamente en cualquier ambiente hogareño. Con su aspecto moderno y discreto, este router no solo proporciona una excelente conectividad, sino que también mejora la estética de tu hogar.</p><p>La configuración del Nest WiFi es rápida y sencilla, y puedes controlar fácilmente tu red a través de la aplicación Google Home. Desde la configuración inicial hasta la gestión de dispositivos y la supervisión del rendimiento de la red, todo se puede hacer de forma intuitiva desde tu smartphone.</p><p>En resumen, el router WiFi Mesh Google Nest WiFi es la opción ideal para aquellos que buscan una cobertura confiable y rápida en todo su hogar, con un diseño elegante y fácil de usar.</p><p><strong>¡Obtén el Google Nest WiFi y disfruta de una conexión WiFi estable y rápida en cada rincón de tu hogar!</strong></p>', 149.99, 20, 0, 1, 1),
(49, 'Tableta Gráfica Wacom Intuos Pro ', '<p><i>¡Precisión y control para artistas y diseñadores digitales!</i></p><p><strong>Características destacadas:</strong></p><ul><li><strong>Niveles de presión sensibles a la inclinación:</strong> Permite una creación precisa y fluida</li><li><strong>Sensibilidad táctil:</strong> Mejora la interacción con la tableta</li><li><strong>Diseño ergonómico:</strong> Proporciona comodidad durante largas sesiones de dibujo</li><li><strong>Área activa generosa:</strong> Facilita el trabajo creativo con espacio suficiente</li></ul><p><strong>Descripción:</strong></p><p>La tableta gráfica Wacom Intuos Pro es una herramienta imprescindible para artistas y diseñadores que buscan precisión y control en sus proyectos digitales.</p><p>Con niveles de presión sensibles a la inclinación y sensibilidad táctil, la Intuos Pro te permite crear con precisión y fluidez. Cada trazo que hagas se registra con precisión, lo que te permite expresar tu creatividad de manera completa y sin limitaciones.</p><p>Su diseño ergonómico garantiza que puedas trabajar cómodamente durante largas sesiones de dibujo. Los botones personalizables y el lápiz ergonómico aseguran que tengas acceso rápido a las herramientas que necesitas sin tener que apartar la vista de tu proyecto.</p><p>Además, la Intuos Pro cuenta con un área activa generosa que proporciona espacio suficiente para tus creaciones, permitiéndote trabajar con libertad y precisión.</p><p>Ya sea que estés ilustrando, diseñando o retocando fotografías, la tableta gráfica Wacom Intuos Pro te brinda la herramienta perfecta para llevar tus ideas al mundo digital con facilidad y profesionalismo.</p><p><strong>¡Potencia tu creatividad con la Wacom Intuos Pro y descubre un nuevo nivel de precisión y control en tus proyectos digitales!</strong></p>', 199.99, 15, 0, 1, 1),
(50, 'Vestido', 'vestido de gala', 1000.00, 5, 10, 3, 0),
(51, 'Teléfono inteligente HyperX Nexus 2000', '<p><i>¡Potencia y estilo fusionados en un solo dispositivo!</i></p><p><strong>Características principales:</strong></p><p><strong>1. Diseño elegante y ergonómico:</strong> El HyperX Nexus 2000 presenta un diseño moderno y ergonómico, con líneas suaves y acabados premium que se adaptan perfectamente a tu mano.</p><p><strong>2. Pantalla de alta definición:</strong> Disfruta de una experiencia visual inigualable con la pantalla Super AMOLED de 6.5 pulgadas del Nexus 2000, que ofrece colores vivos y negros profundos.</p><p><strong>3. Rendimiento excepcional:</strong> Equipado con un potente procesador Octa-Core y 8 GB de RAM, el Nexus 2000 ofrece un rendimiento fluido y sin interrupciones, incluso con las aplicaciones y juegos más exigentes.</p><p><strong>4. Almacenamiento ampliable:</strong> Con 256 GB de almacenamiento interno, tendrás espacio más que suficiente para tus fotos, videos, música y aplicaciones. Además, la ranura para tarjeta microSD te permite expandir el almacenamiento hasta 1 TB.</p><p><strong>5. Cámara versátil de triple lente:</strong> Captura cada momento con una calidad excepcional gracias al sistema de cámara triple del Nexus 2000, que incluye un sensor principal de 64 MP, un gran angular de 12 MP y un teleobjetivo de 8 MP. Además, la cámara frontal de 32 MP es perfecta para selfies y videollamadas.</p><p><strong>6. Batería de larga duración:</strong> Con una batería de 5000 mAh, el Nexus 2000 te ofrece una autonomía excepcional para que puedas disfrutar de tu dispositivo durante todo el día sin preocuparte por quedarte sin energía.</p><p><strong>7. Seguridad avanzada:</strong> Mantén tus datos seguros con el lector de huellas dactilares integrado y la tecnología de reconocimiento facial del Nexus 2000, que garantizan un acceso rápido y seguro a tu dispositivo.</p><p><strong>8. Conectividad completa:</strong> El Nexus 2000 es compatible con 5G, Wi-Fi 6, Bluetooth 5.2 y NFC, ofreciéndote una conectividad rápida y fiable en cualquier situación.</p><p><strong>¡Hazte con el HyperX Nexus 2000 y lleva tu experiencia móvil al siguiente nivel!</strong></p>', 325.00, 20, 10, 3, 0),
(52, 'Teléfono inteligente HyperX Nexus 2000', '<p><i>¡Potencia y estilo fusionados en un solo dispositivo!</i></p><p><strong>Características principales:</strong></p><p><strong>1. Diseño elegante y ergonómico:</strong> El HyperX Nexus 2000 presenta un diseño moderno y ergonómico, con líneas suaves y acabados premium que se adaptan perfectamente a tu mano.</p><p><strong>2. Pantalla de alta definición:</strong> Disfruta de una experiencia visual inigualable con la pantalla Super AMOLED de 6.5 pulgadas del Nexus 2000, que ofrece colores vivos y negros profundos.</p><p><strong>3. Rendimiento excepcional:</strong> Equipado con un potente procesador Octa-Core y 8 GB de RAM, el Nexus 2000 ofrece un rendimiento fluido y sin interrupciones, incluso con las aplicaciones y juegos más exigentes.</p><p><strong>4. Almacenamiento ampliable:</strong> Con 256 GB de almacenamiento interno, tendrás espacio más que suficiente para tus fotos, videos, música y aplicaciones. Además, la ranura para tarjeta microSD te permite expandir el almacenamiento hasta 1 TB.</p><p><strong>5. Cámara versátil de triple lente:</strong> Captura cada momento con una calidad excepcional gracias al sistema de cámara triple del Nexus 2000, que incluye un sensor principal de 64 MP, un gran angular de 12 MP y un teleobjetivo de 8 MP. Además, la cámara frontal de 32 MP es perfecta para selfies y videollamadas.</p><p><strong>6. Batería de larga duración:</strong> Con una batería de 5000 mAh, el Nexus 2000 te ofrece una autonomía excepcional para que puedas disfrutar de tu dispositivo durante todo el día sin preocuparte por quedarte sin energía.</p><p><strong>7. Seguridad avanzada:</strong> Mantén tus datos seguros con el lector de huellas dactilares integrado y la tecnología de reconocimiento facial del Nexus 2000, que garantizan un acceso rápido y seguro a tu dispositivo.</p><p><strong>8. Conectividad completa:</strong> El Nexus 2000 es compatible con 5G, Wi-Fi 6, Bluetooth 5.2 y NFC, ofreciéndote una conectividad rápida y fiable en cualquier situación.</p><p><strong>¡Hazte con el HyperX Nexus 2000 y lleva tu experiencia móvil al siguiente nivel!</strong></p>', 325.00, 20, 10, 3, 0),
(53, ' Licuadora TurboBlend 3000', '<p><i>¡Potencia y versatilidad para tus preparaciones culinarias!</i></p><p><strong>Características destacadas:</strong></p><p><strong>1. Motor de alto rendimiento:</strong> La TurboBlend 3000 está equipada con un motor de 1000 vatios que garantiza un rendimiento excepcional, triturando rápidamente incluso los ingredientes más duros.</p><p><strong>2. Jarra resistente y capaz:</strong> Su jarra de vidrio templado con capacidad para 2 litros es resistente a temperaturas extremas y apta para lavavajillas, lo que la hace ideal para preparar grandes cantidades de alimentos sin preocupaciones.</p><p><strong>3. Cuchillas de acero inoxidable:</strong> Las cuchillas de acero inoxidable de alta calidad están diseñadas para triturar, mezclar y pulverizar ingredientes con facilidad, asegurando una textura uniforme en tus recetas.</p><p><strong>4. Control de velocidad variable:</strong> Con su dial de control de velocidad variable, puedes ajustar la potencia según tus necesidades, desde una mezcla suave hasta una pulverización potente, para obtener resultados precisos en cada preparación.</p><p><strong>5. Funciones preprogramadas:</strong> La TurboBlend 3000 cuenta con funciones preprogramadas para batidos, sopas y salsas, facilitando aún más la preparación de tus recetas favoritas con solo pulsar un botón.</p><p><strong>6. Sistema de seguridad inteligente:</strong> El sistema de seguridad integrado garantiza un funcionamiento seguro, evitando que la licuadora se active si la jarra no está correctamente colocada o si la tapa no está bien cerrada.</p><p><strong>7. Diseño elegante y funcional:</strong> Con un diseño elegante y moderno que se adapta a cualquier cocina, la TurboBlend 3000 combina estilo y funcionalidad para convertirse en un accesorio imprescindible en tu hogar.</p><p><strong>8. Accesorios adicionales:</strong> Incluye un práctico empujador para ayudar a procesar ingredientes sin necesidad de detener la licuadora, así como una tapa hermética para almacenar tus preparaciones con comodidad.</p><p><strong>¡Hazte con la Licuadora TurboBlend 3000 y lleva tus creaciones culinarias al siguiente nivel!</strong></p>', 100.00, 50, 5, 3, 0),
(54, 'Mesa EleganceCraft Aura', '<p><i>¡La combinación perfecta de estilo y funcionalidad para tu hogar!</i></p><p><strong>Características destacadas:</strong></p><p><strong>1. Diseño contemporáneo y elegante:</strong> La mesa Aura de EleganceCraft presenta un diseño moderno y sofisticado que añade un toque de estilo a cualquier espacio, ya sea en el comedor, la sala de estar o la oficina.</p><p><strong>2. Construcción robusta y duradera:</strong> Fabricada con materiales de alta calidad, como madera maciza de roble y acero inoxidable, esta mesa garantiza una estructura sólida y resistente que perdurará a lo largo del tiempo.</p><p><strong>3. Superficie espaciosa:</strong> Con una amplia superficie de 180 cm x 90 cm, la mesa Aura proporciona espacio más que suficiente para compartir comidas en familia, realizar trabajos manuales o reuniones de trabajo.</p><p><strong>4. Acabado premium:</strong> El acabado liso y pulido de la mesa, combinado con detalles en acero inoxidable, resalta su calidad y añade un toque de lujo a cualquier ambiente.</p><p><strong>5. Funcionalidad versátil:</strong> Ya sea como mesa de comedor, escritorio de trabajo o centro de entretenimiento, la versatilidad de la mesa Aura la convierte en un elemento imprescindible en cualquier hogar u oficina.</p><p><strong>6. Fácil montaje y mantenimiento:</strong> Con instrucciones claras y sencillas, el montaje de la mesa Aura es rápido y sin complicaciones. Además, su superficie fácil de limpiar permite un mantenimiento sin esfuerzo.</p><p><strong>7. Patas ajustables:</strong> Las patas de acero inoxidable de la mesa Aura vienen equipadas con niveladores ajustables, que garantizan estabilidad incluso en superficies irregulares.</p><p><strong>8. Opciones de personalización:</strong> Disponible en una variedad de acabados y colores de madera, así como en diferentes tamaños, para adaptarse a tus necesidades y preferencias específicas.</p><p><strong>¡Hazte con la Mesa EleganceCraft Aura y eleva el estilo y la funcionalidad de tu espacio!</strong></p>', 40.00, 5, 5, 3, 0),
(55, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', '<p>La laptop HP Pavilion 15-eh0022la es una opción atractiva para aquellos que buscan un equilibrio entre rendimiento y portabilidad en el mercado de segunda mano. Con un procesador AMD Ryzen 5, 8GB de RAM y un SSD de 512GB, ofrece un rendimiento rápido y receptivo para tus tareas diarias. Su pantalla de 15.6 pulgadas con resolución Full HD y su diseño delgado y ligero hacen que sea fácil de llevar contigo a todas partes.</p>', 499.99, 0, 0, 1, 0),
(56, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', '<p>La laptop HP Pavilion 15-eh0022la es una opción atractiva para aquellos que buscan un equilibrio entre rendimiento y portabilidad en el mercado de segunda mano. Con un procesador AMD Ryzen 5, 8GB de RAM y un SSD de 512GB, ofrece un rendimiento rápido y receptivo para tus tareas diarias. Su pantalla de 15.6 pulgadas con resolución Full HD y su diseño delgado y ligero hacen que sea fácil de llevar contigo a todas partes.</p>', 499.99, 0, 0, 1, 0),
(57, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', '<p>La laptop HP Pavilion 15-eh0022la es una opción atractiva para aquellos que buscan un equilibrio entre rendimiento y portabilidad en el mercado de segunda mano. Con un procesador AMD Ryzen 5, 8GB de RAM y un SSD de 512GB, ofrece un rendimiento rápido y receptivo para tus tareas diarias. Su pantalla de 15.6 pulgadas con resolución Full HD y su diseño delgado y ligero hacen que sea fácil de llevar contigo a todas partes.</p>', 499.99, 0, 0, 1, 0),
(58, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', '<p>La laptop HP Pavilion 15-eh0022la es una opción atractiva para aquellos que buscan un equilibrio entre rendimiento y portabilidad en el mercado de segunda mano. Con un procesador AMD Ryzen 5, 8GB de RAM y un SSD de 512GB, ofrece un rendimiento rápido y receptivo para tus tareas diarias. Su pantalla de 15.6 pulgadas con resolución Full HD y su diseño delgado y ligero hacen que sea fácil de llevar contigo a todas partes.</p>', 499.99, 0, 0, 1, 0),
(59, 'Laptop HP Pavilion 15-eh0022la AMD Ryzen 5 8GB RAM 512GB SSD Win10', '<p>La laptop HP Pavilion 15-eh0022la es una opción atractiva para aquellos que buscan un equilibrio entre rendimiento y portabilidad en el mercado de segunda mano. Con un procesador AMD Ryzen 5, 8GB de RAM y un SSD de 512GB, ofrece un rendimiento rápido y receptivo para tus tareas diarias. Su pantalla de 15.6 pulgadas con resolución Full HD y su diseño delgado y ligero hacen que sea fácil de llevar contigo a todas partes.</p>', 499.99, 0, 0, 1, 0),
(60, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', '<p>Esta tarjeta gráfica RX 580 de AMD Radeon es una excelente opción para aquellos que buscan un rendimiento sólido a un precio asequible en el mercado de segunda mano. Con 8GB de memoria GDDR5, ofrece un rendimiento gráfico fluido y una calidad visual impresionante en una amplia variedad de juegos y aplicaciones. Equipada con tecnología AMD Radeon FreeSync, proporciona una experiencia de juego sin tearing y sin stuttering para una jugabilidad suave y sin interrupciones. Si buscas un rendimiento sólido a un precio aún más accesible, esta tarjeta de segunda mano es una excelente opción.</p>', 199.99, 10, 0, 1, 0),
(61, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', '<p>Esta tarjeta gráfica RX 580 de AMD Radeon es una excelente opción para aquellos que buscan un rendimiento sólido a un precio asequible en el mercado de segunda mano. Con 8GB de memoria GDDR5, ofrece un rendimiento gráfico fluido y una calidad visual impresionante en una amplia variedad de juegos y aplicaciones. Equipada con tecnología AMD Radeon FreeSync, proporciona una experiencia de juego sin tearing y sin stuttering para una jugabilidad suave y sin interrupciones. Si buscas un rendimiento sólido a un precio aún más accesible, esta tarjeta de segunda mano es una excelente opción.</p>', 199.99, 10, 0, 1, 0),
(62, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', '<p>Esta tarjeta gráfica RX 580 de AMD Radeon es una excelente opción para aquellos que buscan un rendimiento sólido a un precio asequible en el mercado de segunda mano. Con 8GB de memoria GDDR5, ofrece un rendimiento gráfico fluido y una calidad visual impresionante en una amplia variedad de juegos y aplicaciones. Equipada con tecnología AMD Radeon FreeSync, proporciona una experiencia de juego sin tearing y sin stuttering para una jugabilidad suave y sin interrupciones. Si buscas un rendimiento sólido a un precio aún más accesible, esta tarjeta de segunda mano es una excelente opción.</p>', 199.99, 10, 0, 1, 0),
(63, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', '<p>Esta tarjeta gráfica RX 580 de AMD Radeon es una excelente opción para aquellos que buscan un rendimiento sólido a un precio asequible en el mercado de segunda mano. Con 8GB de memoria GDDR5, ofrece un rendimiento gráfico fluido y una calidad visual impresionante en una amplia variedad de juegos y aplicaciones. Equipada con tecnología AMD Radeon FreeSync, proporciona una experiencia de juego sin tearing y sin stuttering para una jugabilidad suave y sin interrupciones. Si buscas un rendimiento sólido a un precio aún más accesible, esta tarjeta de segunda mano es una excelente opción.</p>', 199.99, 10, 0, 1, 0),
(64, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', '<p>Esta tarjeta gráfica RX 580 de AMD Radeon es una excelente opción para aquellos que buscan un rendimiento sólido a un precio asequible en el mercado de segunda mano. Con 8GB de memoria GDDR5, ofrece un rendimiento gráfico fluido y una calidad visual impresionante en una amplia variedad de juegos y aplicaciones. Equipada con tecnología AMD Radeon FreeSync, proporciona una experiencia de juego sin tearing y sin stuttering para una jugabilidad suave y sin interrupciones. Si buscas un rendimiento sólido a un precio aún más accesible, esta tarjeta de segunda mano es una excelente opción.</p>', 199.99, 10, 0, 1, 0),
(65, 'Tarjeta Gráfica Video Rx 580 8gb Hdmi Amd Radeon', '<p>Esta tarjeta gráfica RX 580 de AMD Radeon es una excelente opción para aquellos que buscan un rendimiento sólido a un precio asequible en el mercado de segunda mano. Con 8GB de memoria GDDR5, ofrece un rendimiento gráfico fluido y una calidad visual impresionante en una amplia variedad de juegos y aplicaciones. Equipada con tecnología AMD Radeon FreeSync, proporciona una experiencia de juego sin tearing y sin stuttering para una jugabilidad suave y sin interrupciones. Si buscas un rendimiento sólido a un precio aún más accesible, esta tarjeta de segunda mano es una excelente opción.</p>', 199.99, 10, 0, 1, 0),
(66, 'Laptop', '<p>Laptop</p>', 10.00, 10, 10, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `activacion` int(11) NOT NULL DEFAULT 0,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` int(11) NOT NULL DEFAULT 0,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `activacion`, `token`, `token_password`, `password_request`, `id_cliente`) VALUES
(1, 'Neeko', '$2y$10$kdsYQs3Qqsm4lUpQE0FxGOeq68jIdQrZi8pio6ANTmn8CFFhriHjW', 1, '', 'f6743bdb52d4eb2f8ca77bc4a097b74f', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `det_prod_caracter`
--
ALTER TABLE `det_prod_caracter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_det_prod` (`id_producto`),
  ADD KEY `fk_det_caracter` (`id_caracteristica`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `det_prod_caracter`
--
ALTER TABLE `det_prod_caracter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `det_prod_caracter`
--
ALTER TABLE `det_prod_caracter`
  ADD CONSTRAINT `fk_det_caracter` FOREIGN KEY (`id_caracteristica`) REFERENCES `caracteristicas` (`id`),
  ADD CONSTRAINT `fk_det_prod` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
