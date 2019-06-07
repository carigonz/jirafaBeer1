SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `beerdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `beerdb` ;

-- -----------------------------------------------------
-- Table `beerdb`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `beerdb`.`users` (
  `id` INT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `lastName` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `gender` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC));


-- -----------------------------------------------------
-- Table `beerdb`.`styles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `beerdb`.`styles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL ,
  `description` VARCHAR(45) NULL ,
  `image` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) );


-- -----------------------------------------------------
-- Table `beerdb`.`presentation`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `beerdb`.`presentation` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `measure` MEDIUMINT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `measure_UNIQUE` (`measure` ASC) );


-- -----------------------------------------------------
-- Table `beerdb`.`products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `beerdb`.`products` (
  `id` INT NOT NULL ,
  `description` VARCHAR(255) NOT NULL,
  `style_id` INT NULL ,
  `presentation_id` TINYINT NULL ,
  `stock` MEDIUMINT NULL ,
  `price` VARCHAR(45) NULL ,
  `merchandising` VARCHAR(255) NULL ,
  `size` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `style_id_idx` (`style_id` ASC) ,
  INDEX `presentation_id_idx` (`presentation_id` ASC) ,
  CONSTRAINT `style_id`
    FOREIGN KEY (`style_id` )
    REFERENCES `beerdb`.`styles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `presentation_id`
    FOREIGN KEY (`presentation_id` )
    REFERENCES `beerdb`.`presentation` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `Giraff_Beer`.`orders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `beerdb`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `product_id` INT NULL ,
  `date` VARCHAR(45) NULL ,
  `product` VARCHAR(45) NULL ,
  `quantity` SMALLINT NULL ,
  `price` VARCHAR(45) NULL ,
  `status` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC) ,
  UNIQUE INDEX `product_id_UNIQUE` (`product_id` ASC) ,
  INDEX `product_id_idx` (`product_id` ASC) ,
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `beerdb`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `product_id`
    FOREIGN KEY (`product_id` )
    REFERENCES `beerdb`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

USE `beerdb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
