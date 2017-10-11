SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `impo` (
 `codigo` int(11) NOT NULL,
 `nombre` varchar(25) NOT NULL,
 `tipo` varchar(25) NOT NULL,
 `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `impo` (`codigo`, `nombre`, `tipo`, `nivel`) VALUES
(1, 'Cannabis Índica', 'marihuana', 1),
(2, 'Cannabis Ruderalis', 'marihuana', 1);


CREATE TABLE `local` (
 `codigo` int(11) NOT NULL,
 `nombre` varchar(60) NOT NULL,
 `precio` int(20) NOT NULL,
 `tipo` varchar(30) NOT NULL,
 `img` text NOT NULL,
 `proveedor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `local` (`codigo`, `nombre`, `precio`, `tipo`, `img`, `proveedor`) VALUES
(1, 'Agua Mineral', 1000, 'bebidas', 'https://www.elcielo.cl/images/stories/virtuemart/category/resized/agua-mineral_300x300.jpg', 'El Cielo'),
(2, 'Agua Tonica', 1050, 'bebidas', 'https://www.elcielo.cl/images/stories/virtuemart/category/resized/agua-tonica_300x300.jpg', 'El Cielo'),
(3, 'RON FLOR DE CANA 7A 750CC', 6480, '2', '', 'El Cielo'),
(5, 'RON FLOR DE CANA 5A 1 LITRO', 5860, '2', '', 'El Cielo'),
(6, 'FLOR DE CANA 4A 750CC GOLD', 4500, '2', '', 'El Cielo'),
(7, 'RON HAVANA CLUB A. RVA 750CC', 6860, '2', '', ''),
(8, 'RON HAVANA CLUB A. ESP.', 4110, '2', '', 'El Cielo'),
(9, 'RON BARCELO DORADO 750cc', 3950, '2', '', 'El Cielo'),
(10, 'RON BARCELO ANEJO 750cc', 4770, '2', '', 'El Cielo'),
(11, 'RON ANGOSTURA A¥EJO 700cc 40%', 2940, '2', '', 'El Cielo'),
(12, 'RON BACARDI ANEJO 750cc', 4590, '2', '', 'El Cielo'),
(13, 'RON BACARDI DORADO 750cc', 3790, '2', '', 'El Cielo'),
(14, 'RON BOTRAN ANEJO 5A 1 LITRO', 3470, '2', '', 'El Cielo'),
(15, 'RON BRUGAL DORADO 750cc DOMINICANO', 3740, '2', '', 'El Cielo'),
(16, 'RON CRUZAN SABORES 27.5% 750cc', 4100, '2', '', 'El Cielo'),
(17, 'RON MITJANS DORADO 1 LITRO', 2200, '2', '', 'El Cielo'),
(18, 'RON MITJANS DORADO 750cc', 1940, '2', '', 'El Cielo'),
(19, 'RON MULATA ANEJO 700cc', 3470, '2', '', 'El Cielo'),
(20, 'RON SANTA TERESA A¥EJO GRAN RVA 750 cc.', 3480, '2', '', 'El Cielo'),
(21, 'RON VIEJO DE CALDAS 3A 700cc 37.5%', 3630, '2', '', 'El Cielo'),
(22, 'VODKA RUSSIAN STANDARD 750cc', 6820, '3', '', 'El Cielo'),
(23, 'VODKA .PL POLISH PREMIUM 700cc ', 2290, '3', '', 'El Cielo'),
(24, 'VODKA .PL SABORES 40% 700cc', 2740, '3', '', 'El Cielo'),
(25, 'VODKA .PL ICE COCTEL 275cc 4.4%', 720, '3', '', 'El Cielo'),
(26, 'VODKA ABSOLUT SUECA ORIGINAL 750cc', 7280, '3', '', 'El Cielo'),
(27, 'VODKA ABSOLUT SABORES 750CC', 7580, '3', '', 'El Cielo'),
(28, 'VODKA BOLSHAYA PREMIUM 750cc', 2840, '3', '', 'El Cielo'),
(29, 'VODKA ERISTOFF 700cc GOLDEN CARAMEL COCTEL', 3340, '3', '', 'El Cielo'),
(30, 'VODKA ERISTOFF 700cc BLACK COCTEL', 3340, '3', '', 'El Cielo'),
(31, 'VODKA ERISTOFF ORIGINAL 700cc 37.5ø', 2160, '3', '', 'El Cielo'),
(32, 'VODKA GRADUATE PURO 700cc', 3600, '3', '', 'El Cielo'),
(33, 'VODKA MOROZ 100cc MATRIUSHKA C/EST FIGURA', 1590, '3', '', 'El Cielo'),
(34, 'VODKA STOLICHNAYA ORIGINAL  750cc', 4690, '3', '', 'El Cielo'),
(35, 'VODKA STOLICHNAYA SABORES 750CC', 5540, '3', '', 'El Cielo'),
(36, 'VODKA STOLICHNAYA 750cc CHOCOLAT RAZBERI', 6710, '3', '', 'El Cielo'),
(37, 'VODKA GREY GOOSE 750cc (FRANCES)', 20150, '3', '', 'El Cielo'),
(38, 'RON FLOR DE CANA 4A 1.750cc', 8890, '2', '', 'El Cielo'),
(39, 'RON FLOR DE CANA 5A 1.750cc', 9550, '2', '', 'El Cielo'),
(40, 'RON BACARDI DORADO 1.750cc', 7920, '2', '', 'El Cielo'),
(41, 'RON SANTA TERESA BOT. 1.750cc GRAN RESERVA', 7080, '2', '', 'El Cielo'),
(42, 'RON MITJANS DORADO 1.750cc', 4660, '2', '', 'El Cielo'),
(43, 'RON BARCELO ANEJO 1.750cc', 9210, '2', '', 'El Cielo'),
(44, 'CERVEZA BECKER 354cc LATA', 370, '4', '', 'El Cielo'),
(45, 'CERVEZA BECKER 1 LITRO DESECHABLE OW', 1090, '4', '', 'El Cielo'),
(46, 'CERVEZA CORONA EXTRA 355cc D24', 750, '4', '', 'El Cielo'),
(47, 'CERVEZA CORONA EXTRA 710cc IMPORT', 1420, '4', '', 'El Cielo'),
(48, 'CERVEZA STELLA ARTOIS 330cc BOTELLA ', 710, '4', '', 'El Cielo'),
(49, 'CERVEZA STELLA ARTOIS 354cc LATA', 660, '4', '', 'El Cielo'),
(50, 'CERVEZA STELLA ARTOIS 975cc BOT. DESECHABLE OW', 1580, '4', '', 'El Cielo'),
(51, 'CERVEZA CUSQUENA 330cc. BOT.DESECH.', 710, '4', '', 'El Cielo'),
(52, 'CERVEZA CUSQUENA 620cc GOLDEN LAGER PREMIUM', 1340, '4', '', 'El Cielo'),
(53, 'CERVEZA CARLSBERG 330cc LATA', 550, '4', '', 'El Cielo'),
(54, 'CERVEZA CARLSBERG 500cc LATA', 700, '4', '', 'El Cielo'),
(55, 'CERVEZA CARLSBERG 330cc BOT. DESECHABLE', 640, '4', '', 'El Cielo'),
(56, 'CERVEZA LA TRAPPE 330cc QUADRUPEL BOTELLA', 2230, '4', '', 'El Cielo'),
(57, 'CERVEZA LA TRAPPE 330cc TRIPEL BOTELLA', 2010, '4', '', 'El Cielo'),
(58, 'CERVEZA LA TRAPPE 330cc BLOND BOTELLA', 1760, '4', '', 'El Cielo'),
(59, 'CERVEZA LA TRAPPE 330cc DUBBEL BOTELLA', 1840, '4', '', 'El Cielo'),
(60, 'CERVEZA KROSS PILSEN 330cc', 1170, '4', '', 'El Cielo'),
(61, 'CERVEZA KROSS GOLDEN ALE 330cc', 1140, '4', '', 'El Cielo'),
(62, 'CERVEZA KROSS \"5\" 750cc ANIVERSARIO ALE FUERT', 3460, '4', '', 'El Cielo'),
(63, 'CERVEZA NEGRA MODELO 355cc', 790, '4', '', 'El Cielo'),
(64, 'PONY MALTA 330cc SIN ALCOHOL', 950, '4', '', 'El Cielo'),
(65, 'CERVEZA AGUILA BOT. 330cc 4%', 1400, '4', '', 'El Cielo'),
(66, 'BOURBON WHISKEY JIM BEAM BLANCO 750cc 40ø', 7950, '6', '', 'El Cielo'),
(67, 'BOURBON WHISKEY JIM BEAM NEGRO 750cc E.CARTON', 14100, '6', '', 'El Cielo'),
(68, 'BOURBON WHISKEY JIM BEAM SMALL BATCH 700 cc', 24670, '6', '', 'El Cielo'),
(69, 'WHISKEY JACK DANIELS 750cc EST. CARTON', 17940, '6', '', 'El Cielo'),
(70, 'WHISKEY JACK DANIELS GENTLEMAN 750cc S/EST', 26980, '6', '', 'El Cielo'),
(71, 'WHISKY BALLANTINES 6A 750cc FINEST EST. CARTON', 7370, '5', '', 'El Cielo'),
(72, 'WHISKY CHIVAS REGAL 12A 750cc EST.CARTON ', 20060, '5', '', 'El Cielo'),
(73, 'WHISKY 100 PIPERS 750cc 40ø', 4460, '5', '', 'El Cielo'),
(74, 'WHISKY ANDREW MCDUFF 700cc', 3300, '5', '', 'El Cielo'),
(75, 'WHISKY BRUCE DOUGLAS 750cc', 3640, '5', '', 'El Cielo'),
(76, 'WHISKY CUTTY SARK 750cc BLACK', 9410, '5', '', 'El Cielo'),
(77, 'WHISKY CUTTY SARK 6A 750cc ORIGINAL E/AMARILL', 5870, '5', '', 'El Cielo'),
(78, 'WHISKY GRANTS 6A 750cc ESTUCHE CARTON', 5450, '5', '', 'El Cielo'),
(79, 'WHISKY JAMES KING 3A 750cc', 3020, '5', '', 'El Cielo'),
(80, 'WHISKY FAMOUS BLACK GROUSE 750cc', 11170, '5', '', 'El Cielo'),
(81, 'WHISKY FAMOUS GROUSE 750cc FINEST SCOTCH', 5650, '5', '', 'El Cielo'),
(82, 'WHISKY FAMOUS GROUSE 12A 750cc GOLD RVA ', 19920, '5', '', 'El Cielo'),
(83, 'WHISKY TEACHERS 6A 750cc', 5650, '5', '', 'El Cielo'),
(84, 'LICOR AMARETTO DUVAL 750cc', 2980, '7', '', 'El Cielo'),
(85, 'LICOR AMARETTO FRANCOLI 700cc', 8900, '7', '', 'El Cielo'),
(86, 'LICOR AMARETTO MITJANS 750cc', 3490, '7', '', 'El Cielo'),
(87, 'ABSENTA HILLS 1 LITRO VERDE', 8580, '7', '', 'El Cielo'),
(88, 'ABSENTA HILLS 700cc VERDE', 7580, '7', '', 'El Cielo'),
(89, 'ABSENTA HILLS 700cc DORADO SUAVE', 7580, '7', '', 'El Cielo'),
(90, 'ABSENTA VERDE CON CUCHARA 700cc', 14180, '7', '', 'El Cielo'),
(91, 'AGUARDIENTE ANTIOQUENO 700cc CON O SIN AZUCAR', 5180, '7', '', 'El Cielo'),
(92, 'BAILEYS CREMA DE WHISKY 750cc ORIGINAL', 10550, '7', '', 'El Cielo'),
(93, 'MARTINI ROSSO VERMOUTH 995cc', 2800, '7', '', 'El Cielo'),
(94, 'CACHAZA VELHO BARREIRO BRASILERA 1 LITRO', 2870, '7', '', 'El Cielo'),
(95, 'CACHAZA PITU 1 LITRO', 2290, '7', '', 'El Cielo'),
(96, 'AMARGO ANGOSTURA 100cc', 8240, '7', '', 'El Cielo'),
(97, 'COINTREAU LICOR DE NARANJA 750cc FRANCES', 19060, '7', '', 'El Cielo'),
(98, 'COLA DE MONO EL CIELO 645cc', 1570, '7', '', 'El Cielo'),
(99, 'COLA DE MONO EMAN MONTENEGRO 700cc', 1570, '7', '', 'El Cielo'),
(100, 'COGNAC GASTON DE LAGRANGE V.S.O.P. 700cc', 25840, '7', '', 'El Cielo'),
(101, 'CURACAO AZUL DUVAL 750cc', 2980, '7', '', 'El Cielo'),
(102, 'DIGESTIVO LICOR JAGERMEIFTER 700cc', 10450, '7', '', 'El Cielo'),
(103, 'GIN PLYMOUTH 750cc ', 3340, '7', '', 'El Cielo'),
(104, 'GIN SEAGRAM EXTRA DRY 750cc', 4140, '7', '', 'El Cielo'),
(105, 'JEREZ TIO PEPE 750cc', 10080, '7', '', 'El Cielo'),
(106, 'BRANDY DE JEREZ FUNDADOR 750cc', 7600, '7', '', 'El Cielo'),
(107, 'TEQUILA SAUZA 750cc BLANCO', 7240, '7', '', 'El Cielo'),
(108, 'TEQUILA SAUZA GOLD 750cc', 6610, '7', '', 'El Cielo'),
(109, 'TEQUILA RANCHO ALEGRE BLANCO 1 Litro 100% AGAVE', 4340, '7', '', 'El Cielo'),
(110, 'LIQUEUR L\"ESPRIT NUVO 750cc', 19780, '7', '', 'El Cielo'),
(111, 'ZALAMERO CENTENARIO SECO 750cc EX JEREZ', 4410, '7', '', 'El Cielo'),
(112, 'ENERGIZANTE RED BULL 250cc LATA', 950, '9', '', 'El Cielo'),
(113, 'ENERGIZANTE RED BULL 355cc LATA', 1310, '9', '', 'El Cielo'),
(114, 'ENERGIZANTE SCORE LATA 250cc', 570, '9', '', 'El Cielo'),
(115, 'ENERGIZANTE SCORE LATA 500cc', 760, '9', '', 'El Cielo'),
(116, 'ENERGIZANTE SCORE 1.5 LT', 1720, '9', '', 'El Cielo'),
(117, 'ENERGIZANTE MR. BIG 600cc', 1130, '9', '', 'El Cielo'),
(118, 'ENERGIZANTE MR. BIG 1.5LT', 2100, '9', '', 'El Cielo'),
(119, 'ENERGIZANTE MR. BIG ZERO 1.5 LT', 2100, '9', '', 'El Cielo'),
(120, 'ENERGIZANTE DARK DOG LATA 250cc GUARANA', 790, '9', '', 'El Cielo'),
(121, 'ENERGIZANTE DARK DOG 568cc LATA GUARANA', 1070, '9', '', 'El Cielo'),
(122, 'ENERGIZANTE DARK DOG 330cc LATA ORIGINAL', 890, '9', '', 'El Cielo'),
(123, 'ENERGIZANTE XTC 250cc LATA CLASICA', 600, '9', '', 'El Cielo'),
(124, 'DONA DOMINGA VARIETAL 750cc CS', 2430, '8', '', 'El Cielo'),
(125, 'LA ROSA LA PALMA VARIETAL 750cc', 1670, '8', '', 'El Cielo'),
(126, 'CAROLINA 3 ESTRELLAS 750cc', 1410, '8', '', 'El Cielo'),
(127, 'GATO PREMIUM 700cc SAN PEDRO', 1580, '8', '', 'El Cielo'),
(128, 'UNDURRAGA 750cc PI-CA (PINOT)', 1780, '8', '', 'El Cielo'),
(129, 'VINO SANTA EMILIANA VARIETAL 700cc', 1980, '8', '', 'El Cielo'),
(130, 'MISIONES DE RENGO VAR.750cc', 1970, '8', '', 'El Cielo'),
(131, 'LEON DE TARAPACA 375cc', 1020, '8', '', 'El Cielo'),
(132, 'LEON DE TARAPACA 700cc', 1490, '8', '', 'El Cielo'),
(133, 'MIS. DE RENGO RVA. 750CC', 3340, '8', '', 'El Cielo'),
(134, 'TRIO CONCHA Y TORO 750cc', 4660, '8', '', 'El Cielo'),
(135, 'SANTA EMA RESERVA 750cc', 5460, '8', '', 'El Cielo'),
(136, 'LA JOYA RESERVA 750cc BISQUERTT', 6030, '8', '', 'El Cielo'),
(137, 'GRAN RESERVA TARAPACA 750cc', 5750, '8', '', 'El Cielo'),
(138, 'SANTA RITA CASA REAL 750CC', 9830, '8', '', 'El Cielo'),
(139, 'CASILLERO DEL DIABLO 750cc', 3690, '8', '', 'El Cielo'),
(140, 'RESERVA DE FAMILIA 750cc CAROLINA', 7670, '8', '', 'El Cielo'),
(141, 'CAROLINA GRAN RESERVA 750cc BARRICA SE', 4760, '8', '', 'El Cielo'),
(142, 'CASTILLO MOLINA RVA. 750cc', 4690, '8', '', 'El Cielo'),
(143, 'NATIVA ORGANICO GRAN RVA. CAB/SAUV. 750cc', 6160, '8', '', 'El Cielo'),
(144, 'NATIVA ORGANICO RVA. 750cc', 3380, '8', '', 'El Cielo'),
(145, 'SANTA HELENA RESERVA 750cc 14ø', 2930, '8', '', 'El Cielo'),
(146, 'MARQUES CASA CONCHA 750cc CH', 9720, '8', '', 'El Cielo'),
(147, 'VI¥A LA ROSA LA PALMA RVA.', 2540, '8', '', 'El Cielo'),
(148, 'VI¥A LA ROSA LA CAPITANA 750cc', 3530, '8', '', 'El Cielo'),
(149, 'DON RECA CUVEE GRAN RESERVA 750cc', 8880, '8', '', 'El Cielo'),
(150, 'MONTES ALPHA RVA. 750c', 9790, '8', '', 'El Cielo'),
(151, 'VI¥A SAN PEDRO 1865 RVA. 750cc', 9550, '8', '', 'El Cielo'),
(152, 'CABO DE HORNOS 750cc GRAN RESERVA SAN PEDRO', 34180, '8', '', 'El Cielo'),
(153, 'EPU 750cc CS/CA', 27740, '8', '', 'El Cielo'),
(154, 'DON MELCHOR CAB-SAUV 750cc EST MADERA', 74400, '8', '', 'El Cielo'),
(155, 'ALMAVIVA CAB-SAUV 750cc', 113280, '8', '', 'El Cielo');


CREATE TABLE `tipos` (
 `id` int(11) NOT NULL,
 `tipo` varchar(30) NOT NULL,
 `iol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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


CREATE TABLE `usuario` (
 `id` int(11) NOT NULL,
 `nombre` varchar(25) NOT NULL,
 `apellido` varchar(25) NOT NULL,
 `rut` varchar(10) NOT NULL,
 `fecha de nacimiento` date NOT NULL,
 `correo` varchar(40) NOT NULL,
 `password` varchar(30) NOT NULL,
 `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `rut`, `fecha de nacimiento`, `correo`, `password`, `nivel`) VALUES
(1, 'bastian', 'mignolet', '197654627', '1998-05-20', 'bmignolet2016@alu.uct.cl', 'admin', 2),
(3, 'pablo', 'gomez', '197654627', '1996-02-05', 'pgomez@gmail.com', '1234', 0),
(4, '', '', '', '0000-00-00', '', '', 0);

ALTER TABLE `impo`
 ADD PRIMARY KEY (`codigo`);

ALTER TABLE `local`
 ADD PRIMARY KEY (`codigo`);

ALTER TABLE `tipos`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `impo`
 MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `local`
 MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

ALTER TABLE `tipos`
 MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `usuario`
 MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;