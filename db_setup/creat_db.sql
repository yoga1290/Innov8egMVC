SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`categories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`categories` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`articles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`articles` (
  `id` INT NOT NULL ,
  `catid` INT NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `body` VARCHAR(45) NOT NULL ,
  `summary` VARCHAR(45) NOT NULL ,
  `adate` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cat` (`catid` ASC) ,
  CONSTRAINT `fk_cat`
    FOREIGN KEY (`catid` )
    REFERENCES `mydb`.`categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`comments`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`comments` (
  `cdate` DATETIME NOT NULL ,
  `id` INT NOT NULL ,
  `articleid` INT NOT NULL ,
  `comment` VARCHAR(200) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_article` (`articleid` ASC) ,
  CONSTRAINT `fk_article`
    FOREIGN KEY (`articleid` )
    REFERENCES `mydb`.`articles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
