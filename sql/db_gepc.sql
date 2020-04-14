-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Abr-2020 às 23:46
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
-- Banco de dados: `db_gepc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_avaliacao`
--

CREATE TABLE `tb_avaliacao` (
  `idtb_avaliacao` int(11) NOT NULL,
  `tb_comentario_idtb_comentario` int(11) NOT NULL,
  `tb_user_idtb_user` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_campus`
--

CREATE TABLE `tb_campus` (
  `idtb_campus` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_campus`
--

INSERT INTO `tb_campus` (`idtb_campus`, `nome`) VALUES
(1, 'Pici'),
(2, 'Quixadá'),
(3, 'Russas'),
(4, 'Sobral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentario`
--

CREATE TABLE `tb_comentario` (
  `idtb_comentario` int(11) NOT NULL,
  `comentario` longtext NOT NULL,
  `tb_discussao_idtb_discussao` int(11) NOT NULL,
  `tb_user_idtb_user` int(11) NOT NULL,
  `data` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_discussao`
--

CREATE TABLE `tb_discussao` (
  `idtb_discussao` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `judge` varchar(45) NOT NULL,
  `criador` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `criacao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `idtb_user` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `curso` varchar(45) DEFAULT NULL,
  `biografia` varchar(255) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `ultimo_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `desde` timestamp NOT NULL DEFAULT current_timestamp(),
  `tb_campus_idtb_campus` int(11) NOT NULL,
  `aprovado` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`idtb_user`, `nome`, `email`, `senha`, `matricula`, `curso`, `biografia`, `img`, `ultimo_login`, `desde`, `tb_campus_idtb_campus`, `aprovado`, `tipo`) VALUES
(1, 'Matheus Rocha', 'rochamatheus@alu.ufc.br', '16082002', '494577', 'Engenharia de Computação', 'Idealizador da Plataforma\r\nLouco das Ideias', 'uploads/img/824fd0856d3fcf384569d5228304b9efa7838efb80dc81e462a5c769072b.png', '2020-04-06 02:09:39', '2020-04-02 18:58:20', 1, 1, 'admin'),
(2, 'Leticia Neri', 'leticia@gmail.com', '123', '494632', 'Engenharia de Computação', 'Menina Letícia', 'uploads/img/7bebe2264d4ab6b8493e308c18f51db1f3682f40528709cbcce038ba792f.png', '2020-04-05 02:15:02', '2020-04-03 20:05:02', 1, 1, 'membro'),
(3, 'Vandemberg ', 'teste@gmail.com', '1231', '1231231', 'Engenharia de Computação', NULL, NULL, '2020-04-04 00:48:33', '2020-04-04 00:48:33', 2, 0, 'membro'),
(4, 'Vitor Rosa', 'vitor@gmail.com', '123', '1323123', 'Engenharia de Computação', NULL, NULL, '2020-04-04 00:51:41', '2020-04-04 00:51:41', 3, 0, 'membro'),
(5, 'Vitor Rosa', 'vitao@gmail.com', 'teste', '494532', 'Física', NULL, NULL, '2020-04-05 02:08:27', '2020-04-05 02:08:27', 1, 0, 'membro'),
(6, 'Thiago Marinho de Farias', 'thiago@gmail.com', 'miapica', '493577', 'Sistemas e Midias Digitais', 'Um Otaku gato', 'uploads/img/fd8e5e2bbb91b1cc321f7b61a94bf33925d9294f04073754d98622d048e6.jpg', '2020-04-06 01:39:23', '2020-04-06 00:57:05', 1, 1, 'membro'),
(7, 'Catherine Markert', 'catherine@gmail.com', 'cathcath', '496523', 'Engenharia de Computação', 'Menina Cath, eu estudo Engenharia de Computação e sou muito legal', 'uploads/img/6964d8b26ae484cd4af2ec4c1c1da108312b44d379e13bce7a24547c1861.png', '2020-04-12 00:15:32', '2020-04-12 00:11:56', 1, 1, 'membro');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  ADD PRIMARY KEY (`idtb_avaliacao`),
  ADD KEY `fk_tb_avaliacao_tb_comentario1_idx` (`tb_comentario_idtb_comentario`),
  ADD KEY `fk_tb_avaliacao_tb_user1_idx` (`tb_user_idtb_user`);

--
-- Índices para tabela `tb_campus`
--
ALTER TABLE `tb_campus`
  ADD PRIMARY KEY (`idtb_campus`);

--
-- Índices para tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD PRIMARY KEY (`idtb_comentario`),
  ADD KEY `fk_tb_comentario_tb_discussao1_idx` (`tb_discussao_idtb_discussao`),
  ADD KEY `fk_tb_comentario_tb_user1_idx` (`tb_user_idtb_user`);

--
-- Índices para tabela `tb_discussao`
--
ALTER TABLE `tb_discussao`
  ADD PRIMARY KEY (`idtb_discussao`),
  ADD KEY `fk_tb_discussao_tb_user1_idx` (`criador`);

--
-- Índices para tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`idtb_user`),
  ADD KEY `fk_tb_user_tb_campus_idx` (`tb_campus_idtb_campus`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  MODIFY `idtb_avaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_campus`
--
ALTER TABLE `tb_campus`
  MODIFY `idtb_campus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  MODIFY `idtb_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_discussao`
--
ALTER TABLE `tb_discussao`
  MODIFY `idtb_discussao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `idtb_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  ADD CONSTRAINT `fk_tb_avaliacao_tb_comentario1` FOREIGN KEY (`tb_comentario_idtb_comentario`) REFERENCES `tb_comentario` (`idtb_comentario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_avaliacao_tb_user1` FOREIGN KEY (`tb_user_idtb_user`) REFERENCES `tb_user` (`idtb_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD CONSTRAINT `fk_tb_comentario_tb_discussao1` FOREIGN KEY (`tb_discussao_idtb_discussao`) REFERENCES `tb_discussao` (`idtb_discussao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_comentario_tb_user1` FOREIGN KEY (`tb_user_idtb_user`) REFERENCES `tb_user` (`idtb_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_discussao`
--
ALTER TABLE `tb_discussao`
  ADD CONSTRAINT `fk_tb_discussao_tb_user1` FOREIGN KEY (`criador`) REFERENCES `tb_user` (`idtb_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_tb_user_tb_campus` FOREIGN KEY (`tb_campus_idtb_campus`) REFERENCES `tb_campus` (`idtb_campus`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
