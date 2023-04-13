<?php
//php form_in_php/test/crd/test_user.php
//i test li lanciamo dalla root, quindi abbiamo già il file config

use crud\UserCRUD;
use models\User;

include "form_in_php/config.php";
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

$result = $crud->read();
if(count($result) == 1){
    echo "test utente inserito ok";
}
print_r($result);

//test
try {
    $crud->create($user);
} catch (\Throwable $th) {
    if($th->getCode() == "23000"){
        echo "test superato";
    }
    
}





