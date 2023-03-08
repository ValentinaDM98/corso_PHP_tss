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
        $id_regione = $conn->query ("SELECT id_regione FROM regione WHERE nome = '$regione';");
        $id_regione->fetchColumn();
        print_r($id_regione);

       // $sql = "INSERT INTO province (nome, sigla, id_regione) VALUES ('$nome,$sigla,$id_regione');";
       // echo $sql."\n";
       // $conn->query($sql);

    }
    

} catch (\Throwable $th) {
    throw $th;
}
