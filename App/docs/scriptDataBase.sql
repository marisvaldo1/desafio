CREATE DATABASE `desafio` /*!40100 COLLATE 'utf8mb4_general_ci' */

CREATE TABLE `products` (
	`id_product` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`sku` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`price` FLOAT NOT NULL,
	`description` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`quantity` INT(11) NOT NULL,
	`image` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id_product`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;


CREATE TABLE `products_category` (
	`id_product` INT(11) NULL DEFAULT NULL,
	`id_category` INT(11) NULL DEFAULT NULL,
	INDEX `FK__products` (`id_product`) USING BTREE,
	INDEX `FK__categories` (`id_category`) USING BTREE,
	CONSTRAINT `FK__categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `FK__products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `categories` (
	`id_category` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`code` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id_category`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;