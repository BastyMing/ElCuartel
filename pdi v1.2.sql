-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2017 a las 04:18:27
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pdi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impo`
--

CREATE TABLE `impo` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `impo`
--

INSERT INTO `impo` (`codigo`, `nombre`, `tipo`, `nivel`) VALUES
(1, 'Cannabis Índica', 'marihuana', 1),
(2, 'Cannabis Ruderalis', 'marihuana', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(20) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `img` text NOT NULL,
  `proveedor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`codigo`, `nombre`, `precio`, `tipo`, `img`, `proveedor`) VALUES
(1, 'Agua Mineral', 1000, 'bebidas', 'https://www.elcielo.cl/images/stories/virtuemart/category/resized/agua-mineral_300x300.jpg', 'El Cielo'),
(2, 'Agua Tonica', 1050, 'bebidas', 'https://www.elcielo.cl/images/stories/virtuemart/category/resized/agua-tonica_300x300.jpg', 'El Cielo'),
(3, 'RON FLOR DE CANA 7A 750CC', 6480, '2', '', 'El Cielo'),
(5, 'RON FLOR DE CANA 5A 1 LITRO', 5860, '2', 'http://www.jumbo.cl/FO_IMGS/gr/889220-ST.jpg', 'El Cielo'),
(6, 'FLOR DE CANA 4A 750CC GOLD', 4500, '2', 'http://www.jumbo.cl/FO_IMGS/gr/947697-ST.jpg', 'El Cielo'),
(7, 'RON HAVANA CLUB A. RVA 750CC', 6860, '2', '', ''),
(8, 'RON HAVANA CLUB A. ESP.', 4110, '2', '', 'El Cielo'),
(9, 'RON BARCELO DORADO 750cc 37.5°', 3950, '2', '', 'El Cielo'),
(10, 'RON BARCELO ANEJO 750cc 37.5°', 4770, '2', '', 'El Cielo'),
(11, 'RON ANGOSTURA AÑEJO 700cc 40°', 12940, '2', 'http://www.jumbo.cl/FO_IMGS/gr/672542-ST.jpg', 'El Cielo'),
(12, 'RON BACARDI ANEJO 750cc 40°', 14590, '2', 'http://www.jumbo.cl/FO_IMGS/gr/1649100-ST.jpg', 'El Cielo'),
(13, 'RON BACARDI DORADO 750cc 40°', 6490, '2', 'http://www.jumbo.cl/FO_IMGS/gr/264125-ST.jpg', 'El Cielo'),
(14, 'RON BOTRAN ANEJO 5A 1 LITRO 40?', 3470, '2', '', 'El Cielo'),
(15, 'RON BRUGAL DORADO 750cc DOMINICANO', 3740, '2', '', 'El Cielo'),
(16, 'RON CRUZAN SABORES 27.5% 750cc', 4100, '2', '', 'El Cielo'),
(17, 'RON MITJANS DORADO 1 LITRO 40°', 2200, '2', 'http://www.jumbo.cl/FO_IMGS/gr/264150-ST.jpg', 'El Cielo'),
(18, 'RON MITJANS DORADO  750cc 40°', 1940, '2', 'http://www.jumbo.cl/FO_IMGS/gr/264150-ST.jpg', 'El Cielo'),
(19, 'RON MULATA ANEJO 700cc 38?', 3470, '2', '', 'El Cielo'),
(20, 'RON SANTA TERESA A?EJO GRAN RVA 750 cc.', 3480, '2', '', 'El Cielo'),
(21, 'RON VIEJO DE CALDAS 3A 700cc 37.5%', 3630, '2', '', 'El Cielo'),
(22, 'VODKA RUSSIAN STANDARD  750cc 40?', 6820, '3', '', 'El Cielo'),
(23, 'VODKA .PL POLISH PREMIUM 700cc 40? ', 2290, '3', '', 'El Cielo'),
(24, 'VODKA .PL SABORES 40% 700cc', 2740, '3', 'http://www.jumbo.cl/FO_IMGS/gr/996687-ST.jpg', 'El Cielo'),
(25, 'VODKA .PL ICE COCTEL 275cc 4.4%', 720, '3', '', 'El Cielo'),
(26, 'VODKA ABSOLUT SUECA ORIGINAL  750cc 40?', 7280, '3', '', 'El Cielo'),
(27, 'VODKA ABSOLUT SABORES 750CC', 7580, '3', '', 'El Cielo'),
(28, 'VODKA BOLSHAYA PREMIUM 750cc 40?', 2840, '3', '', 'El Cielo'),
(29, 'VODKA ERISTOFF  700cc 20? GOLDEN CARAMEL COCTEL', 3340, '3', '', 'El Cielo'),
(30, 'VODKA ERISTOFF  700cc 20° BLACK COCTEL', 3340, '3', 'http://www.jumbo.cl/FO_IMGS/gr/1550035-ST.jpg', 'El Cielo'),
(31, 'VODKA ERISTOFF ORIGINAL  700cc 37.5°', 2160, '3', 'http://www.jumbo.cl/FO_IMGS/gr/1611542-ST.jpg', 'El Cielo'),
(32, 'VODKA GRADUATE PURO 700cc 40?', 3600, '3', '', 'El Cielo'),
(33, 'VODKA MOROZ  100cc 40? MATRIUSHKA C/EST FIGURA', 1590, '3', '', 'El Cielo'),
(34, 'VODKA STOLICHNAYA ORIGINAL   750cc 40°', 6490, '3', 'http://www.jumbo.cl/FO_IMGS/gr/264230-ST.jpg', 'El Cielo'),
(35, 'VODKA STOLICHNAYA SABORES 750CC', 5540, '3', '', 'El Cielo'),
(36, 'VODKA STOLICHNAYA  750cc 37.5° BLUEBERRY', 6710, '3', 'http://www.jumbo.cl/FO_IMGS/gr/1116680-ST.jpg', 'El Cielo'),
(37, 'VODKA GREY GOOSE 750cc 40?  (FRANCES)', 20150, '3', '', 'El Cielo'),
(38, 'RON FLOR DE CANA  4A 1.750cc 40°', 8890, '2', 'http://www.jumbo.cl/FO_IMGS/gr/947697-ST.jpg', 'El Cielo'),
(39, 'RON FLOR DE CANA  5A 1.750cc 40°', 9550, '2', 'http://www.jumbo.cl/FO_IMGS/gr/964982-ST.jpg', 'El Cielo'),
(40, 'RON BACARDI DORADO 1.750cc 40°', 11990, '2', 'http://www.jumbo.cl/FO_IMGS/gr/988418-ST.jpg', 'El Cielo'),
(41, 'RON SANTA TERESA BOT. 1.750cc GRAN RESERVA', 7080, '2', '', 'El Cielo'),
(42, 'RON MITJANS DORADO 1.750cc 40°', 4660, '2', 'http://www.jumbo.cl/FO_IMGS/gr/264150-ST.jpg', 'El Cielo'),
(43, 'RON BARCELO ANEJO 1.750cc 40°', 9210, '2', 'http://www.jumbo.cl/FO_IMGS/gr/669053-ST.jpg', 'El Cielo'),
(44, 'CERVEZA BECKER  354cc LATA 4.5°', 370, '4', '', 'El Cielo'),
(45, 'CERVEZA BECKER 1 LITRO 4.5? DESECHABLE OW', 1090, '4', '', 'El Cielo'),
(46, 'CERVEZA CORONA EXTRA  355cc 4.6° D24', 750, '4', 'http://www.jumbo.cl/FO_IMGS/gr/263529-ST.jpg', 'El Cielo'),
(47, 'CERVEZA CORONA EXTRA  710cc 4.5? IMPORT', 1420, '4', '', 'El Cielo'),
(48, 'CERVEZA STELLA ARTOIS  330cc 5° BOTELLA ', 710, '4', '', 'El Cielo'),
(49, 'CERVEZA STELLA ARTOIS  354cc 4.8° LATA', 660, '4', 'http://www.jumbo.cl/FO_IMGS/gr/738099-ST.jpg', 'El Cielo'),
(50, 'CERVEZA STELLA ARTOIS  975cc 5° BOT. DESECHABLE OW', 1580, '4', 'http://www.jumbo.cl/FO_IMGS/gr/997036-ST.jpg', 'El Cielo'),
(51, 'CERVEZA CUSQUENA  330cc. 4.8° BOT.DESECH.', 710, '4', 'http://www.jumbo.cl/FO_IMGS/gr/1096789-ST.jpg', 'El Cielo'),
(52, 'CERVEZA CUSQUENA  620cc GOLDEN LAGER PREMIUM', 1340, '4', 'http://www.jumbo.cl/FO_IMGS/gr/1562637-ST.jpg', 'El Cielo'),
(53, 'CERVEZA CARLSBERG  330cc 5? LATA', 550, '4', '', 'El Cielo'),
(54, 'CERVEZA CARLSBERG  500cc 5? LATA', 700, '4', '', 'El Cielo'),
(55, 'CERVEZA CARLSBERG  330cc 5? BOT. DESECHABLE', 640, '4', '', 'El Cielo'),
(56, 'CERVEZA LA TRAPPE  330cc 10? QUADRUPEL BOTELLA', 2230, '4', '', 'El Cielo'),
(57, 'CERVEZA LA TRAPPE  330cc 8? TRIPEL BOTELLA', 2010, '4', '', 'El Cielo'),
(58, 'CERVEZA LA TRAPPE  330cc 6.5° BLOND BOTELLA', 1760, '4', 'http://www.jumbo.cl/FO_IMGS/gr/263551-ST.jpg', 'El Cielo'),
(59, 'CERVEZA LA TRAPPE  330cc 6.5? DUBBEL BOTELLA', 1840, '4', '', 'El Cielo'),
(60, 'CERVEZA KROSS PILSEN 330cc 4.6?', 1170, '4', '', 'El Cielo'),
(61, 'CERVEZA KROSS GOLDEN  ALE 330cc', 1140, '4', '', 'El Cielo'),
(62, 'CERVEZA KROSS \"5\" 750cc 7,2° ANIVERSARIO ALE FUERT', 3460, '4', 'http://www.jumbo.cl/FO_IMGS/gr/1003539-ST.jpg', 'El Cielo'),
(63, 'CERVEZA NEGRA MODELO 355cc 5.3?', 790, '4', '', 'El Cielo'),
(64, 'PONY MALTA 330cc  SIN ALCOHOL', 950, '4', 'http://www.jumbo.cl/FO_IMGS/gr/1588054-ST.jpg', 'El Cielo'),
(65, 'CERVEZA AGUILA BOT. 330cc 4%', 1400, '4', '', 'El Cielo'),
(66, 'BOURBON WHISKEY JIM BEAM BLANCO 750cc 40?', 7950, '6', '', 'El Cielo'),
(67, 'BOURBON WHISKEY JIM BEAM NEGRO 750cc 40° E.CARTON', 14100, '6', 'http://www.jumbo.cl/FO_IMGS/gr/963575-ST.jpg', 'El Cielo'),
(68, 'BOURBON WHISKEY JIM BEAM SMALL BATCH 700 cc 40?', 24670, '6', '', 'El Cielo'),
(69, 'WHISKEY JACK DANIELS  750cc 40° EST. CARTON', 17940, '6', 'http://www.jumbo.cl/FO_IMGS/gr/1613700-ST.jpg', 'El Cielo'),
(70, 'WHISKEY JACK DANIELS GENTLEMAN 750cc 40°  S/EST', 26980, '6', 'http://www.jumbo.cl/FO_IMGS/gr/264234-ST.jpg', 'El Cielo'),
(71, 'WHISKY BALLANTINES 6A 750cc 40? FINEST EST. CARTON', 7370, '5', '', 'El Cielo'),
(72, 'WHISKY CHIVAS REGAL 12A 750cc 40° EST.CARTON ', 20060, '5', 'http://www.jumbo.cl/FO_IMGS/gr/264250-ST.jpg', 'El Cielo'),
(73, 'WHISKY 100 PIPERS 750cc 40?', 4460, '5', '', 'El Cielo'),
(74, 'WHISKY ANDREW MCDUFF 700cc 40°', 3300, '5', 'http://www.jumbo.cl/FO_IMGS/gr/264238-ST.jpg', 'El Cielo'),
(75, 'WHISKY BRUCE DOUGLAS 750cc 40°', 3640, '5', 'http://www.jumbo.cl/FO_IMGS/gr/264246-ST.jpg', 'El Cielo'),
(76, 'WHISKY CUTTY SARK  750cc 40? BLACK', 9410, '5', '', 'El Cielo'),
(77, 'WHISKY CUTTY SARK  6A 750cc 40° ORIGINAL E/AMARILL', 5870, '5', 'http://www.jumbo.cl/FO_IMGS/gr/1625161-ST.jpg', 'El Cielo'),
(78, 'WHISKY GRANTS  6A  750cc 40° ESTUCHE CARTON', 5450, '5', 'http://www.jumbo.cl/FO_IMGS/gr/1539384-ST.jpg', 'El Cielo'),
(79, 'WHISKY JAMES KING  3A  750cc 40?', 3020, '5', '', 'El Cielo'),
(80, 'WHISKY FAMOUS BLACK GROUSE 40° 750cc', 11170, '5', 'http://www.jumbo.cl/FO_IMGS/gr/264256-ST.jpg', 'El Cielo'),
(81, 'WHISKY FAMOUS GROUSE  750cc 43? FINEST SCOTCH', 5650, '5', '', 'El Cielo'),
(82, 'WHISKY FAMOUS GROUSE 12A 750cc 43? GOLD RVA ', 19920, '5', '', 'El Cielo'),
(83, 'WHISKY TEACHERS  6A 750cc 40?', 5650, '5', '', 'El Cielo'),
(84, 'LICOR AMARETTO DUVAL 750cc 28?', 2980, '7', '', 'El Cielo'),
(85, 'LICOR AMARETTO FRANCOLI 700cc 28?', 8900, '7', '', 'El Cielo'),
(86, 'LICOR AMARETTO MITJANS  750cc 23?', 3490, '7', '', 'El Cielo'),
(87, 'ABSENTA HILLS 1 LITRO 70? VERDE', 8580, '7', '', 'El Cielo'),
(88, 'ABSENTA HILLS  700cc 70? VERDE', 7580, '7', '', 'El Cielo'),
(89, 'ABSENTA HILLS  700cc 70? DORADO SUAVE', 7580, '7', '', 'El Cielo'),
(90, 'ABSENTA VERDE CON CUCHARA 700cc 70?', 14180, '7', '', 'El Cielo'),
(91, 'AGUARDIENTE ANTIOQUENO 700cc CON O SIN AZUCAR', 5180, '7', '', 'El Cielo'),
(92, 'BAILEYS CREMA DE WHISKY  750cc 17° ORIGINAL', 10550, '7', 'http://www.jumbo.cl/FO_IMGS/gr/263773-ST.jpg', 'El Cielo'),
(93, 'MARTINI ROSSO VERMOUTH 995cc 16?', 2800, '7', '', 'El Cielo'),
(94, 'CACHAZA VELHO BARREIRO BRASILERA 1 LITRO', 2870, '7', '', 'El Cielo'),
(95, 'CACHAZA PITU 1 LITRO 40?', 2290, '7', '', 'El Cielo'),
(96, 'AMARGO ANGOSTURA 100cc 44.7°', 8240, '7', 'http://www.jumbo.cl/FO_IMGS/gr/263836-ST.jpg', 'El Cielo'),
(97, 'COINTREAU LICOR DE NARANJA  750cc 40? FRANCES', 19060, '7', '', 'El Cielo'),
(98, 'COLA DE MONO EL CIELO 645cc 14?', 1570, '7', '', 'El Cielo'),
(99, 'COLA DE MONO EMAN MONTENEGRO 700cc 14?', 1570, '7', '', 'El Cielo'),
(100, 'COGNAC GASTON DE LAGRANGE V.S.O.P.  40? 700cc', 25840, '7', '', 'El Cielo'),
(101, 'CURACAO AZUL DUVAL 750cc 34°', 2980, '7', 'http://www.jumbo.cl/FO_IMGS/gr/263927-ST.jpg', 'El Cielo'),
(102, 'DIGESTIVO LICOR JAGERMEIFTER 35? 700cc', 10450, '7', '', 'El Cielo'),
(103, 'GIN PLYMOUTH  750cc  41.2?', 3340, '7', '', 'El Cielo'),
(104, 'GIN SEAGRAM EXTRA DRY 750cc 40?', 4140, '7', '', 'El Cielo'),
(105, 'JEREZ TIO PEPE 750cc 16?', 10080, '7', '', 'El Cielo'),
(106, 'BRANDY DE JEREZ FUNDADOR 750cc 36°', 7600, '7', 'http://www.jumbo.cl/FO_IMGS/gr/1353515-ST.jpg', 'El Cielo'),
(107, 'TEQUILA SAUZA 750cc 40? BLANCO', 7240, '7', '', 'El Cielo'),
(108, 'TEQUILA SAUZA GOLD 750cc 40?', 6610, '7', '', 'El Cielo'),
(109, 'TEQUILA RANCHO ALEGRE BLANCO 1 Litro 100% AGAVE', 4340, '7', '', 'El Cielo'),
(110, 'LIQUEUR L\"ESPRIT NUVO  750cc 15?', 19780, '7', '', 'El Cielo'),
(111, 'ZALAMERO CENTENARIO SECO 750cc 16?  EX JEREZ', 4410, '7', '', 'El Cielo'),
(112, 'ENERGIZANTE RED BULL 250cc LATA', 950, '9', 'http://www.jumbo.cl/FO_IMGS/gr/448612-ST.jpg', 'El Cielo'),
(113, 'ENERGIZANTE RED BULL 355cc LATA', 1310, '9', 'http://www.jumbo.cl/FO_IMGS/gr/1436542-ST.jpg', 'El Cielo'),
(114, 'ENERGIZANTE SCORE LATA 250cc', 570, '9', '', 'El Cielo'),
(115, 'ENERGIZANTE SCORE LATA 500cc', 760, '9', '', 'El Cielo'),
(116, 'ENERGIZANTE SCORE 1.5 LT', 1720, '9', '', 'El Cielo'),
(117, 'ENERGIZANTE MR. BIG 600cc', 1130, '9', 'http://www.jumbo.cl/FO_IMGS/gr/1530591-ST.jpg', 'El Cielo'),
(118, 'ENERGIZANTE MR. BIG 1.5LT', 2100, '9', 'http://www.jumbo.cl/FO_IMGS/gr/1706557-ST.jpg', 'El Cielo'),
(119, 'ENERGIZANTE MR. BIG ZERO 1.5 LT', 2100, '9', 'http://www.jumbo.cl/FO_IMGS/gr/1615010-ST.jpg', 'El Cielo'),
(120, 'ENERGIZANTE DARK DOG LATA 250cc GUARANA', 790, '9', 'http://www.jumbo.cl/FO_IMGS/gr/491192-ST.jpg', 'El Cielo'),
(121, 'ENERGIZANTE DARK DOG 568cc LATA GUARANA', 1070, '9', 'http://www.jumbo.cl/FO_IMGS/gr/1514060-ST.jpg', 'El Cielo'),
(122, 'ENERGIZANTE DARK DOG 330cc LATA ORIGINAL', 890, '9', 'http://www.jumbo.cl/FO_IMGS/gr/1598100-ST.jpg', 'El Cielo'),
(123, 'ENERGIZANTE XTC 250cc LATA CLASICA', 600, '9', '', 'El Cielo'),
(124, 'DONA DOMINGA VARIETAL 750cc CS 14°', 2430, '8', 'http://www.jumbo.cl/FO_IMGS/gr/1544546-ST.jpg', 'El Cielo'),
(125, 'LA ROSA LA PALMA VARIETAL 750cc', 1670, '8', 'http://www.jumbo.cl/FO_IMGS/gr/294539-ST.jpg', 'El Cielo'),
(126, 'CAROLINA 3 ESTRELLAS 750cc', 1410, '8', '', 'El Cielo'),
(127, 'GATO PREMIUM 700cc 13.5° SAN PEDRO', 1580, '8', 'http://www.jumbo.cl/FO_IMGS/gr/942681-ST.jpg', 'El Cielo'),
(128, 'UNDURRAGA 750cc PI-CA (PINOT)', 1780, '8', 'http://www.jumbo.cl/FO_IMGS/gr/263720-ST.jpg', 'El Cielo'),
(129, 'VINO SANTA EMILIANA VARIETAL 700cc 13°', 1980, '8', 'http://www.jumbo.cl/FO_IMGS/gr/565528-ST.jpg', 'El Cielo'),
(130, 'MISIONES DE RENGO VAR.750cc 14°', 1970, '8', 'http://www.jumbo.cl/FO_IMGS/gr/294584-ST.jpg', 'El Cielo'),
(131, 'LEON DE TARAPACA 375cc 13.5?', 1020, '8', '', 'El Cielo'),
(132, 'LEON DE TARAPACA 700cc 13.5°', 1490, '8', 'http://www.jumbo.cl/FO_IMGS/gr/1227038-ST.jpg', 'El Cielo'),
(133, 'MIS. DE RENGO RVA. 750CC', 3340, '8', 'http://www.jumbo.cl/FO_IMGS/gr/294584-ST.jpg', 'El Cielo'),
(134, 'TRIO CONCHA Y TORO 750cc', 4660, '8', 'http://www.jumbo.cl/FO_IMGS/gr/294381-ST.jpg', 'El Cielo'),
(135, 'SANTA EMA RESERVA 750cc', 5460, '8', 'http://www.jumbo.cl/FO_IMGS/gr/733050-ST.jpg', 'El Cielo'),
(136, 'LA JOYA RESERVA 750cc 13.5° BISQUERTT', 6030, '8', 'http://www.jumbo.cl/FO_IMGS/gr/294349-ST.jpg', 'El Cielo'),
(137, 'GRAN RESERVA TARAPACA 750cc 13.5°', 5750, '8', 'http://www.jumbo.cl/FO_IMGS/gr/294844-ST.jpg', 'El Cielo'),
(138, 'SANTA RITA CASA REAL 750CC', 9830, '8', 'http://www.jumbo.cl/FO_IMGS/gr/1026647-ST.jpg', 'El Cielo'),
(139, 'CASILLERO DEL DIABLO  750cc', 3690, '8', 'http://www.jumbo.cl/FO_IMGS/gr/742540-ST.jpg', 'El Cielo'),
(140, 'RESERVA DE FAMILIA 750cc CAROLINA', 7670, '8', '', 'El Cielo'),
(141, 'CAROLINA GRAN RESERVA 750cc 14.5? BARRICA SE', 4760, '8', 'http://www.jumbo.cl/FO_IMGS/gr/541672-ST.jpg', 'El Cielo'),
(142, 'CASTILLO MOLINA RVA. 750cc 14°', 4690, '8', 'http://www.jumbo.cl/FO_IMGS/gr/390167-ST.jpg', 'El Cielo'),
(143, 'NATIVA ORGANICO GRAN RVA. CAB/SAUV. 750cc 14?', 6160, '8', '', 'El Cielo'),
(144, 'NATIVA ORGANICO RVA. 750cc', 3380, '8', '', 'El Cielo'),
(145, 'SANTA HELENA RESERVA 750cc 14°', 2930, '8', 'http://www.jumbo.cl/FO_IMGS/gr/588793-ST.jpg', 'El Cielo'),
(146, 'MARQUES CASA CONCHA 750cc CH 13.5?', 9720, '8', '', 'El Cielo'),
(147, 'VIÑA LA ROSA LA PALMA RVA.', 2540, '8', '', 'El Cielo'),
(148, 'VI?A LA ROSA LA CAPITANA 750cc', 3530, '8', '', 'El Cielo'),
(149, 'DON RECA CUVEE GRAN RESERVA 750cc 14.5?', 8880, '8', '', 'El Cielo'),
(150, 'MONTES ALPHA RVA. 750c 14.5?', 9790, '8', '', 'El Cielo'),
(151, 'VI?A SAN PEDRO 1865 RVA. 750cc 14.5?', 9550, '8', '', 'El Cielo'),
(152, 'CABO DE HORNOS 750cc 14.5? GRAN RESERVA SAN PEDRO', 34180, '8', '', 'El Cielo'),
(153, 'EPU 750cc CS/CA 14?', 27740, '8', '', 'El Cielo'),
(154, 'DON MELCHOR CAB-SAUV 750cc 14.5? EST MADERA', 74400, '8', '', 'El Cielo'),
(155, 'ALMAVIVA CAB-SAUV 750cc 15?', 113280, '8', '', 'El Cielo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `iol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `tipo`, `iol`) VALUES
(1, 'bebidas', 0),
(2, 'rones', 0),
(3, 'vodkas', 0),
(4, 'cervezas', 0),
(5, 'whisky', 0),
(6, 'bourbon', 0),
(7, 'licores', 0),
(8, 'vinos', 0),
(9, 'energetica', 0),
(10, 'marihuna', 1),
(11, 'pasta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `rut` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `correo` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `img` varchar(600) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `abitabout` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `rut`, `date`, `correo`, `password`, `nivel`, `direccion`, `img`, `celular`, `abitabout`) VALUES
(1, 'bastian', 'mignolet', '193224357', '1988-05-20', 'bmignolet2016@alu.uct.cl', '$2y$12$khr8Nf2FnBr43CxHn8zkne2u8OoqI7yzTETdPyagTcgxgZh6B/YUS', 2, '', 'https://avatars2.githubusercontent.com/u/22005909?s=400&v=4', '984896227', NULL),
(11, 'fasttest', 'remember delete', '123456789', '1990-01-01', 's@s', '$2y$12$jZYBcGKbgueyohNclSiRI.j8XFrXKJzk1riay1vcDLxNql7FAbPKC', 1, '', NULL, '134', 'hola, soy fasttest, fui echo para no colocar el correo cada vez que se necesita.'),
(12, 'pablo', 'gomez', '192132334', '1998-07-08', 'pgomez2@gmail.com', '$2y$12$XyGcvC4KS0vzfct.91QYhenCfG2fIkSoVz.0AAngQteak.qKLpuBa', 198227728, '', 'https://i.ytimg.com/vi/FAxHZ6FJiPk/hqdefault.jpg', '133', 'hola, soy Pablo Gomez, mi clave es 1.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `impo`
--
ALTER TABLE `impo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `rut` (`rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `impo`
--
ALTER TABLE `impo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
