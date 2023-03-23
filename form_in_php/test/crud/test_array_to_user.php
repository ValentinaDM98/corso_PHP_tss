<?php
#php form_in_php/test/crud/test_array_to_user.php

use models\User; //sempre per primo

require "form_in_php/test/test_autoload.php";

//l'array associativo simula $_POST 
$user_array = [
    'first_name' => "Paolo",
    'last_name'=> "Rossi",
    'birthday'=> "2020-12-20",
    'birth_city' => "Givoletto",
    'regione_id'=> 10,
    'provincia_id' => 3,
    'gender' => "M",
    'username' => "paolorossi@gmail.com",
    'password' => "ciccio"
];

// converto l'array in un oggetto
// $class_name = User::class;
// $user = new $class_name;
// foreach ($class_array as $class_attribute => $value_of_class_attribute) {
//     //first_name al primo giro --> diventa $user->first_name = "Paolo"
//     $user->$class_attribute = $value_of_class_attribute;
// }

$user = User::arrayToUser($user_array);
if(get_class($user) == User::class){
    echo "\ntest passato è un oggetto di tipo \n";
    print_r($user);
}
