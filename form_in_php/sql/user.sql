-- Active: 1677862045305@@127.0.0.1@3306@form_in_php

INSERT INTO user ( `first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) 
        VALUES ( 'Mario', 'Rossi', '2023-03-15', 'Torino', '18', '96', 'M', 'mariorossi@email.com', MD5('password'));