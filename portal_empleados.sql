-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 03:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_empleados`
--

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario_ult_mod` int(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `dni` bigint(20) NOT NULL,
  `fecha_ingreso` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id`, `id_usuario_ult_mod`, `nombre`, `apellido`, `dni`, `fecha_ingreso`) VALUES
(2, 2, 'blabla', 'Martinez', 37261253, '2022-10-11 11:19:53'),
(3, 1, 'Julian', 'Rodriguez', 37281045, '2022-10-11 11:41:55'),
(4, 1, 'Juan', 'Gimenez', 37281045, '2022-10-11 11:42:58'),
(6, 1, 'Julian', 'Rodriguez', 37281045, '2022-10-11 15:13:26'),
(7, 2, 'Ana', 'Martinez', 20432100, '2022-10-11 21:33:49'),
(9, 3, 'Juanita', 'Pepita', 12222111, '2022-10-11 23:30:37'),
(10, 2, 'Anita', 'Laloquita', 23321123, '2022-10-11 23:34:14'),
(11, 2, 'Juana', 'Lalala', 20987654, '2022-10-12 22:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`, `apellido`) VALUES
(1, 'ejemplo', '$2y$10$MKEZOE1o/HEE2KAgDMBkq.j6kjw0tiu.FGMSKLdi9wU8MMDQIlpFO', 'Fulano', 'de Tal'),
(2, 'Pepito ', '$2y$10$j1XpdE/0xJTL7vduplXnsuHCYrp/4I8M8u2sS7q0qk6xWc70VYecO', 'Pepito', 'Fulanito'),
(3, 'Ana', '$2y$10$EC08HyYAcyEFfH9PGtGhtunVdPlVI861y6AJw7zG2Lr3.MU3yWqG6', 'Ana', 'Martinez'),
(5, 'Laura', '$2y$10$zkZERX35ZXpR7bMTvdqxNeI3h8wERjaKmqrq/m/g8l0vB0/NFgLmS', 'Laura', 'Gonzalez');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empleado_usuario` (`id_usuario_ult_mod`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_empleado_usuario` FOREIGN KEY (`id_usuario_ult_mod`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
