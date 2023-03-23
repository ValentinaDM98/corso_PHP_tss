<?php

include "config.php";

$province_string = file_get_contents('province.json');

$province_object = json_decode($province_string);

//Connessiona a db
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

try {

    $conn = new PDO($dsn, DB_USER,DB_PASSWORD);
    $conn->query('TRUNCATE TABLE provincia');
    
    foreach($province_object as $provincia){
        //ADDSLASHES converte tutti i caratteri che possono creare conflitto es. \ in Valle d'Aosta
        $nome = addslashes($provincia->nome);
        $sigla = addslashes($provincia->sigla);
        $regione = addslashes($provincia->regione);

        $q = "SELECT id_regione FROM regione WHERE nome = '$regione';";
        $id_regione = $conn->query ($q);
        //ritorna il valore specificato dalla colonna
        $risultato = $id_regione->fetchColumn();
        print_r($risultato);
       // echo $q;
       // die();
        
       $sql = "INSERT INTO provincia (nome, sigla, id_regione) VALUES ('$nome','$sigla','$risultato');";
       echo $sql."\n";
       $conn->query($sql);

    }
    

} catch (\Throwable $th) {
    throw $th;
}
