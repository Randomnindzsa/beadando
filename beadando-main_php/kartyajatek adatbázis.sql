CREATE DATABASE kartyajatek DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_hungarian_ci;

USE kartyajatek;


CREATE TABLE felhasznalok
(id INT PRIMARY KEY AUTO_INCREMENT,
vezeteknev VARCHAR(100) NOT NULL,
keresztnev VARCHAR(100) NOT NULL,
email VARCHAR(40) NOT NULL,
felhasznalonev VARCHAR(20) NOT NULL UNIQUE,
jelszo VARCHAR(100) NOT NULL,
bolt VARCHAR(100) NOT NULL,
jogosultsag VARCHAR(15) NOT NULL,
pontok INT(11));

INSERT INTO felhasznalok (vezeteknev,keresztnev,email,felhasznalonev,jelszo,bolt,jogosultsag,pontok) VALUES("Vass","Levente","vasslevi89@gmail.com","evente2001","7c1094833ad11953902709101b2e37de","meta","admin",0);

