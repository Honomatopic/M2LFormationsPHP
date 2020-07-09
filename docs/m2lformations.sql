-- MySQL Script generated by MySQL Workbench
-- Thu Jul  9 15:46:57 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema m2lformations
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema m2lformations
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `m2lformations` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `m2lformations` ;

-- -----------------------------------------------------
-- Table `m2lformations`.`Employe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`Employe` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(250) NULL,
  `prenom` VARCHAR(250) NULL,
  `email` VARCHAR(250) NULL,
  `motpasse` VARCHAR(250) NULL,
  `statut` TINYINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `m2lformations`.`Formation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`Formation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `intitule` VARCHAR(250) NULL,
  `datedebut` DATE NULL,
  `datefin` DATE NULL,
  `lieu` VARCHAR(250) NULL,
  `prestataire` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `m2lformations`.`Inscrire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `m2lformations`.`Inscrire` (
  `Employe_id` INT NULL,
  `Formation_id` INT NULL,
  PRIMARY KEY (`Employe_id`, `Formation_id`),
  INDEX `fk_Employe_has_Formation_Formation1_idx` (`Formation_id` ASC),
  INDEX `fk_Employe_has_Formation_Employe_idx` (`Employe_id` ASC),
  CONSTRAINT `fk_Employe_has_Formation_Employe`
    FOREIGN KEY (`Employe_id`)
    REFERENCES `m2lformations`.`Employe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employe_has_Formation_Formation1`
    FOREIGN KEY (`Formation_id`)
    REFERENCES `m2lformations`.`Formation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
