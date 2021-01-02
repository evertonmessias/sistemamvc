-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 02/01/2021 às 09:09
-- Versão do servidor: 5.7.32-0ubuntu0.16.04.1
-- Versão do PHP: 7.3.24-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estrutura para tabela `everton.messias@gmail.com`
--

CREATE TABLE `everton.messias@gmail.com` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `telefone` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `everton.messias@gmail.com`
--

INSERT INTO `everton.messias@gmail.com` (`id`, `nome`, `telefone`, `email`) VALUES
(2, 'Dhora', '995233262', 'dhora@amor.com'),
(3, 'Clelia', '995233262', 'clelia@mae.com'),
(4, 'Clelia', '23452345', 'clelia@mae.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `evertonm@unicamp.br`
--

CREATE TABLE `evertonm@unicamp.br` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `telefone` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `email`, `pass`) VALUES
(1, 'everton.messias@gmail.com', 'e61db210dd1672863fe9f1c6d3faea38'),
(3, 'evertonm@unicamp.br', '7cd929984b89c9463c1ca6fa4b200ffd');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `everton.messias@gmail.com`
--
ALTER TABLE `everton.messias@gmail.com`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `evertonm@unicamp.br`
--
ALTER TABLE `evertonm@unicamp.br`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `everton.messias@gmail.com`
--
ALTER TABLE `everton.messias@gmail.com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `evertonm@unicamp.br`
--
ALTER TABLE `evertonm@unicamp.br`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
