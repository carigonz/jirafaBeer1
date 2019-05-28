SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `Giraff_Beer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Giraff_Beer` ;

-- -----------------------------------------------------
-- Table `Giraff_Beer`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Giraff_Beer`.`usuarios` (
  `idUsuarios` INT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `lastName` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `gender` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(255) NULL ,
  PRIMARY KEY (`idUsuarios`) ,
  UNIQUE INDEX `idUsuarios_UNIQUE` (`idUsuarios` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = MariaDB;


-- -----------------------------------------------------
-- Table `Giraff_Beer`.`estilos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Giraff_Beer`.`estilos` (
  `idEstilos` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `imagen` VARCHAR(45) NULL ,
  PRIMARY KEY (`idEstilos`) )
ENGINE = MariaDB;


-- -----------------------------------------------------
-- Table `Giraff_Beer`.`volumen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Giraff_Beer`.`volumen` (
  `idVolumen` INT NOT NULL AUTO_INCREMENT ,
  `Medida` MEDIUMINT NULL ,
  PRIMARY KEY (`idVolumen`) ,
  UNIQUE INDEX `Medida_UNIQUE` (`Medida` ASC) )
ENGINE = MariaDB;


-- -----------------------------------------------------
-- Table `Giraff_Beer`.`talles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Giraff_Beer`.`talles` (
  `idtalles` INT NOT NULL ,
  `medida` INT NULL ,
  PRIMARY KEY (`idtalles`) )
ENGINE = MariaDB;


-- -----------------------------------------------------
-- Table `Giraff_Beer`.`merchandising`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Giraff_Beer`.`merchandising` (
  `idmerchandising` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `talle_id` INT NULL ,
  PRIMARY KEY (`idmerchandising`) ,
  INDEX `talle_id_idx` (`talle_id` ASC) ,
  CONSTRAINT `talle_id`
    FOREIGN KEY (`talle_id` )
    REFERENCES `Giraff_Beer`.`talles` (`idtalles` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MariaDB;


-- -----------------------------------------------------
-- Table `Giraff_Beer`.`productos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Giraff_Beer`.`productos` (
  `idProductos` INT NOT NULL ,
  `estilo_id` INT NULL ,
  `volumen_id` INT NULL ,
  `stock` INT NULL ,
  `precio` VARCHAR(45) NULL ,
  `merchandising_id` INT NULL ,
  `talle_id` TINYINT NULL ,
  PRIMARY KEY (`idProductos`) ,
  INDEX `estilo_id_idx` (`estilo_id` ASC) ,
  INDEX `volumen_id_idx` (`volumen_id` ASC) ,
  INDEX `merchandising_id_idx` (`merchandising_id` ASC) ,
  CONSTRAINT `estilo_id`
    FOREIGN KEY (`estilo_id` )
    REFERENCES `Giraff_Beer`.`estilos` (`idEstilos` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `volumen_id`
    FOREIGN KEY (`volumen_id` )
    REFERENCES `Giraff_Beer`.`volumen` (`idVolumen` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `merchandising_id`
    FOREIGN KEY (`merchandising_id` )
    REFERENCES `Giraff_Beer`.`merchandising` (`idmerchandising` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MariaDB;


-- -----------------------------------------------------
-- Table `Giraff_Beer`.`pedidos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Giraff_Beer`.`pedidos` (
  `idPedidos` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NULL ,
  `producto_id` INT NULL ,
  `fecha` VARCHAR(45) NULL ,
  `producto` VARCHAR(45) NULL ,
  `cantidad` INT(11) NULL ,
  `precio` VARCHAR(45) NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`idPedidos`) ,
  UNIQUE INDEX `usuario_id_UNIQUE` (`usuario_id` ASC) ,
  UNIQUE INDEX `idPedidos_UNIQUE` (`idPedidos` ASC) ,
  INDEX `producto_id_idx` (`producto_id` ASC) ,
  CONSTRAINT `usuario_id`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `Giraff_Beer`.`usuarios` (`idUsuarios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `producto_id`
    FOREIGN KEY (`producto_id` )
    REFERENCES `Giraff_Beer`.`productos` (`idProductos` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MariaDB;

USE `Giraff_Beer` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

SELECT * FROM usuarios;