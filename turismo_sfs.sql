-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Dez-2018 às 16:55
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turismo_sfs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtir_local`
--

CREATE TABLE `curtir_local` (
  `local_id_local` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `dt_curtir` varchar(45) NOT NULL,
  `avaliacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtir_rota`
--

CREATE TABLE `curtir_rota` (
  `rota_id_rota` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `dt_curtir` varchar(45) NOT NULL,
  `avaliacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_l`
--

CREATE TABLE `imagem_l` (
  `id_imagem` int(11) NOT NULL,
  `nome_imagem` varchar(200) NOT NULL,
  `local` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_local`
--

CREATE TABLE `imagem_local` (
  `imagem_l_id_imagem` int(11) NOT NULL,
  `local_id_local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_r`
--

CREATE TABLE `imagem_r` (
  `id_imagem` int(11) NOT NULL,
  `nome_imagem` varchar(200) NOT NULL,
  `local` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_rota`
--

CREATE TABLE `imagem_rota` (
  `imagem_r_id_imagem` int(11) NOT NULL,
  `rota_id_rota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `id_local` int(11) NOT NULL,
  `nome_local` varchar(150) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `imagem_perfil` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`id_local`, `nome_local`, `descricao`, `imagem_perfil`) VALUES
(1, 'Local 1', 'descricao do local 1', '123.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rota`
--

CREATE TABLE `rota` (
  `id_rota` int(11) NOT NULL,
  `nome_rota` varchar(150) NOT NULL,
  `tempo_medio` varchar(150) NOT NULL,
  `imagem_perfil` varchar(150) NOT NULL,
  `descricao` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `desc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `desc`) VALUES
(1, 'Comum'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `tipo_usuario_id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`, `user`, `tipo_usuario_id_tipo_usuario`) VALUES
(1, 'erkmann08@gmail.com', '123', 'Mateus Moller Erkmann', 1),
(8, '123@123', '123', '123', 1),
(9, 'asdasda@dsa', 'asd', 'asd', 1),
(12, 'email@email', 'russo', 'Russao', 1),
(13, 'erkmann08@gm', '123123', 'Mateus M', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curtir_local`
--
ALTER TABLE `curtir_local`
  ADD KEY `fk_local_has_usuario_local1` (`local_id_local`),
  ADD KEY `fk_local_has_usuario_usuario1` (`usuario_id_usuario`);

--
-- Indexes for table `curtir_rota`
--
ALTER TABLE `curtir_rota`
  ADD KEY `fk_rota_has_usuario_rota1` (`rota_id_rota`),
  ADD KEY `fk_rota_has_usuario_usuario1` (`usuario_id_usuario`);

--
-- Indexes for table `imagem_l`
--
ALTER TABLE `imagem_l`
  ADD PRIMARY KEY (`id_imagem`);

--
-- Indexes for table `imagem_local`
--
ALTER TABLE `imagem_local`
  ADD KEY `fk_imagem_l_has_local_imagem_l1` (`imagem_l_id_imagem`),
  ADD KEY `fk_imagem_l_has_local_local1` (`local_id_local`);

--
-- Indexes for table `imagem_r`
--
ALTER TABLE `imagem_r`
  ADD PRIMARY KEY (`id_imagem`);

--
-- Indexes for table `imagem_rota`
--
ALTER TABLE `imagem_rota`
  ADD KEY `fk_imagem_r_has_rota_imagem_r1` (`imagem_r_id_imagem`),
  ADD KEY `fk_imagem_r_has_rota_rota1` (`rota_id_rota`);

--
-- Indexes for table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`);

--
-- Indexes for table `rota`
--
ALTER TABLE `rota`
  ADD PRIMARY KEY (`id_rota`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo_usuario_id_tipo_usuario` (`tipo_usuario_id_tipo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imagem_l`
--
ALTER TABLE `imagem_l`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagem_r`
--
ALTER TABLE `imagem_r`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rota`
--
ALTER TABLE `rota`
  MODIFY `id_rota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `curtir_local`
--
ALTER TABLE `curtir_local`
  ADD CONSTRAINT `fk_local_has_usuario_local1` FOREIGN KEY (`local_id_local`) REFERENCES `local` (`id_local`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_local_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `curtir_rota`
--
ALTER TABLE `curtir_rota`
  ADD CONSTRAINT `fk_rota_has_usuario_rota1` FOREIGN KEY (`rota_id_rota`) REFERENCES `rota` (`id_rota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rota_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `imagem_local`
--
ALTER TABLE `imagem_local`
  ADD CONSTRAINT `fk_imagem_l_has_local_imagem_l1` FOREIGN KEY (`imagem_l_id_imagem`) REFERENCES `imagem_l` (`id_imagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_imagem_l_has_local_local1` FOREIGN KEY (`local_id_local`) REFERENCES `local` (`id_local`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `imagem_rota`
--
ALTER TABLE `imagem_rota`
  ADD CONSTRAINT `fk_imagem_r_has_rota_imagem_r1` FOREIGN KEY (`imagem_r_id_imagem`) REFERENCES `imagem_r` (`id_imagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_imagem_r_has_rota_rota1` FOREIGN KEY (`rota_id_rota`) REFERENCES `rota` (`id_rota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `tipo_usuario_id_tipo_usuario` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
