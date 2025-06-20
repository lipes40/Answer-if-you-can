-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20/06/2025 às 16:47
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `respostas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `resp`
--

DROP TABLE IF EXISTS `resp`;
CREATE TABLE IF NOT EXISTS `resp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(140) NOT NULL,
  `pergunta` varchar(200) NOT NULL,
  `resposta` varchar(200) NOT NULL,
  `lingua` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `resp`
--

INSERT INTO `resp` (`id`, `nome`, `pergunta`, `resposta`, `lingua`) VALUES
(1, 'ADM', 'Quanto centímetros equivale 1 metro?', '100 centímetros', 'Português'),
(2, 'ADM', 'Quem foi a primeira pessoa a viajar no espaço?', 'Yuri Gagarin', 'Português'),
(3, 'ADM', 'Qual é a montanha mais alta do mundo?', 'Monte Everest', 'Português');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
