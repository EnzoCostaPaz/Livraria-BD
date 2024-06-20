-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/05/2024 às 01:19
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
create database `bd_autoria`;
use `bd_autoria`;
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_Autor` int(11) NOT NULL,
  `NomeAutor` varchar(30) NOT NULL,
  `Sobrenome` varchar(30) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`Cod_Autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(1, 'Clarice', 'Lispector', 'ClariceLis@Gmail.com', '1920-12-10'),
(2, 'Edgar', 'Allan Poe', 'EdgarPoe@Gmail.com', '1809-01-19'),
(3, 'José ', 'Saramago', 'JoseSarma@Gmail.com', '1922-11-16'),
(4, 'Mario ', 'Sergio Cortella', 'MarioCortella@Gmail.com', '1954-03-05'),
(5, 'Sidney', 'Sheldon', 'SidneyShe@Gmail.com', '1917-02-11'),
(6, 'Franz', 'Kafka', 'KafkaFranz@Gmail.com', '1983-07-03'),
(7, 'Paulo', 'Coelho', 'PauloCoelho@Gmail.com', '1947-08-23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_Autor` int(11) NOT NULL,
  `Cod_Livro` int(11) NOT NULL,
  `DataLacamento` date NOT NULL,
  `Editora` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autoria`
--

INSERT INTO `autoria` (`Cod_Autor`, `Cod_Livro`, `DataLacamento`, `Editora`) VALUES
(2, 4, '2020-05-13', 'Darkside'),
(1, 2, '2024-05-12', 'rocco'),
(6, 3, '2014-05-14', 'Darkside'),
(5, 5, '2006-07-13', 'Bertrand Brasil'),
(2, 1, '2006-01-09', 'Verus Editora'),
(6, 3, '2009-03-11', 'Editora Record'),
(2, 1, '1999-08-20', 'Editora Draco'),
(5, 5, '2008-04-11', 'Circulo do Livro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_Livro` int(11) NOT NULL,
  `Titulo` varchar(60) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `Idioma` varchar(50) NOT NULL,
  `QtdePag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`Cod_Livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdePag`) VALUES
(1, 'O Gato Preto', 'Terror', '032-17764-0', 'Português', 104),
(2, 'A Hora da Estrela', 'Romance', '978-0-14-3125', 'Português', 88),
(3, 'Metamorfose ', 'Ficção', ' 978-0-06-231', 'Português', 112),
(4, 'O Corvo', 'Terror', '978-0-547-928', 'Português', 64),
(5, 'Um Estranho no Espelho', 'Romance', '978-0-321-776', 'Português', 352);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_Autor`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_Livro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `Cod_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_Livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
