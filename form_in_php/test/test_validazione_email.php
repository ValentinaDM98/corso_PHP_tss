<?php

// $files = scandir("./form_in_php/class/validator");
// print_r($files);

use validator\ValidateMail;

require "./form_in_php/class/validator/Validable.php";
require "./form_in_php/class/validator/ValidateMail.php";


//elenco situazioni in cui considero una mail sbagliata
$emails = [ 'a', '  ', 'a@',
];

//creo una nuova istanza
$v = new ValidateMail();

//Per separare/applicare proprietà/metodi ad oggetti 
//in Java v.isValid('a'); 
//in php $v->isValid('a');

foreach ($emails as $index => $email){
   if($v->isValid($email) == false){
    echo "test superato per $email\n";
   }else{
    echo "test numero $index non superato per [$email]\n";
   };
    //metodo isValid restituisce true o false 
    //oppure metodo $v->getMessage() manda un messaggio quando è true; 
}