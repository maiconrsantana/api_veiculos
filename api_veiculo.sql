-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jun-2018 às 20:20
-- Versão do servidor: 5.7.14
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_veiculo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `veiculo` varchar(150) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `ano` int(4) NOT NULL,
  `descricao` text,
  `vendido` tinyint(4) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `veiculo`, `marca`, `ano`, `descricao`, `vendido`, `created`, `updated`) VALUES
(1, 'Palio', 'Fiat', 2004, '1.4 MPI FIRE ELX WEEKEND 8V FLEX 4P MANUAL', 0, '2018-06-23 13:53:16', '2018-06-23 13:55:35'),
(2, 'Mobi', 'Fiat', 2017, '1.0 Evo Flex Easy Manual', 0, '2018-06-23 13:56:48', '2018-06-23 13:56:48'),
(3, 'Agile', 'Chevrolet', 2011, 'LTZ 1.4 Flex', 1, '2018-06-23 13:58:06', '2018-06-23 22:17:18'),
(4, 'Mobi', 'Fiat', 2011, 'LTZ 1.4 Flex', 1, '2018-06-23 17:54:54', '2018-06-23 22:23:06'),
(6, 'Tipo', 'Fiat', 2005, 'lorem ipsum', 1, '2018-06-23 22:43:29', '2018-06-23 22:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
