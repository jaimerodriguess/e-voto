-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Maio-2020 às 18:42
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cpam2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sysadm_document_type`
--

CREATE TABLE `sysadm_document_type` (
  `idType` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sysadm_document_type`
--

INSERT INTO `sysadm_document_type` (`idType`, `type`) VALUES
(1, 'Atestado'),
(2, 'Certidão'),
(3, 'Atestado'),
(4, 'Certidão'),
(5, 'Despacho'),
(6, 'Informação'),
(7, 'Despacho'),
(8, 'Informação'),
(9, 'Memorando'),
(10, 'Ofício'),
(11, 'Memorando'),
(12, 'Ofício'),
(13, 'Ordem de Serviço'),
(14, 'Parte'),
(15, 'Requerimento'),
(16, 'Mensagem'),
(17, 'Ata de Reunião'),
(18, 'Ordem de Serviço'),
(19, 'Parte'),
(20, 'Requerimento'),
(21, 'Mensagem'),
(22, 'Ata de Reunião');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sysadm_document_type`
--
ALTER TABLE `sysadm_document_type`
  ADD PRIMARY KEY (`idType`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sysadm_document_type`
--
ALTER TABLE `sysadm_document_type`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
