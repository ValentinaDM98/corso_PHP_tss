<?php
#php form_in_php/test/test_regioni.php

use Registry\it\Regione;

require "./config.php";
require "./form_in_php/class/Registry/it/Regione.php";

// $regioni = new Regioni();
// $regioni->all();//Array di (stdClass) regioni

//Metodo statico: deve essere utilizzato senza creare un'stanza
$regioni = Regione::all();

