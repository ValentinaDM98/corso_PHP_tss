<?php
#form_in_php/test/crud/test_user_read.php
//i test li lanciamo dalla root, quindi abbiamo già il file config

use crud\UserCRUD;
use models\User;

include "config.php";
include "form_in_php/test/test_autoload.php";

// svuoto  la tabella quando lancio il test
(new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;");
$crud = new UserCRUD();
$user = new User();

$user->first_name = "Luigi";
$user->last_name = "Verdi";
//formato sql perchè va nella query
$user->birthday = "2017-01-01";
$user->birth_city = "Torino";
$user->regione_id = "9";
$user->provincia_id = "15";
$user->gender = "M";
$user->username = "luigiverdi@gmail.com";
$user->password = md5('Password');

$crud->create($user);

$result = $crud->read(); //array|vuoto
if($result === false){
    echo "\ndatabase iniziale vuoto\n";
};

$result = $crud->read(1); //User
//get_class = classe a cui appartiene l'oggetto
if(class_exists(User::class)&& get_class($result) == User::class){
    echo "\ntest superato\n";
}
//print_r($result);

$result = $crud->read(2); //false
if($result === false){ //=== perchè voglio che sia false e anche boolean
    echo"\nutente non esistente superato\n";

}
//print_r($result);

$result = $crud->read(); //array|vuoto
if(is_array($result) && count($result) === 1){
    echo "\nricerca di tutti gli utenti (1)\n";
};

$crud->delete(1);
$result = $crud->read(1);
if($result === false){ 
    echo"\nutente con id 1 è stato eliminato\n";

}









