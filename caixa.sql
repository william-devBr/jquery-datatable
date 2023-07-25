-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jul-2023 às 14:07
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caixa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancamentos`
--

CREATE TABLE `lancamentos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `valor` decimal(9,2) NOT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lancamentos`
--

INSERT INTO `lancamentos` (`id`, `tipo`, `valor`, `descricao`, `created_at`, `update_at`) VALUES
(1, 'saida', '0.00', '', '2023-07-25 08:44:16', '2023-07-25 08:44:16'),
(2, 'saida', '1000.00', '', '2023-07-25 08:45:04', '2023-07-25 08:45:04'),
(3, 'entrada', '9999.99', 'Outras entradas', '2023-07-25 08:45:31', '2023-07-25 08:45:31'),
(4, 'entrada', '9999.99', '', '2023-07-25 08:46:17', '2023-07-25 08:46:17'),
(5, 'saida', '9999.99', '', '2023-07-25 08:47:31', '2023-07-25 08:47:31'),
(6, 'saida', '10999.00', '', '2023-07-25 08:51:31', '2023-07-25 08:51:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lancamentos`
--
ALTER TABLE `lancamentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lancamentos`
--
ALTER TABLE `lancamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
