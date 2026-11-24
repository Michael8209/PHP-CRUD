CREATE DATABASE IF NOT EXISTS crud_app;
USE crud_app;

CREATE TABLE IF NOT EXISTS `voorraadbeheer`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `naam` VARCHAR(30) NOT NULL,
    `categorie` VARCHAR(20) NOT NULL,
    `korte_beschrijving` VARCHAR(60) NOT NULL,
    `hoeveelheid` TINYINT NOT NULL
);

INSERT INTO `voorraadbeheer` (`naam`, `categorie`, `korte_beschrijving`, `hoeveelheid`) VALUES
('Laptop', 'Elektronica', 'Lenovo ThinkPad', 5),
('Bureaustoel', 'Meubilair', 'Ergonomische stoel', 10),
('Monitor', 'Elektronica', '24 inch Full HD', 8);
