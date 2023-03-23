<?php

/*AUTOLOAD */

// use Registry\it\Provincia;
// use Registry\it\Regione;
// use validator\ValidateDate;
// use validator\ValidateMail;
// use validator\ValidateRequired;

//require_once "./config.php";


/*senza namespace
spl_autoload_register(function($className){
    echo "\nsto cercando $className\n";
    require "./form_in_php/class/validator/$className.php";
    //cerca la classe che gli serve e ogni volta la passa alla funzione, la trova perchè classe è uguale
    //al nome del suo file (può accedere a tutto quello che c'è all'interno di Validator)

});*/

//con namespace
spl_autoload_register(function($className){
   //echo "\nsto cercando $className\n";
    //validator\ValidateMail -> voglio sostituire il \ in / nel className
    $className = str_replace('\\', "/",$className);
    require "./form_in_php/class/".$className.".php";

});

//nome classe è uguale al nome del file 
// new ValidateMail();
// new ValidateRequired();
// new ValidateDate();
//i metodi statici non hanno bissogno di new per essere usati!
// Regione::all(); //mettere \ davanti a errori per indicare che le variabili sono di php
// Provincia::all();
//devono implementare l'interfaccia 

