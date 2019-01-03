-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jan-2019 às 22:53
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
  `dt_curtir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Estrutura da tabela `estabelecimento`
--

CREATE TABLE `estabelecimento` (
  `id_estabelecimento` int(11) NOT NULL,
  `nome_estabelecimento` varchar(150) NOT NULL,
  `link_site` varchar(1000) DEFAULT NULL,
  `link_maps` varchar(1500) NOT NULL,
  `imagem_perfil` varchar(200) NOT NULL,
  `tipo_estabelecimento_id_tipo_estabelecimento` int(11) NOT NULL,
  `descricao` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estabelecimento`
--

INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome_estabelecimento`, `link_site`, `link_maps`, `imagem_perfil`, `tipo_estabelecimento_id_tipo_estabelecimento`, `descricao`) VALUES
(8, 'Deck 20 - Chopp e Cozinha', 'deck20choppecozinha.business.site', 'https://www.google.com.br/maps/place/Deck+20+-+Chopp+E+Cozinha/@-26.2405372,-48.6417957,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94dd59344abab:0x55c4e4b936e1c12e!8m2!3d-26.240542!4d-48.639607', '03012019065624deck1.png', 1, 'a'),
(9, 'Restaurante Portela', 'facebook.com/Restaurante-Portela-449543991769271/', 'https://www.google.com.br/maps/place/Portela/@-26.2417229,-48.6423175,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94e7881139423:0xdedff621400a6e67!8m2!3d-26.2417277!4d-48.6401288', '03012019065701portela1.png', 1, NULL),
(10, 'Restaurante  Zibamba', 'facebook.com/pages/Restaurante-Zibamba/1411745895729875', 'https://www.google.com.br/maps/place/Zibamba/@-26.2422798,-48.6420027,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94dd611576613:0x653a5466612b65ab!8m2!3d-26.2422846!4d-48.639814', '03012019065735ziibamba1.png', 1, NULL),
(11, 'Versão Brasileira', 'facebook.com/versaobrasileirasfs/', 'https://www.google.com.br/maps/place/Vers%C3%A3o+Brasileira/@-26.2429763,-48.6416526,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94dd607eed117:0xaef006d6f46efb0!8m2!3d-26.2429811!4d-48.6394639', '03012019065836versbr1.png', 1, NULL),
(12, 'Restaurante Panorâmico ', 'facebook.com/RestaurantePanoramicoSFS/', 'https://www.google.com.br/maps/place/Restaurante+Panoramico/@-26.243078,-48.6571928,14z/data=!4m8!1m2!2m1!1sRestaurante+Panor%C3%A2mico+!3m4!1s0x0:0xfb88ae2e3229d4ac!8m2!3d-26.2439109!4d-48.6402833', '03012019065900PANORAM1.png', 1, NULL),
(13, 'Açoriano Restaurante e Pizzaria ', 'facebook.com/A%C3%A7oriano-Restaurante-e-Pizzaria-610520465706265/', 'https://www.google.com.br/maps/place/Acoriano+Restaurante+e+Pizzaria/@-26.2439732,-48.6418682,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94e7890470b0b:0x812dc8df0ecb77fa!8m2!3d-26.243978!4d-48.6396795', '03012019065925acoriano1.png', 1, NULL),
(14, 'Emporium do Açaí ', 'facebook.com/emporiumdoacaietapioca/', 'https://www.google.com.br/maps/search/Emp%C3%B3rium+do+A%C3%A7a%C3%AD+/@-26.244122,-48.6460096,15z/data=!3m1!4b1', '03012019065950emporiouacai.png', 1, NULL),
(15, 'Restaurante Container ', 'containerrestaurante.com.br/', 'https://www.google.com.br/maps/place/Container/@-26.2452572,-48.6424827,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94dd5a2fd45f9:0x36ee339f41824ce4!8m2!3d-26.245262!4d-48.640294', '03012019070421container1.png', 1, NULL),
(16, 'Consulado – Café Museu ', 'facebook.com/consuladocafemuseu/', 'https://www.google.com.br/maps/place/CONSULADO+caf%C3%A9+museu/@-26.2404045,-48.6413037,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94dd7d4ea8e5d:0x4889248c0e843ac3!8m2!3d-26.2404093!4d-48.639115', '03012019070851consulado1.png', 1, NULL),
(17, 'Shiori Hause', 'facebook.com/shiori.hause', 'https://www.google.com.br/maps/place/Shiori+Sushi+House/@-26.2443322,-48.6418425,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94dd5ff3b3071:0x592b720e76424ac5!8m2!3d-26.244337!4d-48.6396538', '03012019071559shiori.png', 1, NULL),
(18, 'Estrela do Sul Restaurante', 'facebook.com/Estrela-do-Sul-Restaurante-1096901060422161/', 'https://www.google.com.br/maps/place/Estrela+do+Sul/@-26.245198,-48.6397637,17z/data=!4m5!3m4!1s0x94d94dd59bfadcd3:0x56553f8a2fe33514!8m2!3d-26.2452413!4d-48.6397959', '03012019072003estrela1.png', 1, NULL),
(19, 'Empório Bebidas Babitonga ', 'facebook.com/pages/Emp%C3%B3rio-Bebidas-Babitonga/1175037752586813?__tn__=%2CdkC-R-R&eid=ARAmcNfwplk9VcqbLHJ7TtEropAPQ3lmfXcUtuErxknJCW-XydajZLIm_D3x1LV1X2cAGn5ySHEFQYLX&hc_ref=ARS1R1-oqb8WorH1dN7NfC8YIkGG2Vh6wXhDHbHY_87TheZRDZXE6mCoN98rRJhF-Xg&fref=tag', 'https://www.google.com.br/maps/place/Emp%C3%B3rio+Bar+e+Cozinha/@-26.2422182,-48.6422293,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94dd5efc7371d:0x1497ac83b244097!8m2!3d-26.242223!4d-48.6400406', '03012019073228emporiobeb1.png', 1, NULL),
(20, 'Inês Zardo Doces e Salgados', 'facebook.com/pages/Caf%C3%A9-E-Delicatessen-In%C3%AAs-Zardo-Doces-e-Salgados/786447704705980', 'https://www.google.com.br/maps/place/Cafe+e+Delicatessen+In%C3%AAs+Zardo/@-26.2442594,-48.6408496,18z/data=!4m5!3m4!1s0x94d94dd6096f93e1:0x82659fed3165f223!8m2!3d-26.2442642!4d-48.6397553', '03012019073918ines.jpg', 1, NULL),
(21, 'Porto Mediterrâneo ', 'facebook.com/importadoraportomediterraneo/', 'https://www.google.com.br/maps/place/Porto+Mediterr%C3%A2neo/@-26.2441112,-48.6383645,18z/data=!4m5!3m4!1s0x94d94e7f60c563a3:0xd21d035a1ce1b306!8m2!3d-26.244104!4d-48.6386381', '03012019074202portomed.jpg', 1, NULL),
(22, 'Complexo Convés do Capitão', 'facebook.com/convesdocapitao/\r\n', 'https://www.google.com.br/maps/place/Caf%C3%A9+Conv%C3%A9s+do+Capit%C3%A3o/@-26.242172,-48.6421044,17z/data=!4m8!1m2!2m1!1zQ2Fmw6kgQ29udsOpcyBkbyBDYXBpdMOjbw!3m4!1s0x94d94dd6096f93e1:0x883e5ba03049c59e!8m2!3d-26.2412265!4d-48.6401025', '03012019074429convesdocap.jpg', 1, NULL),
(23, 'Santo Chico Beer Shop ', 'facebook.com/santochicobeer/', 'https://www.google.com.br/maps/place/Santo+Chico/@-26.2430194,-48.6419768,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94dd6099b2d6d:0x9afff5f36c36bab7!8m2!3d-26.2430242!4d-48.6397881', '03012019074634santochico.jpg', 1, NULL),
(24, 'Porto Cerveja São Chico ', 'facebook.com/portocervejasaochico/', 'https://www.google.com.br/maps/place/Porto+Cerveja+S%C3%A3o+Chico/@-26.2432338,-48.6423699,17z/data=!3m1!4b1!4m5!3m4!1s0x94d94dd5e0073169:0x39215f08979e2aeb!8m2!3d-26.2432386!4d-48.6401812', '03012019074838portocerveja.jpg', 1, NULL);

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
(20, '2112201801564417122018010921fotoprincipal.jpg', '', 1),
(26, '29122018082908Apresentação2-min.jpg', '', 1),
(27, '29122018084019l.jpg', '', 1),
(28, '020120191030563.JPG', '', 1),
(29, '020120191032563.JPG', '', 1),
(30, '020120191123583.JPG', '', 1),
(31, '030120191244113.JPG', '', 1),
(32, '030120191244451.jpg', '', 1),
(33, '03012019122617WhatsApp Image 2019-01-02 at 21.34.35.jpeg', '', 1);

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
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 3),
(33, 4);

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
(3, 'Walking Tour', '40 minutos - 1 hora', '030120191244461 P.jpeg', 'Rota para conhecer as belezas que São Francisco do Sul proporciona aos visitantes, observando belas paisagens e um pouco da vasta arquitetura do Centro Histórico do município.\r\n\r\nLocal 1: Mercado Municipal.\r\nLocal 2: Igreja Matriz Nossa Senhora da Graça.\r\nLocal 3: Parque Ecológico Municipal.', 'https://www.google.com/maps/dir//Mercado+Municipal/Igreja+Matriz+Nossa+Senhora+da+Gra%C3%A7a/Parque+Ecol%C3%B3gico+Municipal/@-26.2423811,-48.6742866,13z/data=!3m1!4b1!4m21!4m20!1m0!1m5!1m1!1s0x0:0xcedca16c4a49a752!2m2!1d-48.6399539!2d-26.243185!1m5!1m1!1s0x94d94e7f5b9b3711:0x628263187ba5de10!2m2!1d-48.63858!2d-26.243422!1m5!1m1!1s0x0:0xf07943aea3d66b70!2m2!1d-48.6389168!2d-26.2415026!3e2'),
(4, 'Circuito Náutico', '2 horas', '29122018082909Museu do mar 6-min.jpg', 'Quer conhecer um pouco mais sobre como funciona a vida no mar? Então essa rota é exatamente pra você! Com o Circuito Náutico você poderá entrar numa réplica de convés de um navio, entender um pouco sobre os vários tipos de embarcações que existem no Brasil e, ainda, relaxar em uma praça temática com um fragmento de submarino! \r\n\r\nLocal 1: Museu Convés do Capitão.\r\nLocal 2: Museus Nacional do Mar.\r\nLocal 3: Praça do Submarino.', 'https://www.google.com/maps/dir//Caf%C3%A9+Bistro/Museu+Nacional+do+Mar+Embarca%C3%A7%C3%B5es+Brasileiras/-26.2404075,-48.6395198/@-26.2407738,-48.6746586,13z/data=!3m1!4b1!4m16!4m15!1m0!1m5!1m1!1s0x94d94df7bd26001b:0xa3d2b7cf9d3f3b60!2m2!1d-48.6401549!2d-26.2411431!1m5!1m1!1s0x94d94dd7d37eaf8f:0x658fb11ccef46fdf!2m2!1d-48.639123!2d-26.240567!1m0!3e2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rota_local`
--

CREATE TABLE `rota_local` (
  `rota_id_rota` int(11) NOT NULL,
  `local_id_local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(8, '123@123', '123', '123', 1),
(9, 'asdasda@dsa', 'asd', 'asd', 1),
(12, 'email@email', 'russo', 'Russao', 1),
(13, 'erkmann08@gm', '123123', 'Mateus M', 2),
(14, 'erkmann08@gmail.com', '123321', 'Mateus Erkmann', 1),
(15, 'projeto@projeto', '$2y$10$BmhF3RSzhRWnG1BMlnBMJ.m23j1PDz8AEc7CX5W/ByzHl.McybIQS', 'projeto', 2);

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
  MODIFY `id_estabelecimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `imagem_l`
--
ALTER TABLE `imagem_l`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `imagem_r`
--
ALTER TABLE `imagem_r`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rota`
--
ALTER TABLE `rota`
  MODIFY `id_rota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipo_estabelecimento`
--
ALTER TABLE `tipo_estabelecimento`
  MODIFY `id_tipo_estabelecimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
