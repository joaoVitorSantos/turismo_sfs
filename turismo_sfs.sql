-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Dez-2018 às 14:22
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

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
-- Estrutura da tabela `curtir_estabelecimento`
--

CREATE TABLE `curtir_estabelecimento` (
  `estabelecimento_id_estabelecimento` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `dt_curtir` varchar(45) NOT NULL,
  `avaliacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtir_local`
--

CREATE TABLE `curtir_local` (
  `local_id_local` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avaliacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curtir_local`
--

INSERT INTO `curtir_local` (`local_id_local`, `usuario_id_usuario`, `dt_curtir`, `avaliacao`) VALUES
(1, 13, '2018-12-21 12:57:41', 2),
(1, 8, '2018-12-19 20:42:05', 4);

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

--
-- Extraindo dados da tabela `curtir_rota`
--

INSERT INTO `curtir_rota` (`rota_id_rota`, `usuario_id_usuario`, `dt_curtir`, `avaliacao`) VALUES
(1, 13, '2018-12-21 10:43:42', 5),
(1, 8, 'CURRENT_TIMESTAMP', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

CREATE TABLE `estabelecimento` (
  `id_estabelecimento` int(11) NOT NULL,
  `nome_estabelecimento` varchar(150) NOT NULL,
  `link_site` varchar(1000) DEFAULT NULL,
  `link_maps` varchar(1500) NOT NULL,
  `imagem_perfil` varchar(200) NOT NULL,
  `tipo_estabelecimento_id_tipo_estabelecimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estabelecimento`
--

INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome_estabelecimento`, `link_site`, `link_maps`, `imagem_perfil`, `tipo_estabelecimento_id_tipo_estabelecimento`) VALUES
(1, 'Cabana do Zé', 'www.google.com', 'https://www.google.com.br/maps/dir//Maruju\'s+Restaurante+-+Av.+Atl%C3%A2ntica,+1902+-+Praia+da+Enseada,+S%C3%A3o+Francisco+do+Sul+-+SC,+89240-000/@-26.222856,-48.6409877,11z/data=!4m9!4m8!1m0!1m5!1m1!1s0x94d9443c48a57649:0x9b850fe0346db6d!2m2!1d-48.500912!2d-26.222856!3e0', 'quadra_if.jpg', 1),
(2, 'Hotel Villa Real', 'https://www.hoteisvillareal.com.br/hotel-sao-francisco-do-sul/', 'https://www.google.com/maps/place/Hotel+VillaReal+S%C3%A3o+Francisco+do+Sul/@-26.230175,-48.6294897,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94e6f18cede69:0x69ee994bdf03ac02!8m2!3d-26.230175!4d-48.627301', 'hotel_vila_reall.png', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_l`
--

CREATE TABLE `imagem_l` (
  `id_imagem` int(11) NOT NULL,
  `nome_imagem` varchar(200) NOT NULL,
  `local` varchar(200) NOT NULL,
  `maps` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagem_l`
--

INSERT INTO `imagem_l` (`id_imagem`, `nome_imagem`, `local`, `maps`) VALUES
(2, 'a', 'b', 0),
(3, '2112201801494817122018010921fotoprincipal.jpg', '', 1),
(4, '21122018014948WhatsApp Image 2018-11-15 at 15.08.25.jpeg', '', 0),
(5, '2112201801582517122018010921fotoprincipal.jpg', '', 1),
(6, '2112201801582620122018044811final.jpg', '', 0),
(7, '2112201802021017122018010921loja.jpg', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_local`
--

CREATE TABLE `imagem_local` (
  `imagem_l_id_imagem` int(11) NOT NULL,
  `local_id_local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagem_local`
--

INSERT INTO `imagem_local` (`imagem_l_id_imagem`, `local_id_local`) VALUES
(3, 2),
(4, 2),
(5, 1),
(7, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_r`
--

CREATE TABLE `imagem_r` (
  `id_imagem` int(11) NOT NULL,
  `nome_imagem` varchar(200) NOT NULL,
  `local` varchar(200) NOT NULL,
  `maps` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagem_r`
--

INSERT INTO `imagem_r` (`id_imagem`, `nome_imagem`, `local`, `maps`) VALUES
(2, '1712201812545320180816_181100-min.jpg', '', 0),
(4, '17122018125548', '', 0),
(6, '17122018125722', '', 0),
(8, '17122018125858', '', 0),
(11, '17122018010124logo_teste.png', '', 0),
(13, '1712201801024517122018010124fotoprincipal.jpg', '', 0),
(15, '17122018010553', '', 0),
(16, '17122018010749', '', 0),
(17, '17122018010921fotoprincipal.jpg', '', 1),
(18, '171220180109211712201812235820180816_181100-min.jpg', '', 0),
(19, '2112201801470717122018010245fotoprincipal.jpg', '', 0),
(20, '2112201801564417122018010921fotoprincipal.jpg', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_rota`
--

CREATE TABLE `imagem_rota` (
  `imagem_r_id_imagem` int(11) NOT NULL,
  `rota_id_rota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagem_rota`
--

INSERT INTO `imagem_rota` (`imagem_r_id_imagem`, `rota_id_rota`) VALUES
(20, 1),
(19, 1),
(2, 1),
(4, 1),
(6, 1),
(8, 1),
(11, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `id_local` int(11) NOT NULL,
  `nome_local` varchar(150) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `imagem_perfil` varchar(250) NOT NULL,
  `link` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`id_local`, `nome_local`, `descricao`, `imagem_perfil`, `link`) VALUES
(1, 'Centro Histórico', 'Um ótimo lugar para visitar', 'fotoprincipal.jpg', 'https://www.google.com.br/maps/dir//Museu+Hist%C3%B3rico+Prefeito+Jos%C3%A9+Schmidt,+R.+Cel.+Carvalho,+1+-+Centro,+S%C3%A3o+Francisco+do+Sul+-+SC,+89240-000/@-26.2473461,-48.647829,16.97z/data=!4m8!4m7!1m0!1m5!1m1!1s0x94d94c2b2ad8ec47:0xccacd6c842722df1!2m2!1d-48.641694!2d-26.2491167+R.+Francisco+Machado+de+Souza,+1135+-+Do+Paulas,+S%C3%A3o+Francisco+do+Sul+-+SC,+89240-000/@-26.230175,-48.6294897,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x94d94e6f18cede69:0x69ee994bdf03ac02!2m2!1d-48.627301!2d-26.230175'),
(2, 'AB', 'AB', '21122018014947darth_vader_armor_star_wars_film_hat_snow_93645_1920x1080.jpg', 'https://www.google.com/maps/dir/-26.2423485,-48.6408134/Mercado+Municipal/Igreja+Matriz+Nossa+Senhora+da+Gra%C3%A7a/Parque+Ecol%C3%B3gico+Municipal/@-26.2424886,-48.6403375,357m/data=!3m1!1e3!4m21!4m20!1m0!1m5!1m1!1s0x0:0xcedca16c4a49a752!2m2!1d-48.6399539!2d-26.243185!1m5!1m1!1s0x94d94e7f5b9b3711:0x628263187ba5de10!2m2!1d-48.63858!2d-26.243422!1m5!1m1!1s0x0:0xf07943aea3d66b70!2m2!1d-48.6389168!2d-26.2415026!3e2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rota`
--

CREATE TABLE `rota` (
  `id_rota` int(11) NOT NULL,
  `nome_rota` varchar(150) NOT NULL,
  `tempo_medio` varchar(150) NOT NULL,
  `imagem_perfil` varchar(150) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `link` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rota`
--

INSERT INTO `rota` (`id_rota`, `nome_rota`, `tempo_medio`, `imagem_perfil`, `descricao`, `link`) VALUES
(1, 'Rota ReligiosaAA', '30 minutos', '2112201801470717122018010008fotoprincipal.jpg', 'Uma rota muito recomendada...', 'https://www.google.com/maps/dir/-26.2423485,-48.6408134/Mercado+Municipal/Igreja+Matriz+Nossa+Senhora+da+Gra%C3%A7a/Parque+Ecol%C3%B3gico+Municipal/@-26.2424886,-48.6403375,357m/data=!3m1!1e3!4m21!4m20!1m0!1m5!1m1!1s0x0:0xcedca16c4a49a752!2m2!1d-48.6399539!2d-26.243185!1m5!1m1!1s0x94d94e7f5b9b3711:0x628263187ba5de10!2m2!1d-48.63858!2d-26.243422!1m5!1m1!1s0x0:0xf07943aea3d66b70!2m2!1d-48.6389168!2d-26.2415026!3e2'),
(2, 'Tour 1 hora', '1 hora', 'ROTA 3.jpg', 'Uma rota muito completa...', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rota_local`
--

CREATE TABLE `rota_local` (
  `rota_id_rota` int(11) NOT NULL,
  `local_id_local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rota_local`
--

INSERT INTO `rota_local` (`rota_id_rota`, `local_id_local`) VALUES
(1, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_estabelecimento`
--

CREATE TABLE `tipo_estabelecimento` (
  `id_tipo_estabelecimento` int(11) NOT NULL,
  `desc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_estabelecimento`
--

INSERT INTO `tipo_estabelecimento` (`id_tipo_estabelecimento`, `desc`) VALUES
(1, 'Gastronomia'),
(2, 'Hospedagem'),
(3, 'Serviços'),
(4, 'Arquitetura'),
(5, 'Museus');

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
-- Indexes for table `curtir_estabelecimento`
--
ALTER TABLE `curtir_estabelecimento`
  ADD KEY `fk_estabelecimento_has_usuario_estabelecimento1` (`estabelecimento_id_estabelecimento`),
  ADD KEY `fk_estabelecimento_has_usuario_usuario1` (`usuario_id_usuario`);

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
-- Indexes for table `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`id_estabelecimento`),
  ADD KEY `fk_estabelecimento_tipo_estabelecimento1` (`tipo_estabelecimento_id_tipo_estabelecimento`);

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
-- Indexes for table `rota_local`
--
ALTER TABLE `rota_local`
  ADD KEY `fk_rota_has_local_rota1` (`rota_id_rota`),
  ADD KEY `fk_rota_has_local_local1` (`local_id_local`);

--
-- Indexes for table `tipo_estabelecimento`
--
ALTER TABLE `tipo_estabelecimento`
  ADD PRIMARY KEY (`id_tipo_estabelecimento`);

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
-- AUTO_INCREMENT for table `estabelecimento`
--
ALTER TABLE `estabelecimento`
  MODIFY `id_estabelecimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `imagem_l`
--
ALTER TABLE `imagem_l`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `imagem_r`
--
ALTER TABLE `imagem_r`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rota`
--
ALTER TABLE `rota`
  MODIFY `id_rota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_estabelecimento`
--
ALTER TABLE `tipo_estabelecimento`
  MODIFY `id_tipo_estabelecimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `curtir_estabelecimento`
--
ALTER TABLE `curtir_estabelecimento`
  ADD CONSTRAINT `fk_estabelecimento_has_usuario_estabelecimento1` FOREIGN KEY (`estabelecimento_id_estabelecimento`) REFERENCES `estabelecimento` (`id_estabelecimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estabelecimento_has_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Limitadores para a tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD CONSTRAINT `fk_estabelecimento_tipo_estabelecimento1` FOREIGN KEY (`tipo_estabelecimento_id_tipo_estabelecimento`) REFERENCES `tipo_estabelecimento` (`id_tipo_estabelecimento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Limitadores para a tabela `rota_local`
--
ALTER TABLE `rota_local`
  ADD CONSTRAINT `fk_rota_has_local_local1` FOREIGN KEY (`local_id_local`) REFERENCES `local` (`id_local`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rota_has_local_rota1` FOREIGN KEY (`rota_id_rota`) REFERENCES `rota` (`id_rota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `b` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
