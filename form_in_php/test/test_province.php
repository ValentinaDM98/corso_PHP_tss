<?php
#php form_in_php/test/test_province.php
require "./config.php";
require "./form_in_php/class/Registry/it/Provincia.php";

// $regioni = new Regioni();
// $regioni->all();//Array di (stdClass) regioni

//Metodo statico: deve essere utilizzato senza creare un'stanza
Provincia::all();
