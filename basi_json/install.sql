-- Active: 1677862045305@@127.0.0.1@3306@form_in_php

CREATE Table regione (
    id_regione int NOT NULL AUTO_INCREMENT,
    nome VARCHAR(99) not NULL,
    PRIMARY KEY (id_regione)

);

drop table regione;

insert INTO regione (nome)
        value('Abruzzo');

SELECT * FROM regione;

INSERT INTO regione(nome)VALUES ('Valle d\'Aosta/Vallée d\'Aoste');

TRUNCATE TABLE regione;

CREATE Table provincia (
    id_provincia int NOT NULL AUTO_INCREMENT,
    nome VARCHAR(99) not NULL,
    PRIMARY KEY (id_provincia)

);


drop table provincia;


INSERT INTO provincia(nome)VALUES ('Agrigento');

SELECT * FROM provincia;
