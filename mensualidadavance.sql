-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2023 a las 19:17:50
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mensualidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmenuusuario`
--

CREATE TABLE `rmenuusuario` (
  `idmenusuario` int(11) NOT NULL,
  `tipousr` char(3) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idopcion` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rmenuusuario`
--

INSERT INTO `rmenuusuario` (`idmenusuario`, `tipousr`, `idopcion`, `activo`) VALUES
(1, 'ADM', 1, 1),
(2, 'ADM', 2, 1),
(3, 'ADM', 3, 1),
(4, 'OPR', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tafiliado`
--

CREATE TABLE `tafiliado` (
  `ci` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombres` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fechareg` date NOT NULL,
  `usrreg` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tafiliado`
--

INSERT INTO `tafiliado` (`ci`, `apellidos`, `nombres`, `telefono`, `direccion`, `foto`, `fechareg`, `usrreg`) VALUES
('10908212', 'TABOADA CRUZ', 'RAUL', '78945612', 'bolivar y pagador', '10908212TABOADA_CRUZ.gif', '2023-05-22', 'admin'),
('1910911', 'PEREZ', 'CIELO AZUL', '78655541', 'av tacna', '1910911PEREZ.png', '2023-01-01', 'admin'),
('231322234', 'PEREZ MAMANI', 'JIMMY', '45364565', 'LOS PUMAS', '231322234Perez_Mamani.jpg', '2023-05-22', 'admin'),
('345678', 'ANCASI CALIZAYA', 'KAREN JIMENA', '532788', 'junin y ayacucho', '345678ancasi_calizaya.png', '2023-05-22', 'admin'),
('4512895', 'CONDARCO BELTRAN', 'RAQUEL SARINA', '45231655', 'san jose', '4512895condarco_beltran.PNG', '2023-05-22', 'admin'),
('4521367', 'PAREDES MARCA', 'JHOANA', '5468712', 'bolivar y brasil', '4521367paredes_marca.jpg', '2023-05-22', 'admin'),
('72716123', 'APAZA COLQUE', 'MARISOL', '65726492', 'AV.del valle', '72716123APAZA_COLQUE.jpg', '2023-05-22', 'admin'),
('7406934', 'LOPEZ', 'MARIA', '68154585', 'VASQUEZ NRO 128', '7406934LOPEZ.png', '2023-05-22', 'admin'),
('7754452', 'MAMAN', 'TAQUICHRI', '62354521', 'VELASCO GALBARRO ', '7754452Maman.jpg', '2023-05-22', 'admin'),
('8527413', 'LOZADA', 'ARMENGOL', '8965471', 'CLATAYUD', '8527413LOZADA.gif', '2023-06-01', 'admin'),
('9876523', 'MORALES FLORES', 'ANA MARIA', '9632147', 'ninguna', '9876523morales_flores.jpg', '2023-06-01', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcuota`
--

CREATE TABLE `tcuota` (
  `idcuota` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `detalle` varchar(20) NOT NULL,
  `fechareg` timestamp NOT NULL DEFAULT current_timestamp(),
  `activo` char(1) NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tcuota`
--

INSERT INTO `tcuota` (`idcuota`, `monto`, `detalle`, `fechareg`, `activo`) VALUES
(1, 100, 'AFILIACION', '2023-06-01 19:29:18', 'S'),
(2, 50, 'MENSUALIDAD', '2023-06-01 19:29:32', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmensual`
--

CREATE TABLE `tmensual` (
  `nropago` int(11) NOT NULL,
  `ciaf` varchar(10) NOT NULL,
  `fechahora` timestamp NOT NULL DEFAULT current_timestamp(),
  `cantidad` int(11) NOT NULL,
  `idcuota` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tmensual`
--

INSERT INTO `tmensual` (`nropago`, `ciaf`, `fechahora`, `cantidad`, `idcuota`, `usuario`) VALUES
(1, '1910911', '2023-06-01 21:25:19', 2, 2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmenu`
--

CREATE TABLE `tmenu` (
  `idopcion` int(11) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `vista` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tmenu`
--

INSERT INTO `tmenu` (`idopcion`, `descripcion`, `vista`) VALUES
(1, 'REG.USUARIO', 'musuario.php'),
(2, 'AFILIADOS', 'afiliado.php'),
(3, 'PAGO CUOTA', 'pagocuota.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `nusuario` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(32) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo` char(3) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fechareg` timestamp NOT NULL DEFAULT current_timestamp(),
  `idempleado` int(11) NOT NULL,
  `usrreg` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`nusuario`, `clave`, `tipo`, `fechareg`, `idempleado`, `usrreg`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'ADM', '2023-03-27 16:37:14', 1, 'admin'),
('operario', 'e10adc3949ba59abbe56e057f20f883e', 'OPR', '2023-03-30 19:40:32', 2, 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rmenuusuario`
--
ALTER TABLE `rmenuusuario`
  ADD PRIMARY KEY (`idmenusuario`);

--
-- Indices de la tabla `tafiliado`
--
ALTER TABLE `tafiliado`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `tcuota`
--
ALTER TABLE `tcuota`
  ADD PRIMARY KEY (`idcuota`);

--
-- Indices de la tabla `tmensual`
--
ALTER TABLE `tmensual`
  ADD PRIMARY KEY (`nropago`);

--
-- Indices de la tabla `tmenu`
--
ALTER TABLE `tmenu`
  ADD PRIMARY KEY (`idopcion`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`nusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rmenuusuario`
--
ALTER TABLE `rmenuusuario`
  MODIFY `idmenusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tcuota`
--
ALTER TABLE `tcuota`
  MODIFY `idcuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tmensual`
--
ALTER TABLE `tmensual`
  MODIFY `nropago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tmenu`
--
ALTER TABLE `tmenu`
  MODIFY `idopcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
