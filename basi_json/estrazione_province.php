<?php

include "config.php";

$province_string = file_get_contents('province.json');

$province_object = json_decode($province_string);

$province_array = array_map(function($regione){
    return $regione->nome;
}, $province_object);

$province_unique = array_unique($province_array);

sort($province_unique);

print_r($province_unique);