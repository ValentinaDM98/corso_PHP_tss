<?php

// definisco delle costanti per far prima (nome costante + valore della costante)
define('DB_HOST', 'localhost');
define ('DB_USER','root');
define ('DB_PASSWORD', '');
define('DB_NAME', 'form_in_php');

// define('DB_HOST', 'localhost');
// define ('DB_USER','id20622476_valentinadb');
// define ('DB_PASSWORD', '');
// define('DB_NAME', 'id20622476_form_in_php');

// id20622476_form_in_php	id20622476_valentinadb	localhost

//Creiamo una costante per $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
define('DB_DSN', "mysql:host=".DB_HOST.";dbname=".DB_NAME);