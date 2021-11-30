create database `test2`;

use `test2`;

CREATE TABLE `login` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE = InnoDB;

CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL,
  `marca` int(5) NOT NULL, 
  `valor` varchar(50) NOT NULL,
  `peso` VARCHAR(50) NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (login_id) REFERENCES login(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = InnoDB

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `qty` int(5) NOT NULL,
  `marca` int(5) NOT NULL, 
  `valor` varchar(50) NOT NULL,
  `peso` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 
