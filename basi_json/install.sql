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
    id_regione int NOT NULL,
    nome VARCHAR(255) not NULL,
    sigla CHAR(2) not NULL,
    PRIMARY KEY (id_provincia)
    /*FOREIGN KEY (id_regione) REFERENCES regione (id_regione)*/
    );


SELECT id_regione FROM regione WHERE nome = 'Sicilia'; 

INSERT INTO provincia (nome,sigla,id_regione) VALUES ('Agrigento', 'AG', 15);

SELECT * FROM provincia;

drop table provincia;
