-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Abr-2020 às 19:59
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `19549896870`
--

CREATE TABLE `19549896870` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `telefone` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `19549896870`
--

INSERT INTO `19549896870` (`id`, `nome`, `telefone`, `email`) VALUES
(1, 'Clelia', '991260304', 'mae@mae.com'),
(2, 'Dhora', '995233262', 'dhora@amor.com'),
(3, 'Erika', '923452345', 'kika@filha.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `25748256835`
--

CREATE TABLE `25748256835` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `telefone` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `25748256835`
--

INSERT INTO `25748256835` (`id`, `nome`, `telefone`, `email`) VALUES
(1, 'everton', '995233262', 'everton.messias@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` varchar(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `pass`) VALUES
('19549896870', 'everton', 'e61db210dd1672863fe9f1c6d3faea38'),
('25748256835', 'dhora', 'aec1de9e0e936ea10342b5c0118c5242');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `19549896870`
--
ALTER TABLE `19549896870`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `25748256835`
--
ALTER TABLE `25748256835`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `19549896870`
--
ALTER TABLE `19549896870`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `25748256835`
--
ALTER TABLE `25748256835`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
