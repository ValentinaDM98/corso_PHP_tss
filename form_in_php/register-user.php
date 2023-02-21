<?php

// print_r($_POST);

// $test = filter_input(INPUT_POST,"username",FILTER_VALIDATE_EMAIL);

// if($test == false){
//     echo "\nLa mail non è valida!\n";
// }else{
//     echo "Grazie, la tua email è valida: $test";
// }

$first_name = filter_input(INPUT_POST, 'first_name');
//se non metto filtri:
//whitespace char restituisce una stringa | campo obbligatorio
//non compilo stringa vuota "" | campo obbligatorio 
//se compilato restituisce una stringa | OK
//null se il form non passa il valore | errore o campo obbligatorio
var_dump($first_name); 

