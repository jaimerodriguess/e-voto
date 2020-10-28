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
-- Estrutura da tabela `sysadm_document`
--

CREATE TABLE `sysadm_document` (
  `idDocument` int(11) NOT NULL,
  `idAccess` int(11) DEFAULT NULL,
  `numberDocument` smallint(1) DEFAULT NULL,
  `documentType` smallint(1) DEFAULT NULL,
  `documentOwner` varchar(10) DEFAULT NULL,
  `documentTransit` tinyint(4) DEFAULT NULL,
  `documentProcessing` tinyint(4) DEFAULT NULL,
  `documentNature` tinyint(4) DEFAULT NULL,
  `documentInterested` varchar(255) DEFAULT NULL,
  `documentDestination` varchar(255) DEFAULT NULL,
  `documentSubject` varchar(255) DEFAULT NULL,
  `documentTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `documentPath` varchar(255) DEFAULT NULL,
  `documentUpload` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sysadm_document`
--

INSERT INTO `sysadm_document` (`idDocument`, `idAccess`, `numberDocument`, `documentType`, `documentOwner`, `documentTransit`, `documentProcessing`, `documentNature`, `documentInterested`, `documentDestination`, `documentSubject`, `documentTime`, `documentPath`, `documentUpload`) VALUES
(1, 15, 1, 1, '502002200', 1, 1, 1, '121298', 'CPC', 'INICIAL', '2020-05-28 16:34:18', NULL, 1),
(2, 15, 1, 2, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'PIP - Rua Onze de Fevereiro', '2020-05-28 16:34:36', NULL, NULL),
(3, 15, 1, 2, '502002200', 1, 1, 1, '121298', '3.BPM/M', 'Apoio Operacional - ENEM 2020', '2020-05-28 16:35:23', NULL, NULL),
(4, 15, 1, 4, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-28 16:36:07', NULL, NULL),
(5, 15, 1, 1, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-28 16:42:32', NULL, NULL),
(6, 15, 1, 1, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-28 16:42:41', NULL, NULL),
(7, 15, 1, 1, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-28 16:43:09', NULL, NULL),
(8, 15, 1, 1, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-28 16:44:10', NULL, NULL),
(9, 15, 2, 1, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-28 16:57:05', NULL, NULL),
(10, 15, 3, 1, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-28 16:59:32', NULL, NULL),
(11, 15, 1, 3, '502002200', 1, 1, 1, '121000', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-28 17:02:40', NULL, NULL),
(12, 15, 4, 1, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-30 11:18:38', NULL, NULL),
(13, 15, 2, 4, '502002200', 2, 2, 3, '121000', 'Todos', 'Apoio Operacional CPA/M-1', '2020-05-30 11:19:34', NULL, NULL),
(14, 15, 3, 4, '502002200', 1, 1, 1, '121000', '46.BPM/M', 'PIP - Rua Onze de Fevereiro', '2020-05-30 11:19:55', NULL, NULL),
(15, 15, 4, 4, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-30 11:22:17', NULL, NULL),
(16, 15, 5, 4, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-30 11:23:13', NULL, NULL),
(17, 15, 6, 4, '502002200', 1, 0, 0, '121298', '46.BPM/M - ALTERADO 2', 'Operação Carnaval 2020', '2020-05-30 12:12:42', NULL, NULL),
(18, 15, 5, 1, '502002200', 1, 1, 1, '121298', '46.BPM/M', 'Operação Carnaval 2020', '2020-05-30 12:19:10', NULL, NULL),
(19, 15, 6, 1, '502002200', 1, 1, 1, '121298', 'asdfghjkl', 'Operação Carnaval 2020', '2020-05-30 15:25:28', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sysadm_document`
--
ALTER TABLE `sysadm_document`
  ADD PRIMARY KEY (`idDocument`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sysadm_document`
--
ALTER TABLE `sysadm_document`
  MODIFY `idDocument` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
