-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2024 a las 08:03:27
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
-- Base de datos: `agencia`
--
CREATE DATABASE IF NOT EXISTS `agencia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `agencia`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `Pais_idPais` int(11) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  `CiuNombre` varchar(45) NOT NULL,
  `CiuCoord` varchar(45) NOT NULL,
  `CiudadFoto` varchar(100) DEFAULT NULL,
  `CiudDes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`Pais_idPais`, `idCiudad`, `CiuNombre`, `CiuCoord`, `CiudadFoto`, `CiudDes`) VALUES
(1, 1, 'Delhi', '28.61,77.20', 'Delhi.png', '\r\n¡Descubre la fascinante ciudad de Delhi, la joya de la India que te espera con los brazos abiertos! Sumérgete en la rica historia y la vibrante cultura de este destino lleno de contrastes. En cada esquina de Delhi, te esperan monumentos impresionantes que narran siglos de historia, desde el majestuoso Fuerte Rojo hasta el icónico Qutab Minar. Déjate cautivar por los aromas y sabores de la auténtica cocina india mientras exploras los bulliciosos mercados y bazares de la ciudad, donde encontrarás desde especias exóticas hasta artesanías tradicionales.\r\n\r\nEn Delhi, la modernidad se entrelaza con la tradición, creando una experiencia única que nunca olvidarás. Desde los animados barrios llenos de vida nocturna hasta los serenos jardines y parques, esta ciudad tiene algo para todos los gustos. ¡Únete a nosotros y descubre la magia de Delhi, donde cada calle cuenta una historia y cada visita deja una huella imborrable en el corazón!'),
(1, 2, 'Mumbay', '20.59,78.96', 'Mumbay.jpg', 'Viajar a Mumbai, la bulliciosa metrópolis de la India, es una experiencia que despierta todos los sentidos y alimenta el alma. Sumergirse en la maraña de calles coloridas, donde el aroma de especias se entremezcla con el sonido de las bocinas de los automóviles y el bullicio de la gente, es como adentrarse en un universo vibrante y único. En cada rincón de esta ciudad caótica y fascinante, se despliegan historias milenarias y una rica diversidad cultural que captura la imaginación de los viajeros.\r\n\r\nAdemás de sus emblemáticos monumentos como la Puerta de la India y el Taj Mahal Palace, Mumbai ofrece una ventana a la vida cotidiana de la India moderna. Desde los mercados abarrotados de Crawford Market hasta los tranquilos paseos marítimos de Marine Drive, cada experiencia en esta ciudad es un encuentro con la autenticidad y la vitalidad de su gente. En Mumbai, el pasado y el presente se entrelazan de manera única, creando un destino que despierta la curiosidad, la emoción y el deseo de explorar más allá de lo conocido.'),
(3, 3, 'Londres', '51.50,-0.12', 'Londres.jpg', 'Viajar a Londres es sumergirse en la historia y la modernidad en igual medida. Desde los imponentes edificios del Parlamento y la majestuosa Abadía de Westminster hasta los modernos rascacielos de Canary Wharf, cada rincón de esta ciudad icónica respira un aire de grandeza y diversidad cultural. Caminar por las bulliciosas calles de Soho o explorar los museos de clase mundial como el British Museum y la National Gallery es adentrarse en un universo de arte, historia y cultura que despierta la imaginación y el asombro.'),
(3, 4, 'Oxford', '51.75,1.25', 'Oxford.webp', 'Oxford, la ciudad universitaria por excelencia, ofrece una experiencia completamente diferente pero igualmente fascinante. Sus antiguas universidades, con sus majestuosas bibliotecas y jardines pintorescos, evocan siglos de erudición y tradición académica. Recorrer los pasillos de lugares emblemáticos como la Bodleian Library o el Christ Church College es como retroceder en el tiempo y sumergirse en la atmósfera intelectual que ha inspirado a generaciones de estudiantes y académicos. En Oxford, la historia y la academia se entrelazan de manera única, creando un ambiente encantador y estimulante que invita a la reflexión y el aprendizaje.'),
(2, 5, 'Copenhague', '55.67,12.56', 'Copenhague.webp', '\r\nViajar a Copenhague, la capital vibrante de Dinamarca, es embarcarse en un viaje hacia la elegancia escandinava y la innovación contemporánea. Con su arquitectura icónica, como la famosa Sirenita y el vibrante distrito de Nyhavn, la ciudad ofrece un paisaje urbano encantador y lleno de vida. Explorar sus calles empedradas en bicicleta, mientras se respira el aire fresco del mar Báltico, es una experiencia que conecta con la esencia misma de la cultura danesa. Además, Copenhague es un paraíso gastronómico, con una escena culinaria que combina la tradición nórdica con la creatividad moderna, invitando a los visitantes a saborear auténticos manjares locales en cada esquina'),
(2, 6, 'Aarhus ', '56.15,12.56', 'Aarhus.jpg', 'Aarhus, la encantadora ciudad universitaria en la costa este de Jutlandia, ofrece una perspectiva más íntima de la vida danesa. Con su ambiente relajado y acogedor, Aarhus invita a explorar sus encantadoras calles adoquinadas y pintorescos barrios históricos. Además de albergar uno de los museos más destacados de arte contemporáneo, el ARoS Aarhus Kunstmuseum, la ciudad ofrece una variedad de experiencias culturales y actividades al aire libre, como paseos en bote por el fiordo de Aarhus o relajantes momentos en los parques y jardines que salpican la ciudad. En Aarhus, la belleza serena y la autenticidad danesa se fusionan para crear un destino encantador y memorable para aquellos que buscan descubrir la esencia misma de Dinamarca.'),
(4, 7, 'Tokio', '35.68,139.69', 'Tokio.webp', '\r\nViajar a Tokio es sumergirse en un mundo de contrastes fascinantes, donde la tradición ancestral se fusiona con la vanguardia tecnológica. En esta bulliciosa metrópolis, los rascacielos futuristas se alzan junto a antiguos templos y santuarios, creando un paisaje urbano que cautiva los sentidos. Desde el bullicio de Shibuya Crossing hasta la serenidad de los jardines imperiales, cada rincón de Tokio ofrece una experiencia única y sorprendente. Los amantes de la gastronomía encontrarán un paraíso culinario en los callejones de comida de Shinjuku o en los exclusivos restaurantes de Ginza, donde podrán deleitarse con auténticos platos japoneses que despiertan el paladar y el alma.'),
(4, 8, 'Osaka ', '34.69,135.50', 'Osaka.jpg', ' Osaka, la vibrante ciudad en la región de Kansai, ofrece un ambiente más relajado pero igualmente cautivador. Conocida como la \"cocina de Japón\", Osaka deleita a los visitantes con su deliciosa comida callejera y su animada escena gastronómica. Desde el bullicioso mercado de Kuromon hasta los exclusivos restaurantes de Dotonbori, la ciudad es un paraíso para los amantes de la comida. Además de su reputación gastronómica, Osaka ofrece una rica historia y cultura, evidente en sus imponentes castillos y santuarios históricos. Explorar sus animados barrios como Namba y Umeda es adentrarse en un mundo de tradición y modernidad que encapsula la esencia misma de Japón. En Osaka, la hospitalidad japonesa se manifiesta en cada sonrisa y gesto amable, creando una experiencia inolvidable para quienes tienen el privilegio de visitar esta ciudad única.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `PaisNombre` varchar(45) NOT NULL,
  `PaisSimMon` varchar(45) NOT NULL,
  `PaisCodMon` varchar(45) NOT NULL,
  `PaisFoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `PaisNombre`, `PaisSimMon`, `PaisCodMon`, `PaisFoto`) VALUES
(1, 'India', '₹', 'INR', 'India.jpg'),
(2, 'Dinamarca', 'kr.', 'DKK', 'Dinamarca.jpg'),
(3, 'inglaterra', '£', 'GBP', 'inglaterra.avif'),
(4, 'Japon', '¥', 'JPY', 'Japon.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisoscompartir`
--

CREATE TABLE `permisoscompartir` (
  `idPermisos` int(11) NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `presupuesto_idPresupuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `idPresupuesto` int(11) NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Ciudad_idCiudad` int(11) NOT NULL,
  `PreValorLocal` float NOT NULL,
  `PreValorPaisSelect` float NOT NULL,
  `PreValorAlem` float NOT NULL,
  `PreEstado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`idPresupuesto`, `Usuarios_idUsuarios`, `Ciudad_idCiudad`, `PreValorLocal`, `PreValorPaisSelect`, `PreValorAlem`, `PreEstado`) VALUES
(1, 1, 1, 600000, 12816, 143.796, 0),
(2, 1, 7, 5000000, 198550, 1198.3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRoles` int(11) NOT NULL,
  `RolNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRoles`, `RolNombre`) VALUES
(1, 'Admin'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_bd`
--

CREATE TABLE `seguimiento_bd` (
  `idSeguimiento_Bd` int(11) NOT NULL,
  `Usuarios_idUsuarios` int(11) DEFAULT NULL,
  `SegSentencia` text NOT NULL,
  `SegFechaEje` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `seguimiento_bd`
--

INSERT INTO `seguimiento_bd` (`idSeguimiento_Bd`, `Usuarios_idUsuarios`, `SegSentencia`, `SegFechaEje`) VALUES
(204, 3, 'SELECT tb1.idPermisos ,tb4.UsuNombres,tb4.UsuApellidos,tb5.PaisNombre,tb3.CiuNombre,tb2.PreValorLocal,tb2.PreValorPaisSelect,tb2.PreValorAlem,tb5.PaisSimMon\r\n        FROM permisoscompartir tb1 \r\n        INNER JOIN presupuesto tb2 on tb2.idPresupuesto=tb1.presupuesto_idPresupuesto\r\n        INNER JOIN ciudad tb3 on tb3.idCiudad=tb2.Ciudad_idCiudad\r\n        INNER JOIN usuarios tb4 on tb4.idUsuarios=tb2.Usuarios_idUsuarios\r\n        INNER JOIN pais tb5 on tb5.idPais=tb3.Pais_idPais\r\n        where tb1.Usuarios_idUsuarios=1', '2024-04-25 08:01:00'),
(205, 1, 'SELECT tb1.*,tb2.RolNombre Rol FROM usuarios tb1 INNER JOIN roles tb2 on tb2.idRoles=tb1.Roles_idRoles where idUsuarios=1', '2024-04-25 08:02:00'),
(206, 3, 'SELECT tb1.idPresupuesto,tb3.PaisNombre,tb2.CiuNombre,tb1.PreValorLocal,tb1.PreValorPaisSelect,tb1.PreValorAlem,tb1.PreEstado , tb3.PaisSimMon,COUNT(tb5.idPermisos)Contar\r\n        FROM presupuesto tb1\r\n        INNER JOIN ciudad tb2 on tb2.idCiudad=tb1.Ciudad_idCiudad\r\n        INNER JOIN pais tb3 on tb3.idPais=tb2.Pais_idPais\r\n        INNER JOIN usuarios tb4 on tb4.idUsuarios=tb1.Usuarios_idUsuarios\r\n        LEFT JOIN permisoscompartir tb5 on tb5.presupuesto_idPresupuesto=tb1.idPresupuesto\r\n        WHERE tb1.Usuarios_idUsuarios =1\r\n        GROUP BY tb1.idPresupuesto,tb3.PaisNombre,tb2.CiuNombre,tb1.PreValorLocal,tb1.PreValorPaisSelect,tb1.PreValorAlem,tb1.PreEstado, tb3.PaisSimMon;', '2024-04-25 08:02:00'),
(207, 3, 'SELECT tb1.idPermisos ,tb4.UsuNombres,tb4.UsuApellidos,tb5.PaisNombre,tb3.CiuNombre,tb2.PreValorLocal,tb2.PreValorPaisSelect,tb2.PreValorAlem,tb5.PaisSimMon\r\n        FROM permisoscompartir tb1 \r\n        INNER JOIN presupuesto tb2 on tb2.idPresupuesto=tb1.presupuesto_idPresupuesto\r\n        INNER JOIN ciudad tb3 on tb3.idCiudad=tb2.Ciudad_idCiudad\r\n        INNER JOIN usuarios tb4 on tb4.idUsuarios=tb2.Usuarios_idUsuarios\r\n        INNER JOIN pais tb5 on tb5.idPais=tb3.Pais_idPais\r\n        where tb1.Usuarios_idUsuarios=1', '2024-04-25 08:02:00'),
(208, 3, 'SELECT idUsuarios,UsuNombres,UsuApellidos FROM `usuarios` WHERE Roles_idRoles=2 AND idUsuarios<>1 ', '2024-04-25 08:02:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Roles_idRoles` int(11) NOT NULL,
  `UsuNombres` varchar(100) NOT NULL,
  `UsuApellidos` varchar(100) NOT NULL,
  `UsuSexo` varchar(1) NOT NULL,
  `UsuUser` varchar(20) NOT NULL,
  `UsuPass` varchar(100) NOT NULL,
  `UsuTelefono` int(11) NOT NULL,
  `UsuLastSession` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Roles_idRoles`, `UsuNombres`, `UsuApellidos`, `UsuSexo`, `UsuUser`, `UsuPass`, `UsuTelefono`, `UsuLastSession`) VALUES
(1, 2, 'Marlon', 'Torino', 'M', 'MTorino', '202cb962ac59075b964b07152d234b70', 123, '2024-04-25 07:50:00'),
(2, 2, 'Karla', 'Rogriduez', 'F', 'kdrogui', '250cf8b51c773f3f8dc8b4be867a9a02', 456, '2024-04-25 07:20:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`),
  ADD KEY `fk_Ciudad_Pais1_idx` (`Pais_idPais`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `permisoscompartir`
--
ALTER TABLE `permisoscompartir`
  ADD PRIMARY KEY (`idPermisos`),
  ADD KEY `fk_PermisosCompartir_Usuarios1_idx` (`Usuarios_idUsuarios`),
  ADD KEY `fk_PermisosCompartir_presupuesto1_idx` (`presupuesto_idPresupuesto`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`idPresupuesto`),
  ADD KEY `fk_presupuesto_Usuarios1_idx` (`Usuarios_idUsuarios`),
  ADD KEY `fk_presupuesto_Ciudad1_idx` (`Ciudad_idCiudad`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRoles`);

--
-- Indices de la tabla `seguimiento_bd`
--
ALTER TABLE `seguimiento_bd`
  ADD PRIMARY KEY (`idSeguimiento_Bd`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `fk_Usuarios_Roles_idx` (`Roles_idRoles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permisoscompartir`
--
ALTER TABLE `permisoscompartir`
  MODIFY `idPermisos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `idPresupuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRoles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seguimiento_bd`
--
ALTER TABLE `seguimiento_bd`
  MODIFY `idSeguimiento_Bd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_Ciudad_Pais1` FOREIGN KEY (`Pais_idPais`) REFERENCES `pais` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisoscompartir`
--
ALTER TABLE `permisoscompartir`
  ADD CONSTRAINT `fk_PermisosCompartir_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PermisosCompartir_presupuesto1` FOREIGN KEY (`presupuesto_idPresupuesto`) REFERENCES `presupuesto` (`idPresupuesto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD CONSTRAINT `fk_presupuesto_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_presupuesto_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Roles` FOREIGN KEY (`Roles_idRoles`) REFERENCES `roles` (`idRoles`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
