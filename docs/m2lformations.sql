-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema m2lformations
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema m2lformations
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `m2lformations` DEFAULT CHARACTER SET utf8 ;
USE `m2lformations` ;

-- -----------------------------------------------------
-- Table `m2lformations`.`employe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`employe` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(250) NULL DEFAULT NULL,
  `prenom` VARCHAR(250) NULL DEFAULT NULL,
  `email` VARCHAR(250) NULL DEFAULT NULL,
  `motpasse` VARCHAR(250) NULL DEFAULT NULL,
  `statut` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `m2lformations`.`formation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`formation` (
  `id` INT(11) NOT NULL,
  `intitule` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `m2lformations`.`prestataire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`prestataire` (
  `id` INT(11) NOT NULL,
  `nom` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `m2lformations`.`salle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`salle` (
  `id` INT(11) NOT NULL,
  `nom` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `m2lformations`.`intervenant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`intervenant` (
  `id` INT(11) NOT NULL,
  `nom` VARCHAR(255) NULL,
  `prenom` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `m2lformations`.`duree`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`duree` (
  `id` INT(11) NOT NULL,
  `datedebut` DATE NULL,
  `datefin` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `m2lformations`.`session`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`session` (
  `id` INT(11) NOT NULL,
  `formation_id` INT(11) NULL,
  `duree_id` INT(11) NULL,
  `salle_id` INT(11) NULL,
  `intervenant_id` INT(11) NULL,
  `prestataire_id` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_session_intervenant1_idx` (`intervenant_id` ASC),
  INDEX `fk_session_prestataire1_idx` (`prestataire_id` ASC),
  INDEX `fk_session_formation1_idx` (`formation_id` ASC),
  INDEX `fk_session_duree1_idx` (`duree_id` ASC),
  INDEX `fk_session_salle1_idx` (`salle_id` ASC),
  CONSTRAINT `fk_session_intervenant1`
    FOREIGN KEY (`intervenant_id`)
    REFERENCES `m2lformations`.`intervenant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_prestataire1`
    FOREIGN KEY (`prestataire_id`)
    REFERENCES `m2lformations`.`prestataire` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_formation1`
    FOREIGN KEY (`formation_id`)
    REFERENCES `m2lformations`.`formation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_duree1`
    FOREIGN KEY (`duree_id`)
    REFERENCES `m2lformations`.`duree` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_salle1`
    FOREIGN KEY (`salle_id`)
    REFERENCES `m2lformations`.`salle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `m2lformations`.`inscrire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`inscrire` (
  `session_id` INT(11) NULL,
  `employe_id` INT(11) NULL,
  INDEX `fk_session_has_employe_employe1_idx` (`employe_id` ASC),
  INDEX `fk_session_has_employe_session1_idx` (`session_id` ASC),
  CONSTRAINT `fk_session_has_employe_session1`
    FOREIGN KEY (`session_id`)
    REFERENCES `m2lformations`.`session` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_has_employe_employe1`
    FOREIGN KEY (`employe_id`)
    REFERENCES `m2lformations`.`employe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
