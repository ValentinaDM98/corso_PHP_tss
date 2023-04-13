<?php
#php form_in_php/test/crud/test_user_update.php
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
$user->birthday = "2017-01-01";
$user->birth_city = "Torino";
$user->regione_id = "9";
$user->provincia_id = "15";
$user->gender = "M";
$user->username = "luigiverdi@gmail.com";
$user->password = md5('Password');

$crud->create($user);
print_r($crud->read(1));

$user = $crud->read(1);
$user->first_name = "Giorgio";
$user->last_name = "Santo";
$user->birthday = "2015-01-03";
$user->birth_city = "Roma";
$user->regione_id = "4";
$user->provincia_id = "8";
$user->gender = "M";
$user->username = "giorgiosanto@gmail.com";
$user->password = md5('Password');

$crud->update($user);
print_r($crud->read(1));

