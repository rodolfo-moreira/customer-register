-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Fev-2018 às 06:43
-- Versão do servidor: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_register`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date_birth` datetime NOT NULL,
  `active` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `customers`
--

INSERT INTO `customers` (`id`, `nome`, `email`, `date_birth`, `active`, `created`, `modified`) VALUES
(47, 'Rodolfo', 'contato@rodolfomoreira.com', '1992-04-15 00:00:00', 1, '2018-02-05 04:18:03', '2018-02-05 04:18:03'),
(48, 'Maria', 'contato@maria.com', '1992-04-15 00:00:00', 1, '2018-02-05 04:18:23', '2018-02-05 04:18:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telephones`
--

DROP TABLE IF EXISTS `telephones`;
CREATE TABLE IF NOT EXISTS `telephones` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `ddd` int(11) NOT NULL,
  `number_telephone` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telephones`
--

INSERT INTO `telephones` (`id`, `id_customer`, `ddd`, `number_telephone`, `active`, `created`, `modified`) VALUES
(75, 47, 11, 955784295, 1, '2018-02-05 04:18:03', '2018-02-05 04:18:03'),
(76, 47, 11, 46403268, 1, '2018-02-05 04:18:03', '2018-02-05 04:18:03'),
(77, 48, 11, 12221222, 1, '2018-02-05 04:18:23', '2018-02-05 04:18:23'),
(78, 48, 11, 3123123, 1, '2018-02-05 04:18:32', '2018-02-05 04:18:32'),
(79, 48, 11, 31231312, 1, '2018-02-05 04:26:24', '2018-02-05 04:26:24'),
(80, 49, 11, 46464646, 1, '2018-02-05 04:28:53', '2018-02-05 04:28:53'),
(82, 49, 11, 89898989, 1, '2018-02-05 04:30:12', '2018-02-05 04:30:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
