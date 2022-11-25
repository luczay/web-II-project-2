CREATE DATABASE IF NOT EXISTS `utazas`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE  `utazas`;

CREATE TABLE IF NOT EXISTS `user` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `firstname` varchar(10) NOT NULL,
    `lastname` varchar(10) NOT NULL,
    `username` varchar(10) NOT NULL,
    `password` varchar(40) NOT NULL,
    PRIMARY KEY (`id`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `helyseg` (
    `az` int(1) NOT NULL,
    `nev` text NOT NULL,
    `orszag` text NOT NULL,
    PRIMARY KEY (`az`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `szalloda` (
    `az` varchar(2) NOT NULL,
    `nev` text NOT NULL,
    `besorolas` int(1) NOT NULL,
    `helyseg_az` int NOT NULL,
    `tengerpart_tav` int NOT NULL,
    `repter_tav` int NOT NULL,
    `felpanzio` boolean NOT NULL,
    PRIMARY KEY (`az`),
    FOREIGN KEY (`helyseg_az`) REFERENCES helyseg(az)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `tavasz` (
    `sorszam` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `szalloda_az` varchar(2) NOT NULL,
    `indulas` date NOT NULL,
    `idotartam` int NOT NULL,
    `ar` int NOT NULL,
    PRIMARY KEY (`sorszam`),
    FOREIGN KEY (`szalloda_az`) REFERENCES szalloda(az)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

LOAD DATA INFILE 'C:/xampp/htdocs/utazas/make_db/helyseg.txt' INTO TABLE helyseg IGNORE 1 LINES;
LOAD DATA INFILE 'C:/xampp/htdocs/utazas/make_db/szalloda.txt' INTO TABLE szalloda IGNORE 1 LINES;
LOAD DATA INFILE 'C:/xampp/htdocs/utazas/make_db/tavasz.txt' INTO TABLE tavasz IGNORE 1 LINES;