SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `eidb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `eidb` ;

-- -----------------------------------------------------
-- Table `eidb`.`ei_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eidb`.`ei_user` (
  `iduser` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NULL ,
  `name` VARCHAR(145) NULL ,
  `email` VARCHAR(145) NULL ,
  `password` VARCHAR(45) NULL ,
  `utype` INT NULL ,
  PRIMARY KEY (`iduser`) ,
  UNIQUE INDEX `index2` (`login` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eidb`.`ei_blog`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eidb`.`ei_blog` (
  `idblog` INT NOT NULL AUTO_INCREMENT ,
  `datec` DATETIME NULL ,
  `iduser` VARCHAR(45) NULL ,
  `title` VARCHAR(45) NULL ,
  `data` TEXT NULL ,
  `image` BLOB NULL ,
  `ptype` INT NULL ,
  `link` VARCHAR(145) CHARACTER SET 'dec8' COLLATE 'dec8_bin' NULL ,
  PRIMARY KEY (`idblog`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eidb`.`ei_event`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eidb`.`ei_event` (
  `idevent` INT NOT NULL AUTO_INCREMENT ,
  `datei` DATETIME NULL ,
  `datef` DATETIME NULL ,
  `name` VARCHAR(145) NULL ,
  `place` VARCHAR(145) NULL ,
  `city` VARCHAR(45) NULL ,
  `url` VARCHAR(45) NULL ,
  `guid` VARCHAR(45) NULL ,
  PRIMARY KEY (`idevent`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eidb`.`ei_media`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eidb`.`ei_media` (
  `idmedia` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(145) NULL ,
  `dateu` DATETIME NULL ,
  `description` VARCHAR(145) NULL ,
  `image` VARCHAR(145) NULL ,
  `status` INT NULL ,
  PRIMARY KEY (`idmedia`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eidb`.`ei_photo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eidb`.`ei_photo` (
  `idphoto` INT NOT NULL AUTO_INCREMENT ,
  `image` VARCHAR(145) NULL ,
  `thumb` VARCHAR(145) NULL ,
  `idgallery` INT NULL ,
  `title` VARCHAR(45) NULL ,
  `status` INT NULL ,
  PRIMARY KEY (`idphoto`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eidb`.`ei_gallery`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eidb`.`ei_gallery` (
  `idgallery` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(145) NULL ,
  `status` INT NULL ,
  PRIMARY KEY (`idgallery`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
