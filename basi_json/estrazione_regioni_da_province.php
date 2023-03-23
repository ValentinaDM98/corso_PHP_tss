<?php

include "config.php";

//voglio estrarre tutte le stringhe che rappresentano le regioni

//prendo il contenuto del file json
$province_string = file_get_contents('province.json');

//dobbiamo convertire la stringa in oggetto
$province_object = json_decode($province_string);

//var_dump($province_object);

$regioni_array = array_map(function($provincia){
    return $provincia->regione;
}, $province_object);

//elimina dagli array i duplicati
$regioni_unique = array_unique($regioni_array);

//Metto in ordine crescente gli indici dell'array
sort($regioni_unique);

//Connessiona a db
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

//Eccezioni
try {
    $conn = new PDO($dsn, DB_USER,DB_PASSWORD);
    $conn->query('TRUNCATE TABLE regione');

    foreach($regioni_unique as $regione){
        //ADDSLASHES converte tutti i caratteri che possono creare conflitto es. \ in Valle d'Aosta
        $regione = addslashes($regione);
        $sql = "INSERT INTO regione (nome) VALUES ('$regione');";
        echo $sql."\n";
        $conn->query($sql);
    }
} catch (\Throwable $th) {
    throw $th;
}

//print_r($regioni_unique);