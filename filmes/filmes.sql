-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Maio-2024 às 22:15
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmes`
--
DROP DATABASE IF EXISTS `filmes`;
CREATE DATABASE IF NOT EXISTS `filmes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `filmes`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `cod_adm` int(11) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`cod_adm`, `usuario`, `senha`) VALUES
(1, 'administrador', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avalia`
--

CREATE TABLE `avalia` (
  `cod_ava` int(11) NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `comentario` text,
  `data_hora` datetime DEFAULT NULL,
  `cod_fil` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cat_filme`
--

CREATE TABLE `cat_filme` (
  `cod_cat_fil` int(11) NOT NULL,
  `cod_fil` int(11) NOT NULL,
  `cod_cat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `cod_cat` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `administrador` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE `filme` (
  `cod_fil` int(11) NOT NULL,
  `diretor` varchar(50) DEFAULT NULL,
  `roteirista` varchar(50) DEFAULT NULL,
  `atores` text,
  `cartaz` blob,
  `trailer` varchar(100) DEFAULT NULL,
  `administrador` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usu` int(11) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` bigint(20) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `datanasci` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cod_adm`);

--
-- Indexes for table `avalia`
--
ALTER TABLE `avalia`
  ADD PRIMARY KEY (`cod_ava`),
  ADD KEY `cod_fil` (`cod_fil`),
  ADD KEY `cod_usu` (`cod_usu`);

--
-- Indexes for table `cat_filme`
--
ALTER TABLE `cat_filme`
  ADD PRIMARY KEY (`cod_cat_fil`),
  ADD KEY `cod_fil` (`cod_fil`),
  ADD KEY `cod_cat` (`cod_cat`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod_cat`),
  ADD KEY `administrador` (`administrador`);

--
-- Indexes for table `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`cod_fil`),
  ADD KEY `administrador` (`administrador`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usu`),
  ADD UNIQUE KEY `cpf` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
