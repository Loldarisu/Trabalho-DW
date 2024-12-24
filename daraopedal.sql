-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 1-Dez-2024 às 18:54
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `daraopedal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atletas`
--

DROP TABLE IF EXISTS `atletas`;
CREATE TABLE IF NOT EXISTS `atletas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `peso` decimal(10,1) NOT NULL,
  `altura` decimal(10,2) NOT NULL,
  `potfunc` decimal(10,2) NOT NULL,
  `id_potfunc` int(11) NOT NULL,
  `gen` char(1) NOT NULL,
  `nasc` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipas`
--

DROP TABLE IF EXISTS `equipas`;
CREATE TABLE IF NOT EXISTS `equipas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipasevento`
--

DROP TABLE IF EXISTS `equipasevento`;
CREATE TABLE IF NOT EXISTS `equipasevento` (
  `id_equipa` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `info` text NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membrosequipa`
--

DROP TABLE IF EXISTS `membrosequipa`;
CREATE TABLE IF NOT EXISTS `membrosequipa` (
  `id_atleta` int(11) NOT NULL,
  `id_equipa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `potencias`
--

DROP TABLE IF EXISTS `potencias`;
CREATE TABLE IF NOT EXISTS `potencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` char(1) NOT NULL,
  `gen` char(1) NOT NULL,
  `potfunc_min` decimal(10,2) NOT NULL,
  `potfunc_max` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `potencias`
--

INSERT INTO `potencias` (`id`, `cat`, `gen`, `potfunc_min`, `potfunc_max`) VALUES
(1, 'A', 'M', '4.00', '10.00'),
(2, 'A', 'F', '3.70', '10.00'),
(3, 'B', 'M', '3.20', '3.99'),
(4, 'B', 'F', '3.20', '3.69'),
(5, 'C', 'M', '2.50', '3.19'),
(6, 'C', 'F', '2.50', '3.19'),
(7, 'D', 'M', '0.00', '2.49'),
(8, 'D', 'F', '0.00', '2.49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
