-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2023 at 01:23 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mensualidad`
--

-- --------------------------------------------------------

--
-- Table structure for table `detalle`
--

CREATE TABLE `detalle` (
  `iddet` int NOT NULL,
  `descdetalle` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idsg` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `detalle`
--

INSERT INTO `detalle` (`iddet`, `descdetalle`, `idsg`) VALUES
(1, 'AZUL CIELO', 2),
(2, 'AZUL MARINO', 2),
(3, 'SEMI GRANDE', 10),
(4, 'EXTRA GRANDE', 10),
(5, 'EXTRA MUY GRANDE', 10);

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `idgrp` int NOT NULL,
  `descrip` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `hab` char(1) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`idgrp`, `descrip`, `hab`) VALUES
(1, 'COLORES', 'S'),
(2, 'SABORES', 'S'),
(3, 'OLORES', 'S'),
(4, 'TAMAÑOS', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `rmenuusuario`
--

CREATE TABLE `rmenuusuario` (
  `idmenusuario` int NOT NULL,
  `tipousr` char(3) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idopcion` int NOT NULL,
  `activo` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `rmenuusuario`
--

INSERT INTO `rmenuusuario` (`idmenusuario`, `tipousr`, `idopcion`, `activo`) VALUES
(1, 'ADM', 1, 1),
(2, 'ADM', 2, 1),
(3, 'ADM', 3, 1),
(4, 'OPR', 3, 1),
(5, 'ADM', 4, 1),
(6, 'OPR', 4, 1),
(7, 'ADM', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subgrupo`
--

CREATE TABLE `subgrupo` (
  `idsubgrp` int NOT NULL,
  `descripsg` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idgrp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `subgrupo`
--

INSERT INTO `subgrupo` (`idsubgrp`, `descripsg`, `idgrp`) VALUES
(1, 'ROJO', 1),
(2, 'AZUL', 1),
(3, 'VERDE', 1),
(4, 'NARANJA', 1),
(5, 'AGRIO', 2),
(6, 'DULCE', 2),
(7, 'AMARGO', 2),
(8, 'ROSAS', 3),
(9, 'AXILA', 3),
(10, 'GRANDE', 4),
(11, 'MEDIANO', 4),
(12, 'PEQUEÑO', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tafiliado`
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
-- Dumping data for table `tafiliado`
--

INSERT INTO `tafiliado` (`ci`, `apellidos`, `nombres`, `telefono`, `direccion`, `foto`, `fechareg`, `usrreg`) VALUES
('1029302', 'CHANEZ', 'RODRIGO', '71923405', 'AV. EJERCITO Y BRASIL', '1029302Chanez.jpg', '2023-05-22', 'admin'),
('10524344', 'PEREZ MAMANI', 'JOHANNA', '7888888', 'SAN ISIDRO', '10524344PEREZ_MAMANI.png', '2023-05-22', 'admin'),
('10908212', 'RAUL', 'TABOADA', '78945612', 'bolivar y pagador', '10908212Raul.gif', '2023-05-22', 'admin'),
('123123', 'TIñINI', 'JOAN', '70201241', 'l a paz', '123123Tiñini.png', '2023-05-22', 'admin'),
('123456', 'MAURICIO ARTEAGA', 'ANDREA', '54132415', 'av.tajarete', '123456mauricio_arteaga.png', '2021-05-12', 'admin'),
('12677542', 'CUBA HUARANCA', 'JHOEL', '76151710', 'San-isidro', '12677542CUBA_HUARANCA.png', '2023-01-02', 'admin'),
('1444555', 'MOYA P', 'KHYA', '7666666', 'TACNA', '1444555MOYA_P.jpg', '2023-05-22', 'admin'),
('14934267', 'VILLCA M.', 'LIDIA C,', '73817589', 'dios es amor', '14934267villca_M..jpg', '2023-05-22', 'admin'),
('1910911', 'PEREZ', 'CIELO', '78655541', 'av tacna', '1910911perez.png', '2023-05-22', 'admin'),
('231322234', 'PEREZ MAMANI', 'JIMMY', '45364565', 'LOS PUMAS', '231322234Perez_Mamani.jpg', '2023-05-22', 'admin'),
('345678', 'ANCASI CALIZAYA', 'KAREN JIMENA', '532788', 'junin y ayacucho', '345678ancasi_calizaya.png', '2023-05-22', 'admin'),
('4512895', 'CONDARCO BELTRAN', 'RAQUEL SARINA', '45231655', 'san jose', '4512895condarco_beltran.PNG', '2023-05-22', 'admin'),
('4521367', 'PAREDES MARCA', 'JHOANA', '5468712', 'bolivar y brasil', '4521367paredes_marca.jpg', '2023-05-22', 'admin'),
('72716123', 'APAZA COLQUE', 'MARISOL', '65726492', 'AV.del valle', '72716123APAZA_COLQUE.jpg', '2023-05-22', 'admin'),
('7406934', 'LOPEZ', 'MARIA', '68154585', 'VASQUEZ NRO 128', '7406934LOPEZ.png', '2023-05-22', 'admin'),
('7754452', 'MAMAN', 'TAQUICHRI', '62354521', 'VELASCO GALBARRO ', '7754452Maman.jpg', '2023-05-22', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tcuota`
--

CREATE TABLE `tcuota` (
  `idcuota` int NOT NULL,
  `monto` int NOT NULL,
  `detalle` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` char(1) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tcuota`
--

INSERT INTO `tcuota` (`idcuota`, `monto`, `detalle`, `fechareg`, `activo`) VALUES
(1, 100, 'AFILIACIÓN', '2023-06-05 12:13:13', 'S'),
(2, 50, 'MENSUALIDAD', '2023-06-05 12:13:13', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `tmensual`
--

CREATE TABLE `tmensual` (
  `nropago` int NOT NULL,
  `ciaf` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fechahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cantidad` int NOT NULL,
  `idcuota` int NOT NULL,
  `usuario` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tmensual`
--

INSERT INTO `tmensual` (`nropago`, `ciaf`, `fechahora`, `cantidad`, `idcuota`, `usuario`) VALUES
(1, '12677542', '2023-06-05 12:42:20', 2, 2, 'admin'),
(2, '123456', '2023-06-12 12:44:06', 2, 2, 'admin'),
(3, '12677542', '2023-06-12 12:49:04', 2, 2, 'admin'),
(9, '7406934', '2023-06-15 15:41:14', 1, 2, 'operario'),
(10, '123456', '2023-06-15 15:44:09', 1, 2, 'operario'),
(11, '72716123', '2023-06-15 15:46:50', 3, 2, 'operario'),
(12, '231322234', '2023-06-15 15:59:05', 2, 2, 'operario'),
(13, '123123', '2023-06-19 12:40:08', 1, 1, 'admin'),
(14, '123456', '2023-06-19 12:46:23', 1, 1, 'operario'),
(15, '1444555', '2023-06-19 13:01:25', 1, 1, 'operario'),
(16, '12677542', '2023-06-19 13:03:18', 1, 1, 'admin'),
(17, '123456', '2023-06-19 13:03:38', 4, 2, 'admin'),
(18, '123456', '2023-06-29 15:53:17', 7, 2, 'admin'),
(19, '123456', '2023-06-29 15:54:16', 6, 2, 'admin'),
(20, '12677542', '2023-06-29 16:13:25', 2, 2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tmenu`
--

CREATE TABLE `tmenu` (
  `idopcion` int NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `vista` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tmenu`
--

INSERT INTO `tmenu` (`idopcion`, `descripcion`, `vista`) VALUES
(1, 'REG.USUARIO', 'musuario.php'),
(2, 'AFILIADOS', 'afiliado.php'),
(3, 'PAGO MENSUAL', 'pagocuota.php'),
(4, 'DEUDORES', 'deudores.php'),
(5, 'GRAFICA PAGOS', 'grafica.php');

-- --------------------------------------------------------

--
-- Table structure for table `tusuario`
--

CREATE TABLE `tusuario` (
  `nusuario` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(32) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo` char(3) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idempleado` int NOT NULL,
  `usrreg` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tusuario`
--

INSERT INTO `tusuario` (`nusuario`, `clave`, `tipo`, `fechareg`, `idempleado`, `usrreg`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'ADM', '2023-03-27 16:37:14', 1, 'admin'),
('operario', 'e10adc3949ba59abbe56e057f20f883e', 'OPR', '2023-03-30 19:40:32', 2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`iddet`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idgrp`);

--
-- Indexes for table `rmenuusuario`
--
ALTER TABLE `rmenuusuario`
  ADD PRIMARY KEY (`idmenusuario`);

--
-- Indexes for table `subgrupo`
--
ALTER TABLE `subgrupo`
  ADD PRIMARY KEY (`idsubgrp`);

--
-- Indexes for table `tafiliado`
--
ALTER TABLE `tafiliado`
  ADD PRIMARY KEY (`ci`);

--
-- Indexes for table `tcuota`
--
ALTER TABLE `tcuota`
  ADD PRIMARY KEY (`idcuota`);

--
-- Indexes for table `tmensual`
--
ALTER TABLE `tmensual`
  ADD PRIMARY KEY (`nropago`);

--
-- Indexes for table `tmenu`
--
ALTER TABLE `tmenu`
  ADD PRIMARY KEY (`idopcion`);

--
-- Indexes for table `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`nusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detalle`
--
ALTER TABLE `detalle`
  MODIFY `iddet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idgrp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rmenuusuario`
--
ALTER TABLE `rmenuusuario`
  MODIFY `idmenusuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subgrupo`
--
ALTER TABLE `subgrupo`
  MODIFY `idsubgrp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tcuota`
--
ALTER TABLE `tcuota`
  MODIFY `idcuota` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmensual`
--
ALTER TABLE `tmensual`
  MODIFY `nropago` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tmenu`
--
ALTER TABLE `tmenu`
  MODIFY `idopcion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
