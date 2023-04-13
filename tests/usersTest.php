<?php

function users_test(){
    (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) VALUES
    (1, 'Mario', 'Rossi', '2020-04-17', 'Torino', 15, 15, 'M', '@b.itdfdfsg', 'segretissimo'),
    (2, 'Luigi', 'Verdi', '2017-03-17', 'Torino', 16, 15, 'M', 'giuseppe@xcvxc', 'a3ea3259dd51c5d28ac011a8dbf78e79'),
    (3, 'Elio', 'Deangelis', '2013-03-17', 'Roma', 20, 18, 'F', 'xzczxcxzczxcz', 'a3ea3259dd51c5d28ac011a8dbf78e79'),
    (4, 'Killer', 'Queen', '2000-03-12', 'Torino', 18, 17, 'M', 'wadaswdfasdf asfa', 'a3ea3259dd51c5d28ac011a8dbf78e79'),
    (5, 'Mai', 'Mario', '1999-03-01', 'Roma', 18, 17, 'F', 'a@b.it', 'a3ea3259dd51c5d28ac011a8dbf78e79'),
    (6, 'Velardo', 'Verdi', '1984-01-11', 'Milano', 2, 1, 'M', 'b@b.it', 'a3ea3259dd51c5d28ac011a8dbf78e79');"); 
    
    
}