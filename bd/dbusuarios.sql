-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jun-2021 às 21:41
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbusuarios`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuarios`
--

CREATE TABLE `tbusuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(75) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `dataMeeting` date DEFAULT NULL,
  `horaMeeting` time DEFAULT NULL,
  `descricaoMeeting` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbusuarios`
--

INSERT INTO `tbusuarios` (`id`, `nome`, `telefone`, `dataMeeting`, `horaMeeting`, `descricaoMeeting`) VALUES
(1, 'Jorge', '4002-2922', '2021-06-22', '19:57:18', 'usuario'),
(3, 'Arthur', '7894-5632', '2021-06-23', '10:09:39', 'usuario'),
(4, 'TUCa', '1234-5698', '2021-06-23', '15:47:02', 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbusuarios`
--
ALTER TABLE `tbusuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbusuarios`
--
ALTER TABLE `tbusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
