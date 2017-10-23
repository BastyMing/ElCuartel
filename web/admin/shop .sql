-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2017 a las 15:00:43
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `name` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `region` int(10) NOT NULL,
  `zip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `address`
--

INSERT INTO `address` (`id`, `customer`, `name`, `address`, `country`, `region`, `zip`, `mobile`, `active`) VALUES
(1, 1, 'sadasds', 'milano #1949', 'Chile', 3, '4812726', '967485655', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `products` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slang`, `products`, `active`) VALUES
(1, 'bebidas', 'bebidas', 0, 1),
(2, 'bebidas2', '', 0, 0),
(3, 'bebidas2', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `off` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `off_type` int(11) NOT NULL,
  `order_min` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile`, `email`, `password`, `active`) VALUES
(1, 'prueba', '9678879798', 'dnh11@outlook.es', 'v7YVDNE_mYNKENiYBXObNaHppUwBY7tI404CUx24BP4,', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `options`
--

INSERT INTO `options` (`id`, `product_id`, `name`, `price`, `active`) VALUES
(1, 1, 'dfafa', '15.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `items` text COLLATE utf8_unicode_ci NOT NULL,
  `net` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `tax` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `shipping` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(99) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `coupon` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `customer` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `address` int(11) NOT NULL,
  `gateway` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `track` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `track_url` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `callback` int(11) NOT NULL DEFAULT '0',
  `seen` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `date`, `items`, `net`, `amount`, `tax`, `shipping`, `discount`, `coupon`, `payment`, `status`, `customer`, `address`, `gateway`, `track`, `track_url`, `remarks`, `callback`, `seen`) VALUES
(1, '23 Oct 2017', '{\"1_1\":{\"id\":\"1\",\"count\":\"1\",\"name\":\"prueba\",\"opt_name\":\"dfafa\",\"price\":\"15.00\",\"stock\":\"50\",\"img\":\"f1410a613c4bfe903e376e978d7b615e.jpg\",\"opt_id\":\"1\",\"shipping\":\"0\",\"region\":\"[\\\"0\\\",\\\"3\\\"]\",\"type\":\"option\"}}', '215.00', '15.00', '0', '200.00', '0', 'None', 2, 2, '1', 1, 'Store Pickup (IP ::1)', '', '', '', 1, 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category` int(20) NOT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `shipping` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(20) NOT NULL,
  `regions` text COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `category`, `tags`, `shipping`, `stock`, `regions`, `active`) VALUES
(1, 'prueba', '50000000.00', 'blah blah blah', 1, '', '20.00', 49, '[\"0\",\"3\"]', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `primary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `active`, `primary`) VALUES
(1, 1, 'f1410a613c4bfe903e376e978d7b615e.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(99) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `setting`, `value`) VALUES
(1, 'website_url', 'http://localhost/web'),
(2, 'web_email', 'dnh11@outlook.es'),
(3, 'invoice_email', 'dnh11@outlook.es'),
(4, 'currency', 'CLP'),
(5, 'currency_symbol', '$'),
(6, 'secret', 'symbiotic'),
(7, 'g_dis', '0'),
(8, 'fb_dis', '0'),
(9, 'shipping_min_items', '1'),
(10, 'max_order_total', '100000000000000000000000'),
(11, 'min_order_total', '0'),
(12, 'shipping_mode', '2'),
(13, 'free_shipping', '0'),
(14, 'tax', ''),
(15, 'fb_app_id', ''),
(16, 'fb_app_secret', ''),
(17, 'fb_url', ''),
(18, 'g_url', ''),
(19, 'mode', ''),
(20, 'rc_private', ''),
(21, 'rc_public', ''),
(22, 'images', '/images/products/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping_regions`
--

CREATE TABLE `shipping_regions` (
  `id` int(11) NOT NULL,
  `name` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `shipping` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `shipping_regions`
--

INSERT INTO `shipping_regions` (`id`, `name`, `zip`, `shipping`, `active`) VALUES
(1, 'National', '', '0', 0),
(2, 'International', '', '0', 0),
(3, 'sdfsfsfs', '4812726', '200.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `latest_login` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `latest_login`, `last_login`, `active`) VALUES
(2, 'admin@admin.com', '7vLLFLNJoftjeeGBqe8FRGzLuSAgERZ3cO99uexidRw,', 1, '', 'Never', 1),
(3, 'stock@admin.com', 'LtrCmTcdZO8cQ1fDWeBW7fSO23n8r21zX9pZP5c4Jok,', 2, '', 'Never', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shipping_regions`
--
ALTER TABLE `shipping_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `shipping_regions`
--
ALTER TABLE `shipping_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
