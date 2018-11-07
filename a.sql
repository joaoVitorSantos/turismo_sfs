SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema turismo_sfs
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema turismo_sfs
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
-- create database turismo_sfs;

CREATE TABLE IF NOT EXISTS `turismo_sfs`.`usuario` (
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `turismo_sfs`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismo_sfs`.`tipo_usuario` (
  `id_tipo_usuario` INT NOT NULL,
  `desc` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turismo_sfs`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismo_sfs`.`usuario` (
  `id_usuario` INT NOT NULL,
  `nome_usuario` VARCHAR(200) NOT NULL,
  `email` VARCHAR(300) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `tipo_usuario_id_tipo_usuario` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_usuario_tipo_usuario`
    FOREIGN KEY (`tipo_usuario_id_tipo_usuario`)
    REFERENCES `turismo_sfs`.`tipo_usuario` (`id_tipo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turismo_sfs`.`rota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismo_sfs`.`rota` (
  `id_rota` INT NOT NULL,
  `nome_rota` VARCHAR(150) NOT NULL,
  `tempo_medio` VARCHAR(150) NOT NULL,
  `imagem_perfil` VARCHAR(150) NOT NULL,
  `descricao` VARCHAR(5000) NOT NULL,
  PRIMARY KEY (`id_rota`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turismo_sfs`.`local`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismo_sfs`.`local` (
  `id_local` INT NOT NULL,
  `nome_local` VARCHAR(150) NOT NULL,
  `descricao` VARCHAR(5000) NOT NULL,
  `imagem_perfil` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id_local`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turismo_sfs`.`curtir_rota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismo_sfs`.`curtir_rota` (
  `rota_id_rota` INT NOT NULL,
  `usuario_id_usuario` INT NOT NULL,
  `dt_curtir` VARCHAR(45) NOT NULL,
  `avaliacao` TINYINT(1) NOT NULL,
  CONSTRAINT `fk_rota_has_usuario_rota1`
    FOREIGN KEY (`rota_id_rota`)
    REFERENCES `turismo_sfs`.`rota` (`id_rota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rota_has_usuario_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `turismo_sfs`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turismo_sfs`.`curtir_local`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismo_sfs`.`curtir_local` (
  `local_id_local` INT NOT NULL,
  `usuario_id_usuario` INT NOT NULL,
  `dt_curtir` VARCHAR(45) NOT NULL,
  `avaliacao` TINYINT(1) NOT NULL,
  CONSTRAINT `fk_local_has_usuario_local1`
    FOREIGN KEY (`local_id_local`)
    REFERENCES `turismo_sfs`.`local` (`id_local`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_local_has_usuario_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `turismo_sfs`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turismo_sfs`.`imagem_r`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismo_sfs`.`imagem_r` (
  `id_imagem` INT NOT NULL,
  `nome_imagem` VARCHAR(200) NOT NULL,
  `local` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_imagem`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turismo_sfs`.`imagem_rota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismo_sfs`.`imagem_rota` (
  `imagem_id_imagem` INT NOT NULL,
  `rota_id_rota` INT NOT NULL,
  CONSTRAINT `fk_imagem_r_has_rota_imagem_r1`
    FOREIGN KEY (`imagem_id_imagem`)
    REFERENCES `turismo_sfs`.`imagem_r` (`id_imagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagem_r_has_rota_rota1`
    FOREIGN KEY (`rota_id_rota`)
    REFERENCES `turismo_sfs`.`rota` (`id_rota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turismo_sfs`.`imagem_l`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismo_sfs`.`imagem_l` (
  `id_imagem` INT NOT NULL,
  `nome_imagem` VARCHAR(200) NOT NULL,
  `local` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_imagem`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turismo_sfs`.`imagem_local`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismo_sfs`.`imagem_local` (
  `imagem_id_imagem` INT NOT NULL,
  `local_id_local` INT NOT NULL,
  CONSTRAINT `fk_imagem_l_has_local_imagem_l1`
    FOREIGN KEY (`imagem_id_imagem`)
    REFERENCES `turismo_sfs`.`imagem_l` (`id_imagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagem_l_has_local_local1`
    FOREIGN KEY (`local_id_local`)
    REFERENCES `turismo_sfs`.`local` (`id_local`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
