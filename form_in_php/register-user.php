<?php

print_r($_POST);

$test = filter_input(INPUT_POST,"username",FILTER_VALIDATE_EMAIL);

if($test == false){
    echo "\nLa mail non è valida!\n";
}else{
    echo "Grazie, la tua email è valida: $test";
}